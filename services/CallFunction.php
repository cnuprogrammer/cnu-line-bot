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


function text_A(){
    $textReplyMessage = "คุณพิมพ์ A";
    return $replyData = new TextMessageBuilder($textReplyMessage);
}

function text_abount_faculty_show(){
    $picThumbnail = WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/nurse/240';
    $videoUrl = WEBSERVICE_URL."cnu-line-bot/src/video/Nurse.mp4"; 
    $replyData = new VideoMessageBuilder($videoUrl,$picThumbnail);
    return $replyData;
}

function text_faculty_show(){
    $actionBuilder = array(
        new MessageTemplateActionBuilder(
            'เกี่ยวกับคณะ',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับคณะ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'จบแล้วทำงานอะไร',// ข้อความแสดงในปุ่ม
            'จบแล้วทำงานอะไร' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
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
                    WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/law/700',
                    $actionBuilder
                ),
                new CarouselColumnTemplateBuilder(
                    'บริหารศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/bba/700',
                    $actionBuilder
                ),
                new CarouselColumnTemplateBuilder(
                    'รัฐศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/pol/700',
                    $actionBuilder
                ),     
                new CarouselColumnTemplateBuilder(
                    'พยาบาลศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/nurse/700',
                    $actionBuilder
                ),
                new CarouselColumnTemplateBuilder(
                    'สาธารณสุขศาสตร์',
                    'Description Carousel',
                    WEBSERVICE_URL.'cnu-line-bot/imgsrc/photos/f/ph/700',
                    $actionBuilder
                ),
                                    
            )
        )
    );
    return $replyData; 
}


?>