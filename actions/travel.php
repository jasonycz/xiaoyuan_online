
<?php

require_once ("../publicClasses/Travel.php");
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

// $travel->post_travel_info($config);

$travel_pic = $travel->get_travel_pic();

foreach ($travel_pic as $key => $value) {
	echo "<div style='float:left;margin-left:50px'>";
	echo "<img src= ".$value['pic_url']." style=width:200px;height:200px/><br>";
	echo $value['board_name'].'---'.$value['post_time'];
	echo "</div>";
}