<?php

	// blowfish_encryption
		// function password_encrypt($password) {
		// 	$hash_format = "$2y$10$";
		// 	$salt = generate_salt();
		// 	$format_and_salt = $hash_format . $salt;
		// 	$hash = crypt($password, $format_and_salt);
		// 	return $hash;
		// }

	// blowfish_encryption
		// function generate_salt() {
		// 	$unique_random_string = md5(uniqid(mt_rand(), true));
		// 	$base64_string = base64_encode($unique_random_string);
		// 	$modified_base64_string = str_replace('+', '.', $base64_string);
		// 	$salt = substr($modified_base64_string, 0, 22);
		// 	return $salt;
		// }


if(isset($_POST['submit']))

{
	$firstname = 	htmlspecialchars(trim($_POST['firstname']));
	$lastname = 	htmlspecialchars(trim($_POST['lastname']));
	$email = 		htmlspecialchars(trim($_POST['email']));
	$username = 	htmlspecialchars(trim($_POST['username']));
	$password = 	htmlspecialchars(trim($_POST['password']));


	// on les définit, meme si ils serront remplis plus tard quand edit profile dans modifier.php
	$newpassword = 			htmlspecialchars(trim($_POST['newpassword']));
	$repeatnewpassword = 	htmlspecialchars(trim($_POST['newpassword']));

	$website = 		htmlspecialchars(trim($_POST['website'])); 
	$instagram = 	htmlspecialchars(trim($_POST['instagram'])); 
	$twitter = 		htmlspecialchars(trim($_POST['twitter']));
	$flickr = 		htmlspecialchars(trim($_POST['flickr'])); 
	$biography = 	htmlspecialchars(trim($_POST['biography'])); 
	$avatar = 		htmlspecialchars(trim($_POST['avatar']));


	// mail de confirmation
	$usersubject = "Thank You for register on F O K U S\n";
	$userheaders = "From: gilles.lambert@live.be\n";
	$usermessage = "Thank you for joining the family, we are excited to see how you will made use of F O K U S. Sincerly Yous, F O K U S Team";
	



	if($firstname&&$lastname&&$email&&$username&&$password)
	{	// si tous les champs sont remplis on continue
		
			if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email)){ 
			
			} else {
				echo "<p class='upAlert'>wrong email</p>";
			}
	
			if (strlen($password)>=4) 
			{ 
				$password = md5($password); // crypte le password en attendant blowfish - !!!! que j'arrive pas a faire fonctionner

				// connexion a la database members

				$connect = mysql_connect('localhost','root','root');
				mysql_select_db('members');

				// $connect = mysql_connect('mysql51-98.perso','gilleslamain','');
				// mysql_select_db('gilleslamain');

				$query = mysql_query("SELECT * FROM users WHERE username='$username'"); // AND email='$email' marche pas, pq ?

				$rows = mysql_num_rows($query);

				
				mail($email,$usersubject,$usermessage,$userheaders);


				if ($rows==0) 
				{
					$reg = mysql_query("INSERT INTO users VALUES('','$firstname','$lastname','$email','$username','$password','$newpassword','$repeatnewpassword','$website','$instagram','$twitter','$flickr','$biography','$avatar')");
					header('Location:login.php');
				} 
				else echo "<p class='upAlert'>This username already exist</p>"; // ceci ne sert plus rien, c'etait pour une connexion avec username, mais j'aurais besoin du même - truc pour l'email, comme ca evite 2 même email , petit rigolo on sait jamais ou reinscritpion ..
				
			} else echo "<p class='upAlert'>Password must be at least 4 characters</p>";
			
		}else echo "<p class='upAlert'>Please you need to fill in the entire form</p>";
}


?>

<!DOCTYPE html>
<html>

<head>
        <meta charset='utf-8'>
        <title>F O K U S | Register and acces awesome</title>
        <meta name="viewport" content="initial-scale=1.0;">
        <meta name="robots" content="noindex">
        <meta name="description" content="" />
        <meta name="keywords" content="" /> 
        <link rel="shortcut icon" type="image/png" href="http://gilleslambert.be/tfe/favicon1.png" />
		<link rel="stylesheet" href="./_assets/css/reset.min.css">
		<link rel="stylesheet" href="./_assets/css/style.css">

        <script type="text/javascript" src="./_assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="./_assets/js/main.js"></script>
</head>

<body class='bigBackground'>


        <div class="container">
            <div class="topBar">
               
                <div class="barInner">
                    <a href="index.html"><h1 class="logo">logo</h1></a>
                </div>
            </div>



            <header class="image">

                <div class="fade">
                    <div id="introContainer">
              <!--           <div id="tropcon"> -->
                        	
                            <div class="centerAll">
                                <h1 class="register-title">Welcome</h1>
                                <h2 class="register-subtitle">Introduce yourself please</h2>

                                <br/></br>

                                <form class="formInscription" method="POST" action="register.php" align="center" autocomplete="off">
                                	<!-- register-save.php!!! -->
                                	
									<fieldset class="f-form">

										<span class="formfield firstlast">
											<input class="first" tabindex="1" type="text" name="firstname" placeholder="First Name">
										</span>

										<span class="formfield firstlast">
											<input class="last" tabindex="2" type="text" name="lastname" placeholder="Last Name">
										</span>

										<span class="formfield">
											<input tabindex="3" type="text" name="email" placeholder="you@mail.com">
										</span>

										<span class="formfield">
											<input tabindex="4" type="text" name="username" placeholder="Username">
										</span>

										<span class="formfield">
											<input tabindex="5" type="password" name="password" placeholder="Password">
										</span>

										<br>
										<input tabindex="6" type="submit" name="submit" value="Awesome">
									</fieldset>
								</form>
								<a class="h-underline" href="login.php">Already part of the family ? Login here</a>

                            </div>

                        <!-- </div> -->
                        <!-- fin tropcon -->
                    </div>
                </div>

            </header>


    </body>
</html>






