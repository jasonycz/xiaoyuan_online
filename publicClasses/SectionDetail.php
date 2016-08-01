<?php
function p($str){
	echo "<pre>";
	print_r($str);
	echo "</pre>";
}
function ps($str){
	p($str);
	die();
}
/**
* 
*/
class SectionDetail{

	public function get_section_detail_info(){
		$access_token = $_COOKIE['access_token'];		
		$section_id = $_GET['section_id'];

		$pre_url = "https://bbs.byr.cn/open";
		$query_url = "/section/$section_id.json";
		$url = $pre_url.$query_url;
		$res = file_get_contents($url.'?oauth_token='.$access_token);
		$res_arr = json_decode($res,true);

		if($res_arr['error'] == 'expired_token'){
			$refresh_token = $_COOKIE['refresh_token'];
			require_once ("./OAuth.php");
			$oAuth = new OAuth();
			$oAuth->refresh_access_token($access_token,$refresh_token);
			$this->get_section_detail_info();
		}else{
			return $res_arr;
		}
		
	}
	function __construct()
	{
		
	}
	

}