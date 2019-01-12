<?php 
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;

use LINE\LINEBot\RichMenuBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBoundsBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuAreaBuilder;
use LINE\LINEBot\RichMenuBuilder\RichMenuSizeBuilder;

require_once("DBConnection.php");

require_once("ApiSettings.php");


function text_abount_LAW_show(){
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/law/240';
    $videoUrl = WEBSERVICE_URL."/src/video/Laws.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_abount_BBA_show(){
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/bba/240';
    $videoUrl = WEBSERVICE_URL."/src/video/Management.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_abount_POL_show(){
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/pol/240';
    $videoUrl = WEBSERVICE_URL."/src/video/Political.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_abount_NURSE_show(){
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/nurse/240';
    $videoUrl = WEBSERVICE_URL."/src/video/Nurse.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_abount_PH_show(){
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/ph/240';
    $videoUrl = WEBSERVICE_URL."/src/video/MixPublic.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_faculty_show(){

    $ab_LAW = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะนิติศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน',// ข้อความแสดงในปุ่ม
            //'นิติศาสตร์จบค่าเล่าเรียน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
            'ค่าเล่าเรียน'
        ),
        new UriTemplateActionBuilder(
            'สมัครเรียน', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx'
        ),
        
    );

    $ab_BBA = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะบริหารศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน',// ข้อความแสดงในปุ่ม
            //'บริหารศาสตร์ค่าเล่าเรียน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
            'ค่าเล่าเรียน'
        ),
        new UriTemplateActionBuilder(
            'สมัครเรียน', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx'
        ),
        
    );

    $ab_POL = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะรัฐศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน',// ข้อความแสดงในปุ่ม
            //'รัฐศาสตร์ค่าเล่าเรียน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
            'ค่าเล่าเรียน'
        ),
        new UriTemplateActionBuilder(
            'สมัครเรียน', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx'
        ),
        
    );
    
    $ab_NURSE = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะพยาบาลศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน',// ข้อความแสดงในปุ่ม
            //'พยาบาลศาสตร์ค่าเล่าเรียน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
            'ค่าเล่าเรียน'
        ),
        new UriTemplateActionBuilder(
            'สมัครเรียน', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx'
        ),
        
    );

    $ab_PH = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะสาธารณสุขศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน',// ข้อความแสดงในปุ่ม
            //'สาธารณสุขศาสตร์ค่าเล่าเรียน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
            'ค่าเล่าเรียน'
        ),
        new UriTemplateActionBuilder(
            'สมัครเรียน', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx'
        ),
        
    );

    $replyData = new TemplateMessageBuilder('Carousel',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'นิติศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'/imgsrc/photos/f/law/700',
                    $ab_LAW
                ),
                new CarouselColumnTemplateBuilder(
                    'บริหารศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'/imgsrc/photos/f/bba/700',
                    $ab_BBA
                ),
                new CarouselColumnTemplateBuilder(
                    'รัฐศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'/imgsrc/photos/f/pol/700',
                    $ab_POL
                ),     
                new CarouselColumnTemplateBuilder(
                    'พยาบาลศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'/imgsrc/photos/f/nurse/700',
                    $ab_NURSE
                ),
                new CarouselColumnTemplateBuilder(
                    'สาธารณสุขศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'/imgsrc/photos/f/ph/700',
                    $ab_PH
                ),
                                    
            )
        )
    );
    return $replyData; 
}

function text_tuition_fee(){
    $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/Tuition-fee/';
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/Tuition-fee/240';
    $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
    return $replyData;
}

function text_contact(){
    $textReplyMessage = "เลือกวิทยาเขต\r\nศรีสะเกษ พิมพ์ SSK\r\nสุรินทร์ พิมพ์ SRN\r\nบุรีรัมย์ พิมพ์ BRM\r\nนครศรีธรรมราช พิมพ์ NST\r\nเพชรบูรณ์ พิมพ์ PNB\r\nระยอง พิมพ์ RYG";
    $replyData = new TextMessageBuilder($textReplyMessage);
    return $replyData;
}

