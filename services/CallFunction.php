<?php
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;

require_once "DBConnection.php";

require_once "ApiSettings.php";

function text_abount_LAW_show()
{
    //$picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/law/240';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=law&width=240';
    $videoUrl = WEBSERVICE_URL . "/src/video/Laws.mp4";
    $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    return $replyData;
}

function text_abount_BBA_show()
{
    //$picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/bba/240';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=bba&width=240';
    $videoUrl = WEBSERVICE_URL . "/src/video/Management.mp4";
    $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    return $replyData;
}

function text_abount_POL_show()
{
    //$picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/pol/240';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pol&width=240';
    $videoUrl = WEBSERVICE_URL . "/src/video/Political.mp4";
    $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    return $replyData;
}

function text_abount_NURSE_show()
{
    //$picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/nurse/240';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=nurse&width=240';
    $videoUrl = WEBSERVICE_URL . "/src/video/Nurse.mp4";
    $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    return $replyData;
}

function text_abount_PH_show()
{
    //$picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/ph/240';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=ph&width=240';
    $videoUrl = WEBSERVICE_URL . "/src/video/MixPublic.mp4";
    $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    return $replyData;
}

function text_faculty_show()
{
    $ab_LAW = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะนิติศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สาขาที่เปิดสอน', // ข้อความแสดงในปุ่ม
            'สาขาที่เปิดสอนคณะนิติศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน', // ข้อความแสดงในปุ่ม
            'ค่าเล่าเรียนคณะนิติศาสตร์'
        ),

    );

    $ab_BBA = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะบริหารศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สาขาที่เปิดสอน', // ข้อความแสดงในปุ่ม
            'สาขาที่เปิดสอนคณะบริหารศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน', // ข้อความแสดงในปุ่ม
            'ค่าเล่าเรียนคณะบริหารศาสตร์'
        ),
    );

    $ab_POL = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะรัฐศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สาขาที่เปิดสอน', // ข้อความแสดงในปุ่ม
            'สาขาที่เปิดสอนคณะรัฐศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน', // ข้อความแสดงในปุ่ม
            'ค่าเล่าเรียนคณะรัฐศาสตร์'
        ),
    );

    $ab_NURSE = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะพยาบาลศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สาขาที่เปิดสอน', // ข้อความแสดงในปุ่ม
            'สาขาที่เปิดสอนคณะพยาบาลศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน', // ข้อความแสดงในปุ่ม
            'ค่าเล่าเรียนคณะพยาบาลศาสตร์'
        ),
    );

    $ab_PH = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะสาธารณสุขศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สาขาที่เปิดสอน', // ข้อความแสดงในปุ่ม
            'สาขาที่เปิดสอนคณะสาธารณสุขศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'ค่าเล่าเรียน', // ข้อความแสดงในปุ่ม
            'ค่าเล่าเรียนคณะสาธารณสุขศาสตร์'
        ),
    );

    $replyData = new TemplateMessageBuilder('คณะ',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'คณะนิติศาสตร์',
                    'Faculty of Law',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=law&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/law/700',
                    $ab_LAW
                ),
                new CarouselColumnTemplateBuilder(
                    'คณะบริหารศาสตร์',
                    'Faculty of Management Science',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=bba&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/bba/700',
                    $ab_BBA
                ),
                new CarouselColumnTemplateBuilder(
                    'คณะรัฐศาสตร์',
                    'Faculty of Political Science',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pol&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/pol/700',
                    $ab_POL
                ),
                new CarouselColumnTemplateBuilder(
                    'คณะพยาบาลศาสตร์',
                    'Faculty of Nursing',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=nurse&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/nurse/700',
                    $ab_NURSE
                ),
                new CarouselColumnTemplateBuilder(
                    'คณะสาธารณสุขศาสตร์',
                    'Faculty of Public Health',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=ph&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/ph/700',
                    $ab_PH
                ),
            )
        )
    );
    return $replyData;
}

