<?php

require_once ("../publicClasses/Friends.php");
$friends = new Friends();
$board_name = "Friends";
$config = array(
	'mode' => 2,
	'count' => 50,
	'start_page' => '1',
	'end_page' => '2',
	'board_name' => $board_name,
	'has_attachment' => 'yes'
);

// $friends->post_friends_info($config);

$friends_pic = $friends->get_friends_pic();

foreach ($friends_pic as $key => $value) {
	echo "<div style='float:left;margin-left:50px'>";
	echo "<img src= ".$value['pic_url']." style=width:200px;height:200px/><br>";
	echo $value['board_name'].'---'.$value['post_time'];
	echo "</div>";
}