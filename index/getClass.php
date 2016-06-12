<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-6
 * Time: 19:34
 */
header("Content-type: text/html; charset=utf-8");
session_start();
if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
    header('location:index.php');
    exit;
}
$date = mysql_real_escape_string($_POST['date']);
$time = mysql_real_escape_string($_POST['time']);
$type = mysql_real_escape_string($_POST['type']);
$building = mysql_real_escape_string($_POST['building']);
$floor = mysql_real_escape_string($_POST['floor']);

//$date = '2016-06-06';
//$time = '上午';
//$type = 1;
//$building = 'A';
//$floor = '2';

include "../Mysql.class.php";
$Mysql = new Mysql();
$query = "select id,room from class where `type` = '".$type."' and building = '".$building."' having floor(room/100) = ".$floor;
$class = $Mysql->getAll($query);
$classId = "";
for($i = 0;$i<count($class)-1;$i++){
   $classId .= $class[$i]['id'].",";
}
$classId .= $class[count($class)-1]['id'];


//强制转换日期格式
$date_str=date('Y-m-d',strtotime($date));
//封装成数组
$arr=explode("-", $date_str);
//参数赋值
//年
$year=$arr[0];
//月，输出2位整型，不够2位右对齐
$month=sprintf('%02d',$arr[1]);
//日，输出2位整型，不够2位右对齐
$day=sprintf('%02d',$arr[2]);
//时分秒默认赋值为0；
$hour = $minute = $second = 0;
//转换成时间戳
$strap = mktime($hour,$minute,$second,$month,$day,$year);
//获取数字型星期几
$number_wk=date("w",$strap);

//得到所选楼层的当天课程表
$query2 = "select class_id,week from course where class_id in (".$classId.") and week = '".$number_wk."' and time = '".$time."'";

//得到所选楼层当天的的预定课室情况
$query3 = "select class_id,`check` from `order` where class_id in (".$classId.") and date = '".$date."' and time = '".$time."'";

$query4 = "select * from class left join (".$query2.") as a on class.id = a.class_id left join (".$query3.") as b on class.id = b.class_id  where id in (".$classId.") order by id asc";
$re = $Mysql->getAll($query4);
if($re){
    echo json_encode($re);
}

//var_dump($class); //得到的楼层教室
//echo "<br>";
//echo "<br>";
//var_dump($course); //得到所选楼层的当天课程表
//echo "<br>";
//echo "<br>";
//var_dump($order); ////得到所选楼层当天的的预定课室情况
//echo "<br>";
//echo "<br>";


