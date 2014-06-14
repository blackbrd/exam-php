<?php  

include('connect.php');


if(isset($_POST['submit']))
{
	$email = htmlspecialchars(trim($_POST['email']));

	// $password = htmlspecialchars(trim($_POST['password']));
	// $newpassword = htmlspecialchars(trim($_POST['newpassword']));

		$password = 			md5(htmlspecialchars(trim($_POST['password'])));
		$newpassword = 			md5(htmlspecialchars(trim($_POST['newpassword'])));
		$repeatnewpassword = 	md5(htmlspecialchars(trim($_POST['repeatnewpassword'])));


	$firstname = htmlspecialchars(trim($_POST['firstname']));
	$lastname = htmlspecialchars(trim($_POST['lastname']));
	$username = htmlspecialchars(trim($_POST['username']));
	$website = htmlspecialchars(trim($_POST['website']));
	$instagram = htmlspecialchars(trim($_POST['instagram']));
	$twitter = htmlspecialchars(trim($_POST['twitter']));
	$flickr = htmlspecialchars(trim($_POST['flickr']));
	$biography = htmlspecialchars(trim($_POST['biography']));

	$avatar = $_FILES['avatar']['name'];
	$avatar_tmp=$_FILES['avatar']['tmp_name'];

	$errors = array();



	// EMAIL
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$errors[] = "<p class='upAlert'>Fill in a valid email please</p>";
	}

	if(strlen($biography)>500)
	{
		$errors[] = "<p class='upAlert'>You have a lot to say, that's nice! But your biography must be shorter,</br>you only have 500 charachters (over 40)</p>";
	}


	if(!empty($avatar))
	{
		$image = explode('.',$avatar);
		$image_ext = end($image);
		if(in_array(strtolower($image_ext),array('png','jpeg','jpg','gif')) === false) 
		{
			$errors[] = "<p class='upAlert'>Your profile picture must be a valid image file</p>";
		}
	}


			if($password&&$newpassword&&$repeatnewpassword) 
			{
				if($newpassword==$repeatnewpassword)
				{
					$password = md5($password);
					$newpassword = md5($newpassword);
					$repeatnewpassword = md5($repeatnewpassword);

					// $connect = mysql_connect('mysql51-98.perso','gilleslamain','advisory1') or die('error');
					// mysql_select_db('gilleslamain');

					$query = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password'"); // ca bug ici à partir d'ici ?
					$rows = mysql_num_rows($query);

					if($rows==1)
					{
					$newpass = mysql_query("UPDATE users SET password='$newpassword' WHERE email='$email'");

					die('Check your new password <a href="login.php">Log in</a>');
					// si je vire le die (a faire, belle page > please reconenct to validate), la reinitialisation marche pas..
					// si je fais un simple echo par exemple

					}else echo "<p class='upAlert'>votre ancien mdp est incorrect</p>";

				} else echo "<p class='upAlert'>The two cases need to be the same</p>";

			}
		







	// si pas d'erreurs on update dans la BDD
	if(empty($errors))
	{
		modifier_profile($firstname,$lastname,$email,$username,$password,$newpassword,$repeatnewpassword,$website,$instagram,$twitter,$flickr,$biography,$avatar,$avatar_tmp);
	?>

		<script type="text/javascript"> window.location.reload(). </script>
		<p id="majProfile" class="upAlert">Your profile has been updated, congratz!</p>

	<?php
	}else {
		foreach ($errors as $error) {
			echo $error;
		}
	}
}



$info = info_utilisateur($_SESSION['id']); // récupère toutes les données via le $_SESSION
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>F O K U S | Edit your Profile</title>
        <meta name="viewport" content="initial-scale=1.0;">
        <meta name="robots" content="noindex">
        <meta name="description" content="***************************" />
        <meta name="keywords" content="******************************" /> 
        <link rel="shortcut icon" type="image/png" href="http://gilleslambert.be/tfe/favicon1.png" />

 		<link rel='stylesheet' href='./_assets/css/reset.min.css'>
		<link rel='stylesheet' href='./_assets/css/style.css'>
</head>

<body class='profile'>
		
        <div class='container'>

            <div class='topBar'>
               
                <div class='barInner'>

                    <a href='#'><h1 class='logo'>logo</h1></a>
                     <nav>
                        <a id="save" href='#'>Save</a>
                        <a href='profile.php?id<?php echo $_SESSION['id'];?>'>Cancel</a>
                        <a id='logOut' href='logout.php'>Log Out</a>
                    </nav>
                </div>
            </div>



            <header class='headerEdit'>

                    <div id='introContainer'>
                            <div class='centerAllProfile'>
