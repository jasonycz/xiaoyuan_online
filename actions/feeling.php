<?php

require_once ("../publicClasses/Feeling.php");
$user = new User();
$user_id = 'ln2';
$user_info = $user->get_user_info($user_id);
p($user_info);
