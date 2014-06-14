<?php 


function name()
{

	$user = array();
	$query = mysql_query(" SELECT firstname,lastname from users WHERE email='$email' AND password='$password'") or die(mysql_error());

	while($rows = mysql_fetch_assoc($query))
	{
		$user[]=$rows;
	}
	return $user;
}




function nom_utilisateur()
{

	$utilisateur = array();

	$query = mysql_query("SELECT * FROM users") or die(mysql_error());

	while($rows = mysql_fetch_assoc($query)) 
	{
		$utilisateur[] = $rows;
	}
	return $utilisateur;
}


function info_utilisateur($id)
{
	$id = (int)$id;
	$sql = mysql_query("SELECT * FROM users WHERE id='$id'");

	return mysql_fetch_assoc($sql);
}

function modifier_profile($firstname,$lastname,$email,$username,$password,$newpassword,$repeatnewpassword,$website,$instagram,$twitter,$flickr,$biography,$avatar,$avatar_tmp)
{
	move_uploaded_file($avatar_tmp,'avatar/'.$avatar);
	$result = mysql_query("UPDATE users SET firstname='$firstname',lastname='$lastname',email='$email',username='$username',password='$password',newpassword='$newpassword',repeatnewpassword='$repeatnewpassword',website='$website',instagram='$instagram',twitter='$twitter',flickr='$flickr',biography='$biography',avatar='$avatar' WHERE id='{$_SESSION['id']}'");
}



?>