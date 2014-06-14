<?php 

include('connect.php');

foreach(nom_utilisateur() as $utilisateur ) 
{
?>

<p>
	<a href='profile.php?id=<?php echo $utilisateur['id'];?>'><?php echo $utilisateur['firstname'];?></a>
	
</p>

<?php
}


?>