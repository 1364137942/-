<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-2
 * Time: 15:38
 */
include "../Gdufs.class.php";
$username = $_POST['user'];
$password = $_POST['password'];
$grab = new Gdufs($username);
$url = "http://jxgl.gdufs.edu.cn/jsxsd/xk/LoginToXkLdap";
$field = array('USERNAME'=>$username,'PASSWORD'=>$password);
if($grab->login($url,$field)){
    $res = $grab->loginResult();
    session_start();
    $_SESSION['user'] = $res['name'];
    $_SESSION['num'] = $res['num'];
    header("Location:main.php");
    exit;
}
else{
    echo "<meta charset='utf-8'><script>alert('登陆失败！');window.location = 'login.html';</script>";
    exit;
}