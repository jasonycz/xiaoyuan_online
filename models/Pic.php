<?php
/**
 * @name Pic
 * @desc 对从论坛获取的图片信息进行操作
 * @author 杨承志(woyc1234567@126.com)
 */
require_once("Base.php");
class Model_Pic extends Base{
    public function __construct(){
        parent::__construct();
    }
    /**
     * @param string $sql sql语句
     * @return mixed
     * 涉及表 actions
     */
    public function query($sql) {
        $result = parent::query($sql);
        return $result;
    }

    public function exec($sql) {
        $result = parent::exec($sql);
        return $result;
    }
    /**
     * @param  [type]
     * @return [type]
     */
    public function save($pic){
    	// 组装sql 进行图片信息数据存数
    	if(empty($pic)){
    		return;
    	}
		$sql = "INSERT INTO pic(board_name,pic_url,post_time)VALUES";

		foreach ($pic as $key => $value) {
			$ext = strrchr($value['pic_name'], ".");
			if($ext != '.png' && $ext != '.gif' && $ext != ".jpg" && $ext != ".bmp" && $ext != ".jpeg" && $ext != ".JPEG"){

			}else{
				// echo "<img src= ".$value['pic_url']." style=width:200px;height:200px/>";
				$sql .= "('".$value['board_name']."','".$value['pic_url']."','".$value['post_time']."'),";
			}
		}
        $sql = substr($sql,0,-1);
		$this->exec($sql);
    }
    /**
     * @param  [type]
     * @return [type]
     */
    public function get($sql){
        // 组装sql 进行图片信息数据存数
        if(empty($sql)){
            return;
        }
    // p($sql);
        return $this->query($sql);
    }
}