function text_department_law_show()
{
    $ab_LAW = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขานิติศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขานิติศาสตร์'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขานิติศาสตร์'
        ),
    );
    $replyData = new TemplateMessageBuilder('คณะนิติศาสตร์',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'สาขานิติศาสตร์',
                    'Bachelor of Laws',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Laws-1&width=568&height=377',
                    //WEBSERVICE_URL.'/imgsrc/photos/f/law/700',
                    $ab_LAW
                ),
            )
        )
    );
    return $replyData;
}
function text_department_bba_show()
{
    $ab_ACC = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาการบัญชี' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาการบัญชี'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาการบัญชี'
        ),
    );
    $ab_COM = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาคอมพิวเตอร์ธุรกิจ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาคอมพิวเตอร์ธุรกิจ'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาคอมพิวเตอร์ธุรกิจ'
        ),
    );
    $ab_Management = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาการจัดการ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาการจัดการ'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาการจัดการ'
        ),
    );

    $replyData = new TemplateMessageBuilder('คณะบริหารศาสตร์',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'สาขาการบัญชี',
                    'Bachelor of Accountancy',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Acc1&width=568&height=377',
                    $ab_ACC
                ),
                new CarouselColumnTemplateBuilder(
                    'สาขาคอมพิวเตอร์ธุรกิจ',
                    'Bachelor of Business Administration (Business Computer)',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=com-1&width=568&height=377',
                    $ab_COM
                ),
                new CarouselColumnTemplateBuilder(
                    'สาขาการจัดการ',
                    'Bachelor of Business Administration (Management)',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Management-1&width=568&height=377',
                    $ab_Management
                ),
            )
        )
    );
    return $replyData;
}
function text_department_pol_show()
{
    $ab_LOC = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาการปกครองท้องถิ่น' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาการปกครองท้องถิ่น'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาการปกครองท้องถิ่น'
        ),
    );
    $replyData = new TemplateMessageBuilder('คณะรัฐศาสตร์',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'สาขาการปกครองท้องถิ่น',
                    'Bachelor of Political Science (Local Politics)',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Po-1&width=568&height=377',
                    $ab_LOC
                ),
            )
        )
    );
    return $replyData;
}
function text_department_nurse_show()
{
    $ab_NURSE = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาพยาบาลศาสตร์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาพยาบาลศาสตร์'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาพยาบาลศาสตร์'
        ),
    );
    $ab_NURSE_Assistant = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาผู้ช่วยพยาบาล' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาผู้ช่วยพยาบาล'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาผู้ช่วยพยาบาล'
        ),
    );
    $ab_EI = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาผู้ดูแลผู้สูงอายุ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาผู้ดูแลผู้สูงอายุ'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาผู้ดูแลผู้สูงอายุ'
        ),
    );
    $ab_PI = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาผู้ช่วยทันตแพทย์' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาผู้ช่วยทันตแพทย์'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาผู้ช่วยทันตแพทย์'
        ),
    );
    $replyData = new TemplateMessageBuilder('คณะพยาบาลศาสตร์',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'สาขาพยาบาลศาสตร์',
                    'Bachelor of Nursing',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Nu-1&width=568&height=377',
                    $ab_NURSE
                ),
                new CarouselColumnTemplateBuilder(
                    'ประกาศนียบัตรผู้ช่วยพยาบาล',
                    'Certificate in Practical Nursing Program',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-nurse1&width=568&height=377',
                    $ab_NURSE_Assistant
                ),
                new CarouselColumnTemplateBuilder(
                    'ประกาศนียบัตรผู้ดูแลผู้สูงอายุ',
                    'Diploma in Elderly’s Care Giver Program',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-El1&width=568&height=377',
                    $ab_EI
                ),
                new CarouselColumnTemplateBuilder(
                    'ประกาศนียบัตรผู้ช่วยทันตแพทย์',
                    'Certificate Program in Dental Assistant',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-pt1&width=568&height=377',
                    $ab_PI
                ),
            )
        )
    );
    return $replyData;
}
function text_department_PH_show()
{
    $ab_Pu = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาสาธารณสุขชุมชน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาสาธารณสุขชุมชน'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาสาธารณสุขชุมชน'
        ),
    );
    $ab_OCC = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาอาชีวอนามัยและความปลอดภัย' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาอาชีวอนามัยและความปลอดภัย'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาอาชีวอนามัยและความปลอดภัย'
        ),
    );
    $ab_Trad = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับสาขา', // ข้อความแสดงในปุ่ม
            'เกี่ยวกับสาขาแพทย์แผนไทย' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จุดเด่น', // ข้อความแสดงในปุ่ม
            'จุดเด่นสาขาแพทย์แผนไทย'
        ),
        new MessageTemplateActionBuilder(
            'แนวทางการประกอบอาชีพ', // ข้อความแสดงในปุ่ม
            'การประกอบอาชีพสาขาแพทย์แผนไทย'
        ),
    );
    $replyData = new TemplateMessageBuilder('คณะสาธารณสุขศาสตร์',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'สาขาสาธารณสุขชุมชน',
                    'Bachelor of Sciences (Public Health)',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Pu-1&width=568&height=377',
                    $ab_Pu
                ),
                new CarouselColumnTemplateBuilder(
                    'สาขาอาชีวอนามัยและความปลอดภัย',
                    'Bachelor of Sciences (Occupational Health and Safety)',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Occ-1&width=568&height=377',
                    $ab_OCC
                ),
                new CarouselColumnTemplateBuilder(
                    'สาขาแพทย์แผนไทย',
                    'Bachelor of Thai Traditional Medicine',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Trad-1&width=568&height=377',
                    $ab_Trad
                ),
            )
        )
    );
    return $replyData;
}

