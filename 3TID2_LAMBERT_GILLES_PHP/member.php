<?php  
session_start();



if (isset($_SESSION['email'])){

    $_SESSION['id']; // on save l'id depuis le login même qu'on l'utilise pas comme first/last-name
    $_SESSION['username']; // on save le username depuis le login même qu'on l'utilise pas comme first/last-name

	echo "
            <div class='topBar'>
               
                <div class='barInner'>

                    <a href='#'><h1 class='logo'>logo</h1></a>
                    <nav>
                        <a id='editProfil' href='editprofil-save.php'>Edit Profile</a>
                        <a id='logOut' href='logout.php'>Log Out</a>
                    </nav>
                </div>
            </div>

            <header class='member'>
                <div id='memberTop'>
                   



                    <!-- AVATAR -->
                    <img class=author-img src=./_assets/img/ava.png center center>




                    <h1 class='bigTitle'>Welcome ".ucwords($_SESSION['firstname'])." ".ucwords($_SESSION['lastname'])." !</h1>
                    
                    <ul class='social float'>
                        
                        <li>
                            <a href='#twitter'>
                                <svg class='svgIcon' version='1.1' id='iconTwitter' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='15px' height='15px' viewBox='0 0 56.693 56.693' enable-background='new 0 0 56.693 56.693' xml:space='preserve'> <path fill='#fff' d='M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454 c-1.844-1.964-4.471-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303 c-8.399-0.422-15.848-4.445-20.833-10.561c-0.87,1.492-1.368,3.229-1.368,5.082c0,3.507,1.784,6.601,4.496,8.412 c-1.655-0.053-3.215-0.508-4.577-1.265c-0.002,0.042-0.002,0.085-0.002,0.128c0,4.896,3.484,8.98,8.108,9.91 c-0.848,0.229-1.741,0.354-2.663,0.354c-0.651,0-1.285-0.062-1.901-0.182c1.286,4.015,5.019,6.938,9.44,7.019 c-3.459,2.711-7.815,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541 c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.31C49.769,18.873,51.483,17.092,52.837,15.065z'/> </svg>
                            </a>
                        </li>

                        <li>
                            <a href='#facebook'>
                                <svg class='svgIcon' version='1.1' id='iconFacebook' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'width='15px' height='15px' viewBox='0 0 56.693 56.693' enable-background='new 0 0 56.693 56.693' xml:space='preserve'> <path fill='#FFFFFF' d='M40.43,21.739h-7.646v-5.014c0-1.884,1.248-2.322,2.127-2.322c0.877,0,5.396,0,5.396,0V6.125l-7.431-0.028 c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.946,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.771 L40.43,21.739z'/> </svg>
                            </a>
                        </li>

                        <li>
                            <a href='#flickr'>
                                <svg class='svgIcon' version='1.1' id='iconFlickr' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'width='15px' height='15px' viewBox='0 0 56.693 56.693' enable-background='new 0 0 56.693 56.693' xml:space='preserve'> <g> <circle fill='#FFFFFF' cx='14.811' cy='28.347' r='10.789'/> <circle fill='#FFFFFF' cx='41.882' cy='28.347' r='10.789'/> </g> </svg>
                            </a>
                        </li>

                    </ul>

                </div>
            </header>

            <div class='wrap'>

            </div>
	";
}
else 
{
header('Location:login.php');
}





?>

<!DOCTYPE html>
<html>
<head>
        <meta charset='utf-8'>
        <title>MEMBER<!-- Your Story's - Firstname Lastname --></title>
        <meta name="viewport" content="initial-scale=1.0;">
        <meta name="robots" content="noindex">
        <meta name="description" content="***************************" />
        <meta name="keywords" content="******************************" /> 
        <!-- <link rel="shortcut icon" type="image/png" href="img/favicon.png" /> -->

        <link rel="stylesheet" href="./_assets/css/reset.min.css">
        <link rel="stylesheet" href="./_assets/css/style.css">

        <!-- javascript -->
        <script type="text/javascript" src="./_assets/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="./_assets/js/main.js"></script>
</head>

<body>


</body>
</html>












