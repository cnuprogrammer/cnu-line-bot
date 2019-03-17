<?php
// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include composer autoload
require_once '/vendor/autoload.php';

// การตั้งเกี่ยวกับ bot
require_once 'bot_settings.php';

require_once '/services/CallFunction.php';
require_once '/services/RichmenuCallFuction.php';

// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");

///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

// เชื่อมต่อกับ LINE Messaging API
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));

// คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');

// กำหนดค่า signature สำหรับตรวจสอบข้อมูลที่ส่งมาว่าเป็นข้อมูลจาก LINE
$hash = hash_hmac('sha256', $content, LINE_MESSAGE_CHANNEL_SECRET, true);
$signature = base64_encode($hash);

// แปลงค่าข้อมูลที่ได้รับจาก LINE เป็น array ของ Event Object
$events = $bot->parseEventRequest($content, $signature);
$eventObj = $events[0]; // Event Object ของ array แรก

// ดึงค่าประเภทของ Event มาไว้ในตัวแปร มีทั้งหมด 7 event
$eventType = $eventObj->getType();

// สร้างตัวแปร ไว้เก็บ sourceId ของแต่ละประเภท
$userId = null;
$groupId = null;
$roomId = null;
// สร้างตัวแปร replyToken สำหรับกรณีใช้ตอบกลับข้อความ
$replyToken = null;
// สร้างตัวแปร ไว้เก็บค่าว่าเป้น Event ประเภทไหน
$eventMessage = NULL;
$eventPostback = NULL;
$eventJoin = NULL;
$eventLeave = NULL;
$eventFollow = NULL;
$eventUnfollow = NULL;
$eventBeacon = NULL;
// เงื่อนไขการกำหนดประเภท Event 
switch($eventType){
    case 'message': $eventMessage = true; break;
    case 'postback': $eventPostback = true; break;
    case 'join': $eventJoin = true; break;
    case 'leave': $eventLeave = true; break;
    case 'follow': $eventFollow = true; break;
    case 'unfollow': $eventUnfollow = true; break;
    case 'beacon': $eventBeacon = true; break;
}
// สร้างตัวแปรเก็บค่า groupId กรณีเป็น Event ที่เกิดขึ้นใน GROUP
if($eventObj->isGroupEvent()){
    $groupId = $eventObj->getGroupId();
}
// สร้างตัวแปรเก็บค่า roomId กรณีเป็น Event ที่เกิดขึ้นใน ROOM
if($eventObj->isRoomEvent()){
    $roomId = $eventObj->getRoomId();
}
// ดึงค่า replyToken มาไว้ใช้งาน ทุกๆ Event ที่ไม่ใช่ Leave และ Unfollow Event
if(is_null($eventLeave) && is_null($eventUnfollow)){
    $replyToken = $eventObj->getReplyToken();
}
// ดึงค่า userId มาไว้ใช้งาน ทุกๆ Event ที่ไม่ใช่ Leave Event
if (is_null($eventLeave)) {
    $userId = $eventObj->getUserId();
}
// ตรวจสอบถ้าเป็น Join Event ให้ bot ส่งข้อความใน GROUP ว่าเข้าร่วม GROUP แล้ว
if (!is_null($eventJoin)) {
    $textReplyMessage = "ขอเข้ากลุ่มด้วยน่ะ GROUP ID:: " . $groupId;
    $replyData = new TextMessageBuilder($textReplyMessage);
}
// ตรวจสอบถ้าเป็น Leave Event เมื่อ bot ออกจากกลุ่ม
if (!is_null($eventLeave)) {

}
// ตรวจสอบถ้าเป้น Message Event และกำหนดค่าตัวแปรต่างๆ
if (!is_null($eventMessage)) {
    // สร้างตัวแปรเก็ยค่าประเภทของ Message จากทั้งหมด 8 ประเภท
    $typeMessage = $eventObj->getMessageType();
    //  text | image | sticker | location | audio | video | imagemap | template
    // ถ้าเป็นข้อความ
    if ($typeMessage == 'text') {
        $userMessage = $eventObj->getText(); // เก็บค่าข้อความที่ผู้ใช้พิมพ์
    }
    // ถ้าเป็น sticker
    if ($typeMessage == 'sticker') {
        $packageId = $eventObj->getPackageId();
        $stickerId = $eventObj->getStickerId();
    }
    // ถ้าเป็น location
    if ($typeMessage == 'location') {
        $locationTitle = $eventObj->getTitle();
        $locationAddress = $eventObj->getAddress();
        $locationLatitude = $eventObj->getLatitude();
        $locationLongitude = $eventObj->getLongitude();
    }
    // เก็บค่า id ของข้อความ
    $idMessage = $eventObj->getMessageId();
}