function text_tuition_fee()
{
    // $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/Tuition-fee/';
    // $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/Tuition-fee/240';
    $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Tuition-fee';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Tuition-fee&width=700';
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_tuition_fee_byID($FacultyID)
{
    $picFullSize = "";
    $picThumbnail = "";
    switch ($FacultyID) {
        case "1":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paylaws';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paylaws&width=700';
            }break;
        case "2":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paybus';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paybus&width=700';
            }break;
        case "4":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paypol';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paypol&width=700';
            }break;
        case "6":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paynu';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Paynu&width=700';
            }break;
        case "7":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=PayPu';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=PayPu&width=700';
            }break;
        default:break;
    }
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_contact()
{
    $textReplyMessage = "เลือกวิทยาเขต\r\nศรีสะเกษ พิมพ์ SSK\r\nสุรินทร์ พิมพ์ SRN\r\nบุรีรัมย์ พิมพ์ BRM\r\nนครศรีธรรมราช พิมพ์ NST\r\nเพชรบูรณ์ พิมพ์ PNB\r\nระยอง พิมพ์ RYG";
    $replyData = new TextMessageBuilder($textReplyMessage);
    return $replyData;
}

function text_contact_SSK()
{
    $textReplyMessage = "วิทยาเขตศรีสะเกษ\r\nโทรศัพท์ 045-617-971";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "99 หมู่ 6 ต.โพธิ์ อ.เมือง จ.ศรีสะเกษ 33000";
    $latitude = 15.1063854;
    $longitude = 104.3905991;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_SRN()
{
    $textReplyMessage = "วิทยาเขตสุรินทร์\r\nโทรศัพท์ 044-143-143";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 7 ถ.สุรินทร์-ปราสาท ต.เฉนียง อ.เมือง จ.สุรินทร์ 32000";
    $latitude = 14.8044052;
    $longitude = 103.4509349;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_BRM()
{
    $textReplyMessage = "วิทยาเขตบุรีรัมย์\r\nโทรศัพท์ 044-666-583";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 8 ต.ชุมเห็ด อ.เมือง จ.บุรีรัมย์ 31000";
    $latitude = 15.0256117;
    $longitude = 103.094873;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_NST()
{
    $textReplyMessage = "วิทยาเขตนครศรีธรรมราช\r\nโทรศัพท์ 075-446-458";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 13 ต.ช้างซ้าย อ.พระพรหม จ.นครศรีธรรมราช 80000";
    $latitude = 8.3667308;
    $longitude = 99.9713934;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_PNB()
{
    $textReplyMessage = "วิทยาเขตเพรชบูรณ์\r\nโทรศัพท์ 056-911-655";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333 หมู่ 8 ต.บ้านโตก อ.เมือง จ.เพรชบูรณ์ 67000";
    $latitude = 16.3444715;
    $longitude = 101.0903101;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;
    return $replyData;
}
function text_contact_RYG()
{
    $textReplyMessage = "วิทยาเขตระยอง\r\nโทรศัพท์ 038-672-898";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $placeName = "ที่ตั้ง";
    $placeAddress = "333/3 หมู่ 3 ถ.สุขุมวิท ต.วังหว้า อ.แกลง จ.ระยอง 21110";
    $latitude = 12.7662674;
    $longitude = 101.6288038;
    $locationMessage = new LocationMessageBuilder($placeName, $placeAddress, $latitude, $longitude);

    $multiMessage = new MultiMessageBuilder;
    $multiMessage->add($textMessage);
    $multiMessage->add($locationMessage);

    $replyData = $multiMessage;

    return $replyData;
}

function text_recruit_show()
{
    $actions = array(
        new \LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder("มี", "Coming Soon !"),
        new \LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder("ไม่มี", "http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPage1Form.aspx?ReferID=0000000000"),
    );
    $button = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder("มีผู้แนะนำหรือไม่", $actions);
    $replyData = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder("confim message", $button);
    return $replyData;
}

function text_student_show()
{
    $actionBuilder = array(
        new UriTemplateActionBuilder(
            'ตรวจสิทธิ์การเข้าสอบ', // ข้อความแสดงในปุ่ม
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
            $actionBuilder // กำหนด action object
        )
    );
    return $replyData;
}

function text_teacher_show()
{
    $actionBuilder = array(
        // new UriTemplateActionBuilder(
        //     'สร้าง QRCode รับสมัคร', // ข้อความแสดงในปุ่ม
        //     'http://cc.cnu.ac.th:8085/Pages/LineBot/GenEmployeeQRCodeForm.aspx'
        // ),

        new MessageTemplateActionBuilder(
            'สร้าง QRCode', // ข้อความแสดงในปุ่ม
            'สร้างคิวอาร์โค้ด' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'สร้างภาพโฆษณา', // ข้อความแสดงในปุ่ม
            'สร้างภาพโฆษณา' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'พิมพ์ใบชำระเงิน', // ข้อความแสดงในปุ่ม
            'พิมพ์ใบชำระเงิน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new UriTemplateActionBuilder(
            'เข้าระบบ EMS', // ข้อความแสดงในปุ่ม
            'https://cc.cnu.ac.th'
        ),
    );
    $imageUrl = '';
    $replyData = new TemplateMessageBuilder('อาจารย์',
        new ButtonTemplateBuilder(
            'อาจารย์', // กำหนดหัวเรื่อง
            'เลือกเมนู', // กำหนดรายละเอียด
            $imageUrl, // กำหนด url รุปภาพ
            $actionBuilder // กำหนด action object
        )
    );
    return $replyData;
}

function text_request_qr($userMessage)
{

    $EmployeeID = substr($userMessage, 2, strlen($userMessage));

    // Sets our destination URL
    $endpoint_url = 'http://cc.cnu.ac.th:8085/Pages/LineBot/EmployeeQRCodeForm.aspx';

    // Creates our data array that we want to post to the endpoint
    $data_to_post = [
        'ReferID' => $EmployeeID,
    ];

    // Sets our options array so we can assign them all at once
    $options = [
        CURLOPT_URL => $endpoint_url,
        CURLOPT_POST => true,
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
    if ($results == "1") {
        if (file_put_contents("src/image/" . $EmployeeID . ".png", fopen("http://cc.cnu.ac.th:8085/Content/Images/EmployeeQRcode/" . $EmployeeID . ".png", 'r'))) {
            // $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'/';
            // $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'/300';
            $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=' . $EmployeeID;
            $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=' . $EmployeeID . '&width=300';
            $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
        } else {
            $textReplyMessage = "ไม่พบข้อมูล QRCode";
            $replyData = new TextMessageBuilder($textReplyMessage);
        }
    } else {
        $textReplyMessage = "404";
        $replyData = new TextMessageBuilder($textReplyMessage);
    }

    return $replyData;
}

function text_request_pqr($userMessage)
{
    $EmployeeID = substr($userMessage, 3, strlen($userMessage) - 5);
    $PicID = substr($userMessage, strlen($userMessage) - 1);

    // Sets our destination URL
    $endpoint_url = 'http://cc.cnu.ac.th:8085/Pages/LineBot/EmployeeQRCodeForm.aspx';

    // Creates our data array that we want to post to the endpoint
    $data_to_post = [
        'ReferID' => $EmployeeID,
        'PicID' => $PicID,
    ];

    // Sets our options array so we can assign them all at once
    $options = [
        CURLOPT_URL => $endpoint_url,
        CURLOPT_POST => true,
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
    $filename = "src/image/" . $EmployeeID . ".png";

    if ($results == "1") {
        if (file_put_contents("src/image/" . $EmployeeID . "_" . $PicID . ".png", fopen("http://cc.cnu.ac.th:8085/Content/Images/EmployeePromoteQRcode/" . $EmployeeID . ".png", 'r'))) {
            // $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'_'.$PicID.'/';
            // $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/'.$EmployeeID.'_'.$PicID.'/300';
            $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=' . $EmployeeID . '_' . $PicID;
            $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=' . $EmployeeID . '_' . $PicID . '&width=300';
            $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
        } else {
            $textReplyMessage = "ไม่พบข้อมูล QRCode";
            $replyData = new TextMessageBuilder($textReplyMessage);
        }
    } else {
        $textReplyMessage = "404";
        $replyData = new TextMessageBuilder($textReplyMessage);
    }
    return $replyData;
}

function text_show_qr()
{
    // $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/linebot-qr/';
    // $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/linebot-qr/240';
    $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=linebot-qr';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=linebot-qr&width=300';
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_show_pqr()
{
    $textReplyMessage = "เลือกพื้นหลังสำหรับ QR Code";
    $textMessage = new TextMessageBuilder($textReplyMessage);

    $TemplateMessage = new TemplateMessageBuilder('เลือกพื้นหลังสำหรับ QR Code',
        new ImageCarouselTemplateBuilder(
            array(
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG1/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG1&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป1' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG2/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG2&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป2' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG3/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG3&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป3' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG4/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG4&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป4' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG5/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG5&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป5' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG6/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG6&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
                        'สร้างคิวอาร์โค้ดรูป6' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                    )
                ),
                new ImageCarouselColumnTemplateBuilder(
                    //WEBSERVICE_URL.'/imgsrc/photos/f/QR_BG7/480',
                    WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=QR_BG7&width=480',
                    new MessageTemplateActionBuilder(
                        'เลือกรูปนี้', // ข้อความแสดงในปุ่ม
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
function text_request_pqr_by($userMessage)
{
    $PicID = substr($userMessage, strlen($userMessage) - 1);
    // $picFullSize = WEBSERVICE_URL.'/imgsrc/photos/f/qrav'.$PicID.'/';
    // $picThumbnail = WEBSERVICE_URL.'/imgsrc/photos/f/qrav'.$PicID.'/240';
    $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=qrav' . $PicID;
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=qrav' . $PicID . '&width=240';
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_request_aj($userMessage)
{
    $link = "http://cc.cnu.ac.th:8085/Pages/Recruit/Formv2/RecruitPage1.aspx?ReferID=";
    $replyMessage = $link . substr($userMessage, 3, strlen($userMessage));
    $replyData = new TextMessageBuilder($replyMessage);
    return $replyData;
}

function text_request_db($userMessage)
{
    $link = "http://cc.cnu.ac.th:8085/Pages/DashBoard/ManageDashBoard/DashBoardPageEmployeeForm.aspx?ReferID=";
    $replyMessage = $link . substr($userMessage, 3, strlen($userMessage));
    $replyData = new TextMessageBuilder($replyMessage);
    return $replyData;
}

function text_request_pay($userMessage)
{
    $link = "http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPaymentPage.aspx?";
    $strRequest = explode("#", substr($userMessage, 4, strlen($userMessage)));
    $strIDNumber = "idnumber=" . $strRequest[0];
    $strYear = "&Year=" . $strRequest[1];

    $replyMessage = $link . $strIDNumber . $strYear;
    $replyData = new TextMessageBuilder($replyMessage);
    return $replyData;
}
function text_request_pay2($userMessage)
{
    $link = "http://cc.cnu.ac.th:8085/Pages/Recruit/Form/RecruitPaymentPage.aspx?";
    $strRequest = explode("#", substr($userMessage, 5, strlen($userMessage)));
    $strIDNumber = "idnumber=" . $strRequest[0];
    $strYear = "&Year=" . $strRequest[1];
    $strAmount = "&Amount=" . $strRequest[2];

    $replyMessage = $link . $strIDNumber . $strYear . $strAmount;
    $replyData = new TextMessageBuilder($replyMessage);
    return $replyData;
}
function text_print()
{
    $replyData = new TemplateMessageBuilder('ต้องการระบุจำนวนเงินหรือไม่',
        new ConfirmTemplateBuilder(
            'ต้องการระบุจำนวนเงินหรือไม่', // ข้อความแนะนำหรือบอกวิธีการ หรือคำอธิบาย
            array(
                new MessageTemplateActionBuilder(
                    'ระบุ', // ข้อความสำหรับปุ่มแรก
                    'พิมพ์ใบจ่ายเงินระบุจำนวนเงิน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                ),
                new MessageTemplateActionBuilder(
                    'ไม่ระบุ', // ข้อความสำหรับปุ่มแรก
                    'พิมพ์ใบจ่ายเงินไม่ระบุจำนวนเงิน' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                ),
            )
        )
    );
    return $replyData;
}

function text_print_amount()
{
    $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pay2';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pay2&width=240';
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_print_tatal()
{
    $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pay';
    $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pay&width=240';
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_department_about_show($DepartmentID)
{
    $picThumbnail = "";
    $videoUrl = "";

    $picFullSize = "";
    $picThumbnail = "";
    //$replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);

    switch ($DepartmentID) {
        case "11":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Laws&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Laws.mp4";
            }break;
        case "21":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Acc&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Account.mp4";
            }break;
        case "22":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Com&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Computer.mp4";
            }break;
        case "23":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Management&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Management.mp4";
            }break;
        case "41":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Po&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Political.mp4";
            }break;
        case "61":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Nu&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Nurse.mp4";
            }break;
        case "62":{
                // $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-nurse&width=240';
                // $videoUrl = WEBSERVICE_URL . "/src/video/about/Nurse.mp4";

                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-nurse';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-nurse&width=240';
            }break;
        case "63":{
                // $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-El&width=240';
                // $videoUrl = WEBSERVICE_URL . "/src/video/about/Nurse.mp4";

                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-el';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-el&width=240';
            }break;
        case "64":{
                // $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=P-pt&width=240';
                // $videoUrl = WEBSERVICE_URL . "/src/video/about/Nurse.mp4";

                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-pt';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-pt&width=240';

            }break;
        case "71":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Pu&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Public.mp4";
            }break;
        case "72":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Occ&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/Occupational.mp4";
            }break;
        case "73":{
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=Trad&width=240';
                $videoUrl = WEBSERVICE_URL . "/src/video/about/ThaiTraditional.mp4";
            }break;
        default:break;
    }

    if ($DepartmentID == "62" || $DepartmentID == "63" || $DepartmentID == "64") {
        $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    } else {
        $replyData = new VideoMessageBuilder($videoUrl, $picThumbnail);
    }

    return $replyData;
}

function text_department_pros_show($DepartmentID)
{
    $picFullSize = "";
    $picThumbnail = "";
    switch ($DepartmentID) {
        case "11":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-law';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-law&width=240';
            }break;
        case "21":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-acc';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-acc&width=240';
            }break;
        case "22":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-com';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-com&width=240';
            }break;
        case "23":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-man';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-man&width=240';
            }break;
        case "41":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-pol';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-pol&width=240';
            }break;
        case "61":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-nurse';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-nurse&width=240';
            }break;
        case "62":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-nurse-a';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-nurse-a&width=240';
            }break;
        case "63":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=about-El';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=about-El&width=240';

            }break;
        case "64":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=about-pt';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=about-pt&width=240';
            }break;
        case "71":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-ph';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-ph&width=240';
            }break;
        case "72":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-occ';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-occ&width=240';
            }break;
        case "73":{
                $picFullSize = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-tra';
                $picThumbnail = WEBSERVICE_URL . '/imgsrc/photos/pic.php?mode=f&file=pros-tra&width=240';
            }break;
        default:break;
    }
    $replyData = new ImageMessageBuilder($picFullSize, $picThumbnail);
    return $replyData;
}

