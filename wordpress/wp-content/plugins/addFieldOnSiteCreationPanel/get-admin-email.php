<?php
require_once("../../../wp-load.php");
global $current_user;
get_currentuserinfo();
echo $current_user->user_email;
?>