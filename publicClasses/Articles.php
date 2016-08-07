<?php
/**
* 
*/
class Articles{

	/**
	 * @param  array 参数详情请参看http://developers.byr.cn/wiki/api2/sec-brd
	 * @return array
	 */
	/**
	 * @return [type]
	 * @desc 获取指定版面的信息
	 */
	public function get_articles_info($config){
		if(empty($config['board_name']) || empty($config['mode']) || empty($config['count']) || empty($config['start_page']) || empty($config['end_page']) || empty($config['has_attachment'])){
			return;
		}
		$mode = $config['mode'];
		$count = $config['count'];
		$start_page = $config['start_page'];
		$end_page = $config['end_page'];
		$board_name = $config['board_name'];
		$has_attachment = $config['has_attachment'];

		$access_token = $_COOKIE['access_token'];
		$pre_url = "https://bbs.byr.cn/open";
		$query_url = "/board/$board_name.json";
		$url = $pre_url.$query_url;

		$theme_article = array();
		for($i=$start_page;$i<$end_page;$i++){
			$get_data ="&mode=".$mode."&count=".$count."&page=".$i;
			$res = file_get_contents($url.'?oauth_token='.$access_token.$get_data);
			$res_arr = json_decode($res,true);

			// 如果$access_token过期了
			if($res_arr['error'] == 'expired_token' || empty($access_token)){
				$refresh_token = $_COOKIE['refresh_token'];
				require_once ("./OAuth.php");
				$oAuth = new OAuth();
				$oAuth->refresh_access_token($access_token,$refresh_token);
				$this->get_articles_info();
			}else{
				if($has_attachment == 'yes'){
					foreach ($res_arr['article'] as $key => $value) {
						if($value['has_attachment'] == 1){
							array_push($theme_article, $value);
						}	
					}
				}else{
					foreach ($res_arr['article'] as $key => $value) {
						array_push($theme_article, $value);	
					}
				}
				
			}
	
		}
		return $theme_article;

	}
	/**
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public function get_article_pic($board_name,$theme_article){
		if(empty($theme_article) || empty($board_name)){
			return;
		}
		$access_token = $_COOKIE['access_token'];
		//  获取当前主题的信息
		$pic = array();
		$temp = array();
		$pre_url = "https://bbs.byr.cn/open";
		foreach ($theme_article as $key => $value) {
			$query_url = "/article/$board_name/".$value['id'].".json";
			$url = $pre_url.$query_url;
			$res = file_get_contents($url.'?oauth_token='.$access_token);
			$res_arr = json_decode($res,true);

			if($res_arr['error'] == 'expired_token'){
				$refresh_token = $_COOKIE['refresh_token'];
				require_once ("./OAuth.php");
				$oAuth = new OAuth();
				$oAuth->refresh_access_token($access_token,$refresh_token);
				$this->get_article_pic();
			}else{
				$post_time = date("Y-m-d H:i:s",$res_arr['post_time']);
				$board_name = $res_arr['board_name'];

				foreach ($res_arr['attachment']['file'] as $key => $value) {
					$att_file_url = str_replace('open/attachment','att',$value['url']);
					$temp['pic_url'] = $att_file_url;
					$temp['pic_name'] = $value['name'];
					$temp['board_name'] = $board_name;
					$temp['post_time'] = $post_time;
					array_push($pic, $temp);
				}
			}
			
		}
		return $pic;
	}
	

}