function text_department_work_show($DepartmentID)
{
    $replyMessage = "";
    switch ($DepartmentID) {
        case "11":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขานิติศาสตร์\n\n- ทนายความ\n- ที่ปรึกษาทางกฎหมาย\n- ผู้พิพากษา\n- พนักงานอัยการ\n- นิติกร\n- งานราชการ\n- งานธนาคาร\n- อาจารย์พิเศษ";
            }break;
        case "21":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาการบัญชี\n\n- นักบัญชี/ พนักงานบัญชี/ เจ้าหน้าที่ทางการเงิน\n- ผู้เชี่ยวชาญด้านภาษี (Tax Specialist)\n- ผู้ตรวจสอบบัญชี (Auditor)\n- ผู้สอบบัญชีรับอนุญาต (CPA)\n- ที่ปรึกษาทางบัญชี\n- รับราชการ\n- ครู/ อาจารย์/ ติวเตอร์\n- ธุรกิจส่วนตัว";
            }break;
        case "22":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาคอมพิวเตอร์ธุรกิจ\n\n- เจ้าหน้าที่ฝ่ายคอมพิวเตอร์ในหน่วยงานธุรกิจ\n- เจ้าหน้าที่ฝ่ายขาย\n- เจ้าหน้าที่ฝ่ายสนับสนุนด้านซอฟต์แวร์  (Support)\n- เจ้าหน้าที่ฝ่าย e-learning\n- เจ้าหน้าที่ฝ่ายบริหารสำนักงาน\n- เจ้าหน้าที่พัฒนาซอฟต์แวร์\n- เจ้าหน้าที่ฝ่ายบัญชีคอมพิวเตอร์หรือระบบบริหารงานบุคคล";
            }break;
        case "23":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาการจัดการ\n\n- งานด้านการบริหารจัดการฝ่ายต่าง ๆ ภายในองค์กร นักบริหาร นักธุรกิจ (ผู้จัดการการดำเนินงาน)\n- งานด้านการควบคุมคุณภาพภายในองค์กร การควบคุมอุตสาหกรรม (ผู้ประเมินผลิตภัณฑ์ ผู้ควบคุมคุณภาพ)\n- งานด้านที่ปรึกษาขององค์กร (นักวิเคราะห์ธุรกิจ)\n- นักวิจัยธุรกิจ นักวางแผนพัฒนาธุรกิจ ทางด้านผลิตภัณฑ์หรือนวัตกรรมใหม่ๆ (นวัตกร)\n- งานด้านธุรกิจพาณิชย์อิเล็กทรอนิกส์\n- งานด้านการวางแผนกลยุทธ์ นโยบายหรือการจัดการความรู้ (นักวางแผนกลยุทธ์)";
            }break;
        case "41":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาการปกครองท้องถิ่น\n\n- งานราชการ หรือบางคนจะเรียกว่า “รัฐกิจ” คือการบริหารงานให้กับกิจการของรัฐ งานที่สามารถสมัครได้ เช่น เจ้าหน้าที่บริหารงานทั่วไป  เจ้าหน้าที่วิเคราะห์นโยบายและแผน เจ้าหน้าที่ประสานงาน เจ้าหน้าที่บริหารงานบุคคล เลขานุการบริหาร นักวิชาการศึกษา นายอำเภอ หรือเจ้าหน้าที่ด้านการปกครองอื่น ๆ หน่วยงานที่เปิดรับ คือ กระทรวง ทบวง กรม หรือหน่วยงานรายชการต่างๆ\n\n- งานรัฐวิสาหกิจ เป็นหน่วยงานที่บริหารร่วมกันระหว่างภาครัฐและเอกชน ตำแหน่งงานที่เปิดรับ จึงไม่ต่างจากตำแหน่งงานของงานราชการ และบริษัทเอกชนมากนัก ขึ้นอยู่กับว่าเรากำลังมองหางานแบบไหน หรือต้องการทำงานกับหน่วยงานใด\n\n- งานบริษัทเอกชน สำหรับคนที่ต้องการ และกำลังมองหาตำแหน่งงานในบริษัทเอกชน ขึ้นอยู่กับว่าจะเอาความรู้ที่ได้เรียนมานั้น ไปปรับใช้กับการทำงานในตำแหน่งอะไร ตำแหน่งงานที่เปิดรับสมัครจึงค่อนข้างหลากหลาย เช่น เจ้าหน้าที่ HR นักวิเคราะห์โครงการ นักวิเคราะห์การลงทุน นักวิเคราะห์ระบบงาน นักบริหารองค์การระดับสูง เป็นต้น";
            }break;
        case "61":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาพยาบาลศาสตร์\n\n- พยาบาลวิชาชีพ สามารถทำงานได้ทั้งโรงพยาบาลรัฐบาล และเอกชน หรือคลีนิค\n- ตัวแทนจำหน่ายเครื่องมือพิเศษ เครื่องมือแพทย์\n- อาจารย์\n- เปิดธุรกิจส่วนตัว เช่น เปิดสถานรับเลี้ยงเด็กหรือเปิดโรงเรียนสอนเด็กอนุบาล ฯลฯ";
            }break;
        case "62":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาผู้ช่วยพยาบาล\n\n- มีหน้าที่ในการช่วยเหลือดูแลเพื่อบรรเทาอาการโรค ทำหัตถการต่างๆ ยกเว้น การให้ยา ฉีดยา และหัตถการที่มีการใส่อุปกรณ์ทางการแพทย์เข้าไปในร่างกาย\n- สามารถทำงานได้ทั้งโรงพยาบาลรัฐบาล และเอกชน หรือผู้ช่วยตามคลินิก\n- รับจ้างเฝ้าไข้ตามบ้าน หรือตามศูนย์ดูแลผู้ป่วย";
            }break;
        case "63":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาผู้ดูแลผู้สูงอายุ\n\n- สามารถทำงานได้ทั้งโรงพยาบาลรัฐบาล และเอกชน หรือผู้ศูนย์ดูแลผู้สูงอายุ\n- รับจ้างดูแลผู้สูงอายุตามบ้าน\n- เปิดกิจการส่วนตัวด้านการดูแลผู้สูงอายุ";
            }break;
        case "64":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาผู้ช่วยทันตแพทย์\n\n- ความสำคัญของผู้ช่วยทันตแพทย์ : ผู้ช่วยทันตแพทย์ มีส่วนสำคัญอย่างมากในการปฏิบัติงานของทันตแพทย์ เพราะถ้าขาดผู้ช่วยทันตแพทย์ไปทันตแพทย์ก็เหนื่อยขึ้นเป็นทวีคูณการทำงานต่างๆก็จะยุ่งยากมากขึ้นเหมือนขาดมือไปหนึ่งข้างก็ว่าได้ ซึ่งในปัจจุบันผู้ช่วยทันตแพทย์มีไม่เพียงพอกับความต้องการของหน่วยงานต่างๆทั้งภาครัฐและเอกชน\n\n- หน้าที่ของผู้ช่วยทันตแพทย์ : จัดเตรียมห้องตรวจห้องทำฟัน เตรียมเครื่องมือ งานแลปต่างๆ ตรวจวัสดุทางทันตกรรม ครุภัณฑ์ ช่วยข้างเก้าอี้ทันตแพทย์ในการรักษาทางทันตกรรมเช่น รับ-ส่ง-ถือเครื่องมือ ดูดน้ำลาย ผสมวัสดุ รวมทั้งให้ความรู้ในด้านการดูแลสุขภาพช่องปากแก่ประชาชนทั่วไป";
            }break;
        case "71":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาสาธารณสุขชุมชน\n\n- นักวิชาการสาธารณสุข\n- นักวิชาการสุขาภิบาล\n- นักวิชาการหรือนักอนามัยสิ่งแวดล้อม\n- นักวิทยาศาสตร์อาชีวอนามัย\n- เจ้าหน้าที่สุขศึกษาสาธารณสุข\n- เจ้าหน้าที่โภชนาการสาธารณสุข\n- อาจารย์";
            }break;
        case "72":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาอาชีวอนามัยและความปลอดภัย\n\n- เจ้าหน้าที่ความปลอดภัยในการทำงาน (จป.)\n- สามารถปฏิบัติงานให้เป็นไปตามข้อกำหนดของกฎหมายที่เกี่ยวกับอาชีวอนามัย ความปลอดภัย และ สิ่งแวดล้อม ของหน่วยงานราชการที่เกี่ยวข้อง\n- การวางแผน ควบคุม ประสานงาน ด้านความปลอดภัย และการป้องกันอุบัติเหตุต่างๆ เนื่องจาก การทำงาน\n- การวางแผน ควบคุม ประสานงาน และป้องกันโรคที่เกิดจากการทำงาน\n- การบริหารจัดการด้านความปลอดภัย อาชีวอนามัย และสภาพแวดล้อมในการทำงาน\n- การวางแผนและควบคุมการสูญเสียของการผลิต\n- การจัดฝึกอบรมให้ความรู้ในด้านความปลอดภัย อาชีวอนามัย และสภาพแวดล้อมในการทำงาน ให้กับ ผู้ที่สนใจ และเกี่ยวข้อง";
            }break;
        case "73":{
                $replyMessage = "แนวทางการประกอบอาชีพสาขาแพทย์แผนไทย\n\n- นักการแพทย์แผนไทย\n- ครู/อาจารย์\n- SPA Therapist\n- ควบคุมการผลิตยาในโรงงานยา\n- ทำงานด้านการแพทย์ทางเลือก\n- เปิดคลีนิคแพทย์แผนไทย\n- หัตถเวชกรรมแผนไทย (หมอนวด)\n- เปิดร้านขายยาสำหรับแผนไทย\n ข้าราชการสาธารสุข\n นักโภชนาการ\n นักจิตวิทยา ใช้ธรรมชาติรักษาผู้ป่วย\n วางแผนนโยบายด้านสุขภาพ\n";
            }break;
        default:break;
    }
    $replyData = new TextMessageBuilder($replyMessage);
    return $replyData;
}
