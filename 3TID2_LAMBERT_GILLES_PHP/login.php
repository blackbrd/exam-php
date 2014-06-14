<?php 
// session_start();
include('connect.php');


if(isset($_POST['submit']))

{
	$email = 		htmlspecialchars(trim($_POST['email']));
	$password = 	htmlspecialchars(trim($_POST['password']));

	if($email&&$password)
	{	
		$password = md5($password);
		$connect = mysql_connect('localhost','root','root');
		mysql_select_db('members');

		$log = mysql_query("SELECT * FROM users WHERE email='$email' AND password='$password'");
     

		$rows = mysql_num_rows($log);
			if ($rows==1) 
			{
                $row = mysql_fetch_assoc($log);
                $iduser = $row['id'];

				header('Location:profile.php?id='.$iduser);

			}else echo "Wrong Email or Password";

		}else echo "Please fill in your logins";

}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset='utf-8'>
        <title>F O K U S | Please login to acces your profile</title>
        <meta name="viewport" content="initial-scale=1.0;">
        <meta name="robots" content="noindex">
        <meta name="description" content="" />
        <meta name="keywords" content="" /> 
        <link rel="shortcut icon" type="image/png" href="http://gilleslambert.be/tfe/favicon1.png" />
        <link rel="stylesheet" href="./_assets/css/reset.min.css">
		<link rel="stylesheet" href="./_assets/css/style.css">

        <script type="text/javascript" src="./_assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="./_assets/js/main.js"></script>

        <!-- style ajouté à l'arrache pour le moment -->
        <style type="text/css">
        	.formfield {display: block; }
        	.error {display: block; color: red;}
        	.e-hide {display: none;} 
        	.valid {display: block;}
        </style>
</head>

<body class='bigBackground'>

        <div class="container">

                <div class="topBar">
                    <div class="barInner">
                        <a href="./landing/index.html"><h1 class="logo">logo</h1></a>
                    </div>
                </div>


                <header>

                    <div class="fade">
                        <div id="introContainer">

                                <div class="centerAll">

                                    <h1 class="register-title">Connexion Required</h1>
                                    <h2 class="register-subtitle">Welcome back, great to see you again</h2>

                                    <br/></br>

                                    <form method="POST" action="login.php" align="center" autocomplete="off">
    									<fieldset class="f-form">

    										<span class="formfield">
    											<input tabindex="1" type="text" name="email" placeholder="you@mail.com">
    										</span>

    										<span class="formfield">
    											<input tabindex="2" type="password" name="password" placeholder="Password">
    										</span>

    										<br>
    										<input tabindex="3" type="submit" name="submit" value="Valid">

    									</fieldset>
    								</form>

                                    <a class="h-underline" href="register.php">Not register yet ? It's this way</a>
                                </div>

                        </div>
                    </div>

                </header>
        </div>

</body>
</html>