<?php
	ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>xiaoyuan</title>
	<link href="//cdn.bootcss.com/bootstrap/4.0.0-alpha.3/css/bootstrap.css" rel="stylesheet">
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
</head>

<body>
<script >
$(function(){
	// 免登录
	$(".main").remove();
	$(".byr-header-bar").remove();
	$("#trans-tooltip").remove();
});
</script>

<?php
	require_once ('./publicClasses/OAuth.php');

	function p($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}
	function ps($str){
		p($str);
		die();
	}

	$oAuth = new OAuth();
	echo $oAuth->get_login_view();
	$authorization_code = $oAuth->get_authorization_code();
	if(empty($authorization_code)){
		// return;
?>
<script >
    // login free`
	$("#Username").val('ln2');
	$("#Password").val('12345678');
	$("#login_button").click();
</script>
<?php
	}
	$token = $oAuth->get_access_token();

?>
	<div class="container">
		<div class="row col-md-8" style="border:3px solid red">
			<ul>
				<li><a href="./actions/friends.php">获取情感天空</a></li>
				<li><a href="./actions/travel.php">获取旅游</a></li>
				<!-- <li><a href="./actions/sections.php">分区信息</a></li>
				<li><a href="./actions/user.php">获取用户信息</a></li>
				<li><a href="./actions/picture.php">获取贴图秀</a></li> -->
			</ul>
			
		</div>
	</div>

</body>
</html>
<?php
	ob_end_flush();
?>


