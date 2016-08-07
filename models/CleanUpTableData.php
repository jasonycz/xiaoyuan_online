<?php

require_once("Base.php");

class CleanTableData{
    private $base;
    public function __construct(){
        $this->base = new Base();
    }
    
    public function cleanTable($table){
        if(empty($table)){
            return '表名为空!\n';
        }
        $pic_sql = "truncate table " .$table;
        $this->base->exec($pic_sql);
        echo "表pic中数据被清空!<br>";
    }
}



