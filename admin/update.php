<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-4
 * Time: 13:39
 */
include "../Mysql.class.php";
$Mysql = new Mysql();
$check = mysql_real_escape_string($_POST['check']);
$name = mysql_real_escape_string($_POST['name']);
$building = mysql_real_escape_string($_POST['building']);
$room = mysql_real_escape_string($_POST['room']);
$email = mysql_real_escape_string($_POST['email']);
$date = mysql_real_escape_string($_POST['date']);
$time = mysql_real_escape_string($_POST['time']);
$id = mysql_real_escape_string($_POST['order_id']);
$query = "update `order` set `check` = '".$check."' where id = '".$id."'";
$re = $Mysql->query($query);
switch($check){
    case 1 : $comment = '待审核';break;
    case 2 : $comment = '通过';break;
    case 3 : $comment = '不通过';break;
}
if($re){
    $Mysql->close();
    include "../phpmailer/class.phpmailer.php";
    try {
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
        $mail->SMTPAuth   = true;                  //开启认证
        $mail->Port       = 25;
        $mail->Host       = "smtp.126.com";
        $mail->Username   = "weixinyizhan";
        $mail->Password   = "wxyz2015";
        //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
        $mail->AddReplyTo("weixinyizhan@126.com","mckee");//回复地址
        $mail->From       = "weixinyizhan@126.com";
        $mail->FromName   = "广外教室管理";
        $to = $email;
        $mail->AddAddress($to);
        $mail->Subject  = "广外教室申请回复";
        $mail->Body = $name."同学你申请的".$date." ".$time."教室".$building."-".$room."经过教室管理员审核后,予以".$comment;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
        $mail->WordWrap   = 80; // 设置每行字符串的长度
        //$mail->AddAttachment("f:/test.png");  //可以添加附件
        $mail->IsHTML(true);
        $mail->Send();
    } catch (phpmailerException $e) {
        echo false;
        exit;
    }

    echo true;
}else{
    echo false;
}
