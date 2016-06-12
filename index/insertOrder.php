<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-11
 * Time: 22:06
 */
session_start();
if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
    header('location:index.php');
    exit;
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../Mysql.class.php";
    $Mysql = new Mysql();
    $classId = mysql_real_escape_string($_POST['id']);
    $date = mysql_real_escape_string($_POST['date']);
    $time = mysql_real_escape_string($_POST['time']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $email = mysql_real_escape_string($_POST['email']);
    $reason = mysql_real_escape_string($_POST['reason']);
    $name = $_SESSION['user'];
    $num = $_SESSION['num'];
    $data = "('$classId','$date','$time','$name','$num','$phone','$email','$reason')";
    $query = "insert into `order`(class_id,date,time,name,num,phone,email,reason) VALUES ".$data;
    $re = $Mysql->query($query);
    if($re){
        echo "<meta charset='utf-8'><script>alert('提交申请成功！');window.location = history.go(-1);</script>";
    }else{
        echo "<meta charset='utf-8'><script>alert('提交申请失败！');window.location = history.go(-1);</script>";
    }
}else{
    echo "<meta charset='utf-8'><script>alert('没有要提交的数据！');window.location = history.go(-1);</script>";
}
