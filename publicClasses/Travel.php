<?php
/**
* 
*/
require_once("../models/Base.php");
require_once("../models/Pic.php");
require_once("Articles.php");
class Travel{

	/**
	 * @param  array 参数详情请参看http://developers.byr.cn/wiki/api2/sec-brd
	 * @return array
	 */
	private $model_pic;
	private $board_name;
	public function __construct(){
		$this->model_pic = new Model_Pic();
		$this->board_name = "Travel";
	}
	
	public function post_travel_info($config){

		// 获取Friends板块文章信息
		$articles = new Articles();
		$theme_article = $articles->get_articles_info($config);

		// 获取Friends板块文章中的图片信息
		$pic = $articles->get_article_pic($this->board_name,$theme_article);

		// 保存图片
		$this->model_pic->save($pic);
	}
	/**
	 * @return 从数据库中获取旅游图片信息
	 */
	public function get_travel_pic(){
		$sql = 'select * from pic where board_name = "'.$this->board_name.'" group by pic_url order by post_time desc';
		$res = $this->model_pic->get($sql);
		return $res;
	}
	











}