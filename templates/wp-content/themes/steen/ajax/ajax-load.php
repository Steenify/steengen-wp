<?php

add_action('wp_ajax_nopriv_sendmail', 'sendmail');
add_action('wp_ajax_sendmail', 'sendmail');
function sendmail()
{
    $to = "duypt@steenify.com";
    $type = $_POST["type"];
    $ho = $_POST["ho"];
    $ten = $_POST["ten"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $message = $_POST["message"];
    $subject = "";
    $content ='';

    if ( 'contact' == $type) {
        $subject = "Khách hàng liên lạc với OEXPO";
        $content ='Khách hàng liên lạc với OEXPO từ website'.'<br />'
            .'Tên:'.$ho.' '.$ten.'<br />'
            .'SĐT:'.$phone.'<br />'
            .'Email:'.$email.'<br />'
            .'Địa chỉ:'.$address.'<br />'
            .'Lời nhắn:'.$message.'';
    } else if ( 'consultant' == $type ) {
        $subject = "Khách hàng liên lạc tư vấn phối màu";

        $content ='Thông tin khách hàng cần tư vấn phối màu'.'<br />'
        .'Tên:'.$ho.' '.$ten.'<br />'
        .'SĐT:'.$phone.'<br />'
        .'Email:'.$email.'<br />'
        .'Địa chỉ:'.$address.'<br />'
        .'Lời nhắn:'.$message.'';
    } else if ( 'schedule' == $type ) {

    }
        

    $headers = array('charset=UTF-8');

    $result = wp_mail($to, $subject, $content,  array('Content-Type: text/html; charset=UTF-8'));
}