function text_contact_SSK(){
    $textReplyMessage = "วิทยาเขตศรีสะเกษ\r\nโทรศัพท์ 045-617-971";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "99 หมู่ 6 ต.โพธิ์ อ.เมือง จ.ศรีสะเกษ 33000";
    $latitude = 15.1063854;
    $longitude = 104.3905991;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_SRN(){
    $textReplyMessage = "วิทยาเขตสุรินทร์\r\nโทรศัพท์ 044-143-143";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 7 ถ.สุรินทร์-ปราสาท ต.เฉนียง อ.เมือง จ.สุรินทร์ 32000";
    $latitude = 14.8044052;
    $longitude = 103.4509349;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);
    
    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_BRM(){
    $textReplyMessage = "วิทยาเขตบุรีรัมย์\r\nโทรศัพท์ 044-666-583";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 8 ต.ชุมเห็ด อ.เมือง จ.บุรีรัมย์ 31000";
    $latitude = 15.0256117;
    $longitude = 103.094873;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);
    
    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_NST(){
    $textReplyMessage = "วิทยาเขตนครศรีธรรมราช\r\nโทรศัพท์ 075-446-458";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 13 ต.ช้างซ้าย อ.พระพรหม จ.นครศรีธรรมราช 80000";
    $latitude = 8.3667308;
    $longitude = 99.9713934;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);
    
    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_PNB(){
    $textReplyMessage = "วิทยาเขตเพรชบูรณ์\r\nโทรศัพท์ 056-911-655";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 8 ต.บ้านโตก อ.เมือง จ.เพรชบูรณ์ 67000";
    $latitude = 16.3444715;
    $longitude = 101.0903101;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);
    
    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_RYG(){
    $textReplyMessage = "วิทยาเขตระยอง\r\nโทรศัพท์ 038-672-898";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333/3 หมู่ 3 ถ.สุขุมวิท ต.วังหว้า อ.แกลง จ.ระยอง 21110";
    $latitude = 12.7662674;
    $longitude = 101.6288038;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude ,$longitude);        
 
    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);
    
    $replyData = $multiMessage;
    
    return $replyData;
}

function text_recruit_show(){
    $actions = array (
        New \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("มี", "Coming Soon !"),
        New \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("ไม่มี", "http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx?ReferID=0000000000")
      );
      $button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder("มีผู้แนะนำหรือไม่", $actions);
      $replyData = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("confim message", $button);
      return $replyData;
}

function text_student_show(){
    $actionBuilder = array(

        new UriTemplateActionBuilder(
            'สิทธิ์การเข้าสอบ', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/Student/CheckExamPermission/CEPSearch.aspx'
        ),
        new UriTemplateActionBuilder(
            'เข้าระบบ EMS', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th'
        ),
  
    );
    $imageUrl = '';
    $replyData = new TemplateMessageBuilder('นักศึกษา',
        new ButtonTemplateBuilder(
                'นักศึกษา', // กำหนดหัวเรื่อง
                'เลือกเมนู', // กำหนดรายละเอียด
                $imageUrl, // กำหนด url รุปภาพ
                $actionBuilder  // กำหนด action object
        )
    ); 


    return $replyData;
}

