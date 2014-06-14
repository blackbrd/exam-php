<?php 

	// $host = 'mysql51-98.perso';
	// $user = 'gilleslamain';
	// $pass = 'advisory1';
	// $db_love = 'gilleslamain';

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$text_editable = 'text_editable';

	$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
	mysql_select_db($text_editable, $connect) or die(mysql_error());


  ?>