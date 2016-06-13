<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-4
 * Time: 15:21
 */
session_start();
if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
    unset($_SESSION['admin']);
    header('location:login.html');
    exit;
}