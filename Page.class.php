<?php
/**
 * Created by PhpStorm.
 * User: 子健
 * Date: 2016-6-4
 * Time: 11:01
 */
class Page{


    private $perpage;
    private $totalPageNum;
    private $pageNum;
    private $result;
    public function __construct($Mysql,$all,$perpage,$eachPage){
        $this->totalPageNum = $Mysql->getRow($all)['total_num'];
        $this->perpage = $perpage;
        $this->pageNum = ceil($this->totalPageNum / $perpage); // 向上取整
        $this->result = $class = $Mysql->getAll($eachPage);
    }
    public function getPage(){
        return array(
            "result" => $this->result,
            "pageNum" => $this->pageNum
        );
    }
}