function text_teacher_show(){
    $actionBuilder = array(
        new UriTemplateActionBuilder(
            'สร้าง QRCode รับสมัคร', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th:8085/Pages/LineBot/GenEmployeeQRCodeForm.aspx'
        ),
        new MessageTemplateActionBuilder(
            'แสดง QRCode',// ข้อความแสดงในปุ่ม
            'แสดงคิวอาร์โค้ด' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new UriTemplateActionBuilder(
            'เข้าระบบ EMS', // ข้อความแสดงในปุ่ม
            'http://cc.cnu.ac.th'
        ),

    );
    $imageUrl = '';
    $replyData = new TemplateMessageBuilder('อาจารย์',
        new ButtonTemplateBuilder(
                'อาจารย์', // กำหนดหัวเรื่อง
                'เลือกเมนู', // กำหนดรายละเอียด
                $imageUrl, // กำหนด url รุปภาพ
                $actionBuilder  // กำหนด action object
        )
    ); 


    return $replyData;
}

function text_request_qr($userMessage){

    $EmployeeID = substr($userMessage,2, strlen($userMessage));

    if(file_put_contents("src/image/".$EmployeeID.".png", fopen("http://cc.cnu.ac.th:8085/Content/Images/EmployeeQRcode/".$EmployeeID.".png", 'r'))){
        $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'/';
        $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'/300';
        $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
    }else{
        $textReplyMessage = "กรุณาไปที่เมนูสร้าง QRCode";
        $replyData = new TextMessageBuilder($textReplyMessage);
    }
    return $replyData;
}

function text_request_pqr($userMessage){


    $EmployeeID = substr($userMessage,3, strlen($userMessage)-5);
    $PicID = substr($userMessage, strlen($userMessage)-1);

    // Sets our destination URL
    $endpoint_url = 'http://cc.cnu.ac.th:8085/Pages/LineBot/EmployeeQRCodeForm.aspx';

    // Creates our data array that we want to post to the endpoint
    $data_to_post = [
        'ReferID' => $EmployeeID,
        'PicID' => $PicID,
    ];
    
    // Sets our options array so we can assign them all at once
    $options = [
        CURLOPT_URL        => $endpoint_url,
        CURLOPT_POST       => true,
        CURLOPT_POSTFIELDS => $data_to_post,
    ];
    
    // Initiates the cURL object
    $curl = curl_init();
    
    // Assigns our options
    curl_setopt_array($curl, $options);
    
    // Executes the cURL POST
    $results = curl_exec($curl);
    
    // Be kind, tidy up!
    curl_close($curl);
    
    
    //echo($results);
    $filename = "src/image/".$EmployeeID.".png";
    if($results == "1"){
        if(file_put_contents("src/image/".$EmployeeID."_".$PicID.".png", fopen("http://cc.cnu.ac.th:8085/Content/Images/EmployeeQRcode/".$EmployeeID.".png", 'r'))){
            $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'_'.$PicID.'/';
            $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'_'.$PicID.'/300';
            $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
        }else{
            $textReplyMessage = "ไม่พบข้อมูล QRCode";
            $replyData = new TextMessageBuilder($textReplyMessage);
        }
    }else{
        $textReplyMessage = "404";
        $replyData = new TextMessageBuilder($textReplyMessage);
    }
    return $replyData;
}

function text_show_qr(){
    $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/linebot-qr/';
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/linebot-qr/240';
    $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
    return $replyData;
}

function text_show_pqr(){
    $textReplyMessage = "เลือกพื้นหลังสำหรับ QR Code";
    $textMessage = new TextMessageBuilder($textReplyMessage);


    $TemplateMessage = new TemplateMessageBuilder('Image Carousel',
        new ImageCarouselTemplateBuilder(
            array(
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG1/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป1' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG2/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป2' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG3/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป3' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG4/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป4' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG5/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป5' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),      
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG6/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป6' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                 ),
                new ImageCarouselColumnTemplateBuilder(
                    WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG7/700',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้',// ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป7' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),                                
            )
        )
    );

    $replyData = new MultiMessageBuilder;
    $replyData->add($textMessage);
    $replyData->add($TemplateMessage);
    return $replyData; 
}
function text_request_pqr_by($userMessage){
    $PicID = substr($userMessage, strlen($userMessage)-1);
    $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/qrav'.$PicID.'/';
    $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/qrav'.$PicID.'/240';
    $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
    return $replyData;
}



?>