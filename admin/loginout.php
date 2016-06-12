<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-4
 * Time: 15:21
 */
session_start();
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    session_destroy();
    header('location:login.html');
    exit;
}