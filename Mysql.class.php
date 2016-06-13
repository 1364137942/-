<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-5-25
 * Time: 22:59
 */
class Mysql {


    private $conn = null; // 保存连接的资源

    public function __construct() {


        $connect = mysql_connect('121.42.171.181','root','ali') or die('fail to connect');
        $this->conn = mysql_select_db('classmanagement',$connect) or die('fail to connect classmanagement');
        mysql_set_charset('utf8');

    }

    // 负责发送sql查询
    public function query($sql) {
        $re = mysql_query($sql) or die(mysql_error());
        return $re;
    }

    // 负责获取多行多列的select 结果
    public function getAll($sql) {
        $list = array();
        $rs = $this->query($sql);
        if(!$rs) {
            return false;
        }
        while($row = mysql_fetch_assoc($rs)) {
//            var_dump($row);
            $list[] = $row;
        }
        return $list;

    }

    // 获取一行的select 结果
    public function getRow($sql) {
        $rs = $this->query($sql);
        if(!$rs) {
            return false;
        }
        return mysql_fetch_assoc($rs);
    }

    public function close() {
        mysql_close();
    }
}
