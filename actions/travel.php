<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../public/css/lightbox.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/myPhoto.css" />
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
    <script src="../public/js/jquery.lightbox.js"></script>
    <script src="../public/js/myPhoto.js"></script>
    <script type="text/javascript" src="../public/js/move-top.js"></script>
    <script type="text/javascript" src="../public/js/easing.js"></script>
</head>
<body>

    <div class="myPhoto">
    	<div class="myPhotos">

<?php
require_once ("header.php");
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
$variable = $travel_pic;
echo "<strong>共".count($variable)."张图片</strong><br><br>";
$_html='';
foreach ($variable as $key => $value) {

    $_html .= '<div class="photoOuterMostDiv" style="background-image:url('.$value['pic_url'].');">';
    $_html .= "<div class='overlay'>";
    $_html .= '<a href='.$value['pic_url'].' data-rel="lightbox" class="fa fa-expand" descript="类别:'.$value['board_name'].'创建时间:'.$value['post_time'].'"></a>';
    $_html .= "</div>";
    $_html .= "</div>";

}
echo $_html;
// foreach ($travel_pic as $key => $value) {
// 	echo "<div style='float:left;margin-left:50px'>";
// 	echo "<img src= ".$value['pic_url']." style=width:200px;height:200px/><br>";
// 	echo $value['board_name'].'---'.$value['post_time'];
// 	echo "</div>";
// }

?>


	</div>
	    </div>
</body>
</html>