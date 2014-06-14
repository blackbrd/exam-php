<?php 
	session_start();

	$connect = mysql_connect('localhost','root','root') or die(mysql_error());
	mysql_select_db('members') or die(mysql_error());

	include('function.php');

	
	$_SESSION['id'] = 56;

	// cmt faire pour dire que $_SESSION['id'] = l'id lié à l'email - mdp avec lequel user vient de se connect
	// $sql = mysql_query("SELECT id FROM users WHERE email='$email' AND password='$password'");

	// $_SESSION['id'] = 56;
?>