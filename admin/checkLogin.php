<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-2
 * Time: 15:59
 */
if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['user'] && $_POST['password']){
    $user = mysql_real_escape_string($_POST['user']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    include "../Mysql.class.php";
    $Mysql = new Mysql();
    $query = "select user from admin where user = '".$user."' and password = '".$password."'";
    $Mysql->query($query);
    if(mysql_affected_rows() > 0){
        session_start();
        $_SESSION['user'] = $user;
        $Mysql->close();
        header('location: management.php');
        exit;
    }else{
        $Mysql->close();
        echo "<meta charset='utf-8'><script>alert('登陆失败！');window.location = 'login.html';</script>";
    }
}