<!-- 
                                <h1 class='register-title'>Custom your profile</h1>
                                <h2 class='register-subtitle'>This is all yours</h2>
 -->

								<form id="updateInfo" method='POST' action='modifier.php' align='center' autocomplete='off' enctype='multipart/form-data'>

									<fieldset class='f-form editProfil'>


									<!-- AVATAR -->
									<span class='formfield full profilePic'>
										
										<input id="uploadAvatar" type='file' name='avatar'/>
										
										<div id="avatar-edit">
 											<?php 
					                            if ($info['avatar'] == true ) 
					                            {
					                            ?>
					                                <img class="author-img" src="avatar/<?php echo $info['avatar']; ?>" center center alt="profilepicture">
					                            <?php
					                            }else{
					                            ?>
					                                <img class="author-img" src="avatar/default.png" center center alt="profilepicture">
					                            <?php
					                            }
				                         	?>
				                         </div>

									</span>


                                <h1 class='register-title'>Custom your profile</h1>
                                <h2 class='register-subtitle'>This is all yours</h2>



						            <span class='formfield '>
										<p class='info'>Firstname</p>
										<input type='text' name='firstname' value="<?php echo $info['firstname']?>" tabindex='1'>
									</span>

						            <span class='formfield'>
										<p>Lastname</p>
										<input type='text' name='lastname' value="<?php echo $info['lastname']?>" tabindex='2'>
									</span>

						            <span class='formfield'>
										<p>Username</p>
										<input type='text' name='username' value="<?php echo $info['username']?>" tabindex='3'>
									</span>

						           <span class='formfield'>
										<p>Email Address</p>
										<input type='text' name='email' value="<?php echo $info['email']?>" tabindex='4'>
									</span>



									<span class='formfield'>
										<p>Password</p>
										<input type='password' name='password' placeholder='Fill in old password' tabindex='5'>
									</span>

									<span class='formfield'>
										<p>New password</p>
										<input type='password' name='newpassword' placeholder='Fill in new password' tabindex='6'>
									</span>

									<span class='formfield'>
										<p>Repeat New password</p>
										<input type='password' name='repeatnewpassword' placeholder='Repeat new password' tabindex='7'>
									</span>

										<svg version='1.0' id='separateCross' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
		 									width='30px' height='30px' viewBox='0 0 200 200' enable-background='new 0 0 200 200' xml:space='preserve'>
											<line fill='none' stroke='#FFFFFF' stroke-width='7' stroke-miterlimit='10' x1='0' y1='0' x2='200' y2='200'/>
											<line fill='none' stroke='#FFFFFF' stroke-width='7' stroke-miterlimit='10' x1='0' y1='200' x2='200' y2='0'/>
										</svg>


									<span class='formfield'>
										<p>Website or Blog</p>
										<input type='text' name='website' value="<?php echo $info['website']?>" placeholder='www.your-url.com' tabindex='8'>
									</span>

									<span class='formfield'>
										<p>Instagram</p>
										<input type='text' name='instagram' value="<?php echo $info['instagram']?>" placeholder='Instagram Username' tabindex='9'>
									</span>

									<span class='formfield'>
										<p>Twitter</p>
										<input type='text' name='twitter' value="<?php echo $info['twitter']?>" placeholder='Twitter Username' tabindex='10'>
									</span>

									<span class='formfield'>
										<p>Flickr</p>
										<input type='text' name='flickr' value="<?php echo $info['flickr']?>" placeholder='Flickr Username' tabindex='11'>
									</span>

									<span class='formfield full'>
										<p>Short Biography</p>
										<textarea style="text-align: left;" cols="65" rows="100" align="left" class='full' name='biography' placeholder='Write some lines about you' tabindex='11'><?php echo $info['biography']?></textarea>
									</span>

									<input type='submit' name='submit' value='Save Changes'>

								</fieldset>


							</form>
                        </div>
                    </div>
            </header>

<script type="text/javascript" src="_assets/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="_assets/js/main.js"></script>

<!-- marche pas : validation auto du form après input[file] selectionné -->
<script type="text/javascript">
document.getElementById('uploadAvatar').onchange = function() {
  document.getElementById("updateInfo").submit();
};
</script>

<script type="text/javascript">

	$("#save").click(function() {
	    if ($("#updateInfo").valid()) {
	        $("#updateInfo").submit();
	    }
	});

</script>






</body>
</html>