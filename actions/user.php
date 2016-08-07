<?php

require_once ("../publicClasses/User.php");
$user = new User();
$user_id = 'ln2';
$user_info = $user->get_user_info($user_id);
echo "<pre>";
print_r($user_info);
echo "</pre>";
