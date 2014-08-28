<html>
<head><title>站点用户数据库</title>
</head>
<body bgcolor="#1C86EE" text="#000000" link="#0000cc" vlink="#ff0033">
<h1><font color=blue size=5 face="宋体">当前用户信息</font></h1>
<hr/>
<?php

require_once("DA.php");

$mysql = new DA();
$sql = "select * from user_data where user_id = ?";
$params = array();
$params[0] = 1;
$result = $mysql->execute_sql($sql, $params, 'd');
while ($row = $result->fetch_array()) {                       
	echo "Id: ".$row[user_id]." ";
	echo "Name: ".$row[nickname]."</br> ";
}
$mysql->rollback();








?>
</body>
</html>
