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
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'นิติศาสตร์จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'บริหารศาสตร์จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'รัฐศาสตร์จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'พยาบาลศาสตร์จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'สาธารณสุขศาสตร์ จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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


?>