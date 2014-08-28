<?php

/*
 * 注册模块
 */

require_once("DA.php");
#echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
$nickname = $_POST["name"];
$pregstr_name = '/^[\x{4e00}-\x{9fa5}]+$/u';

if (!preg_match($pregstr_name, $nickname)) {
	echo 'input error';
}

$user_id = rand(1, 10000);
$mysql = 









?>
