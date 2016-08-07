<?php
require_once ("../models/CleanUpTableData.php");
require_once ("../publicClasses/Friends.php");
require_once ("../publicClasses/Picture.php");
require_once ("../publicClasses/Travel.php");
require_once ("../log/Log.php");

$log = new Log();

// 清空数据库信息
$clean_data = new CleanTableData();
$table = 'pic';
$clean_data->cleanTable($table);
$log->createLog("清空数据库信息");

// 获取情感天空数据
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

$friends->post_friends_info($config);
$log->createLog("获取情感天空数据");

// 获取旅游数据
$travel = new Travel();
$board_name = "Travel";
$config = array(
	'mode' => 2,
	'count' => 50,
	'start_page' => '1',
	'end_page' => '2',
	'board_name' => $board_name,
	'has_attachment' => 'yes'
);
$travel->post_travel_info($config);
$log->createLog("获取旅游数据");

// 获取贴图秀数据
$picture = new Picture();
$board_name = "Picture";
$config = array(
	'mode' => 2,
	'count' => 50,
	'start_page' => '1',
	'end_page' => '2',
	'board_name' => $board_name,
	'has_attachment' => 'yes'
);

$picture->post_picture_info($config);
$log->createLog("获取贴图秀数据");

















