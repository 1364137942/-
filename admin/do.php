<?php
header("Content-type:text/html;charset=utf-8");
    $filename = $_FILES['file']['tmp_name'];
    if (empty ($filename)) {
        echo "<script>alert('请选择要导入的CSV文件！');self.location='classList.php';</script>";
        exit;
    }
//$filename = "‪F:\\XAMPP\\htdocs\\wangjian\\boss\\class.xls";
//    error_reporting(E_ALL ^ E_NOTICE);
    require_once '../excel_reader2.php';
    $data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8");
//    echo $data->sheets[0]['numRows']." ";
    //echo $data->sheets[0]['numCols']."<br>";
    $value = '';
    if($data){
        for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++){
            $id = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][1]); //中文转码
            $building = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][2]); //中文转码
            $room = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][3]); //中文转码
            $size = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][4]); //中文转码
            $type = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][5]); //中文转码
            $usage = iconv('utf-8', 'utf-8', $data->sheets[0]['cells'][$i][6]); //中文转码

            if(empty($id)){
                break;
            }

            $value .= "('$id','$building','$room','$size','$type','$usage'),";

        }
    }else{
        echo "<script>alert('打开excel文档失败！');self.location='classList.php';</script>";
    }

    $value = substr($value,0,-1); //去掉最后一个逗号
    include "../Mysql.class.php";
    $Mysql = new Mysql();
    $Mysql->query("delete from class");
    $re = $Mysql->query("insert into class (id,building,room,size,type,`usage`) values $value");//批量插入数据表中
    $Mysql->close();
    if($re){
        //echo '导入成功！';

        echo "<script>alert('导入成功！');self.location='classList.php';</script>";
    }else{
        //echo '导入失败！';
        echo "<script>alert('导入失败，请检查后重新导入！');self.location='classList.php';</script>";
    }




?>