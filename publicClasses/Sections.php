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
class Sections{

	public function get_sections_info(){
		$access_token = $_COOKIE['access_token'];
	// $access_token = "8dc1830fe14c346dd12d2805f3499a50";
    // $refresh_token = "2824e40120073131ead3f56003db52ad";

		$pre_url = "https://bbs.byr.cn/open";
		$query_url = "/section.json";
		$url = $pre_url.$query_url;
		$res = file_get_contents($url.'?oauth_token='.$access_token);
		$res_arr = json_decode($res,true);

		if($res_arr['error'] == 'expired_token'){
			$refresh_token = $_COOKIE['refresh_token'];
			require_once ("./OAuth.php");
			$oAuth = new OAuth();
			$oAuth->refresh_access_token($access_token,$refresh_token);
			$this->get_sections_info();
		}else{
			return $res_arr;
		}
		
	}
	function __construct()
	{
		
	}
	

}