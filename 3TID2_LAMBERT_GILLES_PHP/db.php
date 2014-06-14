<?php 

	// $host = 'mysql51-98.perso';
	// $user = 'gilleslamain';
	// $pass = 'advisory1';
	// $db_love = 'gilleslamain';

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db_love = 'db_love';

	$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($db_love, $connect) or die(mysql_error());


  ?>