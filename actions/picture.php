<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title></title>
    <link rel="stylesheet" type="text/css" href="../public/css/myPhoto.css" />
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>

    <link rel="stylesheet" href="../public/css/idangerous.swiper.css">
<style>
    html {
      height: 100%;
    }
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 13px;
      line-height: 1.5;
      position: relative;
      height: 100%;
    }
    .swiper-container {
      width: 100%;
      height: 100%;
      color: #fff;
      text-align: center;
    }
    .swiper-slide .title {
      font-style: italic;
      font-size: 42px;
      margin-top: 80px;
      margin-bottom: 0;
      line-height: 45px;
    }
    .swiper-slide .photoOuterMostDiv {
      width: 100%;
      height: 100%;
      background-repeat: no-repeat;
      background-position: 50%;
      background-color: white;

      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      background-size: 100%;
      visibility: visible;
        
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      -ms-transition: all 0.5s ease;
      transition: all 0.5s ease;

    }
    .pagination {
      position: absolute;
      z-index: 20;
      left: 10px;
      bottom: 10px;
    }
    .swiper-pagination-switch {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 8px;
      background: #222;
      margin-right: 5px;
      opacity: 0.8;
      border: 1px solid #fff;
      cursor: pointer;
    }
    .swiper-visible-switch {
      background: #aaa;
    }
    .swiper-active-switch {
      background: #fff;
    }
</style>

</head>
<body>
    <div class="swiper-container">
    	<div class="swiper-wrapper">
<?php

require_once ("../publicClasses/Picture.php");
$picture = new Picture();
$board_name = "Picture";
$config = array(
	'mode' => 2,
	'count' => 50,
	'start_page' => '1',
	'end_page' => '5',
	'board_name' => $board_name,
	'has_attachment' => 'yes'
);

// $picture->post_picture_info($config);

$picture_pic = $picture->get_picture_pic();

$variable = $picture_pic;
$sum_item = count($variable);
echo "<strong>共".$sum_item."张图片</strong><br><br>";
$_html='';
foreach ($variable as $key => $value) {
    $_html .= '<div class="swiper-slide ">';
    $_html .= '<span style="color:black;font-size:40px;" >这是第'.($key+1).'/'.$sum_item.'张图片</span><br>';
    // $_html .= '<img src="'.$value['pic_url'].'">';
    $_html .= '<div class="photoOuterMostDiv" style="background-image:url('.$value['pic_url'].');"></div>';
    $_html .= '</div>';

}
echo $_html;
// foreach ($travel_pic as $key => $value) {
// 	echo "<div style='float:left;margin-left:50px'>";
// 	echo "<img src= ".$value['pic_url']." style=width:200px;height:200px/><br>";
// 	echo $value['board_name'].'---'.$value['post_time'];
// 	echo "</div>";
// }

?>
    <div class="pagination"></div>
	</div>
	    </div>
<script src="../public/js/idangerous.swiper.js"></script>
<script type="text/javascript">
$(function(){
  var mySwiper = $('.swiper-container').swiper({
    loop: true,
    //其他设置
    pagination: '.pagination',
    paginationClickable: true,
  });
})
</script>


</body>
</html>