if (!is_null($events)) {
    // ถ้าเป็น Postback Event
    if (!is_null($eventPostback)) {
        $dataPostback = null;
        $paramPostback = null;
        // แปลงข้อมูลจาก Postback Data เป็น array
        parse_str($eventObj->getPostbackData(), $dataPostback);
        // ดึงค่า params กรณีมีค่า params
        $paramPostback = $eventObj->getPostbackParams();
        // ทดสอบแสดงข้อความที่เกิดจาก Postaback Event
        $textReplyMessage = "ข้อความจาก Postback Event Data = ";
        $textReplyMessage .= json_encode($dataPostback);
        $textReplyMessage .= json_encode($paramPostback);
        $replyData = new TextMessageBuilder($textReplyMessage);
    }
    // ถ้าเป้น Message Event 
    if(!is_null($eventMessage)){
        switch ($typeMessage){ // กำหนดเงื่อนไขการทำงานจาก ประเภทของ message
            case 'text':  // ถ้าเป็นข้อความ
                $userMessage = mb_strtolower($userMessage,'UTF-8'); // แปลงเป็นตัวเล็ก สำหรับทดสอบ
                switch ($userMessage) {
                    case "สมัคร":{
                            $replyData = text_recruit_show();
                        }break;
                    case "คณะ":{
                            $replyData = text_faculty_show();
                        }break;
                    case "นักศึกษา":{
                            $replyData = text_student_show();
                        }break;
                    case "อาจารย์":{
                            $replyData = text_teacher_show();
                        }break;
                    case "เกี่ยวกับคณะนิติศาสตร์":{
                            $replyData = text_abount_LAW_show();
                        }break;
                    case "เกี่ยวกับคณะบริหารศาสตร์":{
                            $replyData = text_abount_BBA_show();
                        }break;
                    case "เกี่ยวกับคณะรัฐศาสตร์":{
                            $replyData = text_abount_POL_show();
                        }break;
                    case "เกี่ยวกับคณะพยาบาลศาสตร์":{
                            $replyData = text_abount_NURSE_show();
                        }break;
                    case "เกี่ยวกับคณะสาธารณสุขศาสตร์":{
                            $replyData = text_abount_PH_show();
                        }break;
                    case "สาขาที่เปิดสอนคณะนิติศาสตร์":{
                            $replyData = text_department_law_show();
                        }break;
                    case "สาขาที่เปิดสอนคณะบริหารศาสตร์":{
                            $replyData = text_department_bba_show();
                        }break;
                    case "สาขาที่เปิดสอนคณะรัฐศาสตร์":{
                            $replyData = text_department_pol_show();
                        }break;
                    case "สาขาที่เปิดสอนคณะพยาบาลศาสตร์":{
                            $replyData = text_department_nurse_show();
                        }break;
                    case "สาขาที่เปิดสอนคณะสาธารณสุขศาสตร์":{
                            $replyData = text_department_PH_show();
                        }break;
                    case "เกี่ยวกับสาขานิติศาสตร์":{
                            $replyData = text_department_about_show("11");
                        }break;
                    case "เกี่ยวกับสาขาการบัญชี":{
                            $replyData = text_department_about_show("21");
                        }break;
                    case "เกี่ยวกับสาขาคอมพิวเตอร์ธุรกิจ":{
                            $replyData = text_department_about_show("22");
                        }break;
                    case "เกี่ยวกับสาขาการจัดการ":{
                            $replyData = text_department_about_show("23");
                        }break;
                    case "เกี่ยวกับสาขาการปกครองท้องถิ่น":{
                            $replyData = text_department_about_show("41");
                        }break;
                    case "เกี่ยวกับสาขาพยาบาลศาสตร์":{
                            $replyData = text_department_about_show("61");
                        }break;
                    case "เกี่ยวกับสาขาผู้ช่วยพยาบาล":{
                            $replyData = text_department_about_show("62");
                        }break;
                    case "เกี่ยวกับสาขาผู้ดูแลผู้สูงอายุ":{
                            $replyData = text_department_about_show("63");
                        }break;
                    case "เกี่ยวกับสาขาผู้ช่วยทันตแพทย์":{
                            $replyData = text_department_about_show("64");
                        }break;
                    case "เกี่ยวกับสาขาสาธารณสุขชุมชน":{
                            $replyData = text_department_about_show("71");
                        }break;
                    case "เกี่ยวกับสาขาอาชีวอนามัยและความปลอดภัย":{
                            $replyData = text_department_about_show("72");
                        }break;
                    case "เกี่ยวกับสาขาแพทย์แผนไทย":{
                            $replyData = text_department_about_show("73");
                        }break;
                    case "จุดเด่นสาขานิติศาสตร์":{
                            $replyData = text_department_pros_show("11");
                        }break;
                    case "จุดเด่นสาขาการบัญชี":{
                            $replyData = text_department_pros_show("21");
                        }break;
                    case "จุดเด่นสาขาคอมพิวเตอร์ธุรกิจ":{
                            $replyData = text_department_pros_show("22");
                        }break;
                    case "จุดเด่นสาขาการจัดการ":{
                            $replyData = text_department_pros_show("23");
                        }break;
                    case "จุดเด่นสาขาการปกครองท้องถิ่น":{
                            $replyData = text_department_pros_show("41");
                        }break;
                    case "จุดเด่นสาขาพยาบาลศาสตร์":{
                            $replyData = text_department_pros_show("61");
                        }break;
                    case "จุดเด่นสาขาผู้ช่วยพยาบาล":{
                            $replyData = text_department_pros_show("62");
                        }break;
                    case "จุดเด่นสาขาผู้ดูแลผู้สูงอายุ":{
                            $replyData = text_department_pros_show("63");
                        }break;
                    case "จุดเด่นสาขาผู้ช่วยทันตแพทย์":{
                            $replyData = text_department_pros_show("64");
                        }break;
                    case "จุดเด่นสาขาสาธารณสุขชุมชน":{
                            $replyData = text_department_pros_show("71");
                        }break;
                    case "จุดเด่นสาขาอาชีวอนามัยและความปลอดภัย":{
                            $replyData = text_department_pros_show("72");
                        }break;
                    case "จุดเด่นสาขาแพทย์แผนไทย":{
                            $replyData = text_department_pros_show("73");
                        }break;
                    case "การประกอบอาชีพสาขานิติศาสตร์":{
                            $replyData = text_department_work_show("11");
                        }break;
                    case "การประกอบอาชีพสาขาการบัญชี":{
                            $replyData = text_department_work_show("21");
                        }break;
                    case "การประกอบอาชีพสาขาคอมพิวเตอร์ธุรกิจ":{
                            $replyData = text_department_work_show("22");
                        }break;
                    case "การประกอบอาชีพสาขาการจัดการ":{
                            $replyData = text_department_work_show("23");
                        }break;
                    case "การประกอบอาชีพสาขาการปกครองท้องถิ่น":{
                            $replyData = text_department_work_show("41");
                        }break;
                    case "การประกอบอาชีพสาขาพยาบาลศาสตร์":{
                            $replyData = text_department_work_show("61");
                        }break;
                    case "การประกอบอาชีพสาขาผู้ช่วยพยาบาล":{
                            $replyData = text_department_work_show("62");
                        }break;
                    case "การประกอบอาชีพสาขาผู้ดูแลผู้สูงอายุ":{
                            $replyData = text_department_work_show("63");
                        }break;
                    case "การประกอบอาชีพสาขาผู้ช่วยทันตแพทย์":{
                            $replyData = text_department_work_show("64");
                        }break;
                    case "การประกอบอาชีพสาขาสาธารณสุขชุมชน":{
                            $replyData = text_department_work_show("71");
                        }break;
                    case "การประกอบอาชีพสาขาอาชีวอนามัยและความปลอดภัย":{
                            $replyData = text_department_work_show("72");
                        }break;
                    case "การประกอบอาชีพสาขาแพทย์แผนไทย":{
                            $replyData = text_department_work_show("73");
                        }break;
                    case "ติดต่อเรา":{
                            $replyData = text_contact();
                        }break;
                    case "ค่าเล่าเรียน":{
                            $replyData = text_tuition_fee();
                        }break;
                    case "ค่าเล่าเรียนคณะนิติศาสตร์":{
                            $replyData = text_tuition_fee_byID("1");
                        }break;
                    case "ค่าเล่าเรียนคณะบริหารศาสตร์":{
                            $replyData = text_tuition_fee_byID("2");
                        }break;
                    case "ค่าเล่าเรียนคณะรัฐศาสตร์":{
                            $replyData = text_tuition_fee_byID("4");
                        }break;
                    case "ค่าเล่าเรียนคณะพยาบาลศาสตร์":{
                            $replyData = text_tuition_fee_byID("6");
                        }break;
                    case "ค่าเล่าเรียนคณะสาธารณสุขศาสตร์":{
                            $replyData = text_tuition_fee_byID("7");
                        }break;
                    case "ssk":{
                            $replyData = text_contact_SSK();
                        }break;
                    case "srn":{
                            $replyData = text_contact_SRN();
                        }break;
                    case "brm":{
                            $replyData = text_contact_BRM();
                        }break;
                    case "nst":{
                            $replyData = text_contact_NST();
                        }break;
                    case "pnb":{
                            $replyData = text_contact_PNB();
                        }break;
                    case "ryg":{
                            $replyData = text_contact_RYG();
                        }break;
                    case "สร้างคิวอาร์โค้ด":{
                            $replyData = text_show_qr();
                        }break;
                    case "สร้างภาพโฆษณา":{
                            $replyData = text_show_pqr();
                        }break;
                    case "พิมพ์ใบชำระเงิน":{
                            $replyData = text_print();
                        }break;
                    case "พิมพ์ใบจ่ายเงินระบุจำนวนเงิน":{
                            $replyData = text_print_amount();
                        }break;
                    case "พิมพ์ใบจ่ายเงินไม่ระบุจำนวนเงิน":{
                            $replyData = text_print_tatal();
                        }break;
                    default:{
                            if (strstr($userMessage, "สร้างคิวอาร์โค้ดรูป")) {
                                $replyData = text_request_pqr_by($userMessage);
                            }
                            if (strstr($userMessage, "pqr")) {
                                $replyData = text_request_pqr($userMessage);
                            } else {
                                if (strstr($userMessage, "qr")) {
                                    $replyData = text_request_qr($userMessage);
                                }
                            }
                            if (strstr($userMessage, "aj#")) {
                                $replyData = text_request_aj($userMessage);
                            }
                            if (strstr($userMessage, "db#")) {
                                $replyData = text_request_db($userMessage);
                            }
                            if (strstr($userMessage, "pay#")) {
                                $replyData = text_request_pay($userMessage);
                            }
                            if (strstr($userMessage, "pay2#")) {
                                $replyData = text_request_pay2($userMessage);
                            }
                            //เปิดเพื่อตรวจสอบ ข้อความที่รับเข้ามา
                            // $textReplyMessage = $userMessage;
                            // $replyData = new TextMessageBuilder($textReplyMessage);
                        }break;
                }
                break;
            case 'sticker':{
                    if (!is_null($groupId) || !is_null($roomId)) {
                        if ($eventObj->isGroupEvent()) {
                            $response = $bot->getGroupMemberProfile($groupId, $userId);
                        }
                        if ($eventObj->isRoomEvent()) {
                            $response = $bot->getRoomMemberProfile($roomId, $userId);
                        }
                    } else {
                        $response = $bot->getProfile($userId);
                    }
                    if ($response->isSucceeded()) {
                        $userData = $response->getJSONDecodedBody(); // return array
                        // $userData['userId']
                        // $userData['displayName']
                        // $userData['pictureUrl']
                        // $userData['statusMessage']
                        $textReplyMessage = 'สวัสดีครับ คุณ ' . $userData['displayName'];
                    } else {
                        //$textReplyMessage = 'สวัสดีครับ คุณคือใคร';
                    }
                    $replyData = new TextMessageBuilder($textReplyMessage);
                }
            default:{
                    // กรณีเงื่อนไขอื่นๆ ผู้ใช้ไม่ได้ส่งเป็นข้อความ และ สติ๊กเกอร์
                }break;
        }
    }
}

//l ส่วนของคำสั่งตอบกลับข้อความ
$response = $bot->replyMessage($replyToken, $replyData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}

// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
