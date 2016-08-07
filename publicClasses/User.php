<?php

/**
* 
*/
class User{

	public function get_user_info($user_id){
		$access_token = $_COOKIE['access_token'];
		$pre_url = "https://bbs.byr.cn/open";
		$query_url = "/user/query/$user_id.json";
		$url = $pre_url.$query_url;
		$res_json = file_get_contents($url.'?oauth_token='.$access_token);	
		$res_arr = json_decode($res_json,true);	
		// 如果$access_token过期了
		if($res_arr['error'] == 'expired_token'){
			$refresh_token = $_COOKIE['refresh_token'];
			require_once ("./OAuth.php");
			$oAuth = new OAuth();
			$oAuth->refresh_access_token($access_token,$refresh_token);
			$this->get_user_info();
		}else{
			return $res_arr;
		}
		
	}
	function __construct()
	{
		
	}
	

}