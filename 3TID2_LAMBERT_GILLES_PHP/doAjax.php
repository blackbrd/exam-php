<?php 

	include('db.php');

	if ($_POST['postid'] != '' && $_POST['type'] != ''){
		
		$alreadyExist = mysql_num_rows(mysql_query(' SELECT id FROM voted WHERE postid="'.(int)$_POST['postid'].'" AND ip="'.$_SERVER['REMOTE_ADDR'].'" '));

		if ($alreadyExist==0){

			if ($_POST['type']=='like'){
				mysql_query(' UPDATE posts SET `like`=`like`+1 WHERE id="'.(int)$_POST['postid'].'"');
				$num = mysql_fetch_row(mysql_query(' SELECT `like` FROM posts WHERE id="'.(int)$_POST['postid'].'" LIMIT 1'));
			} 

			elseif($_POST['type']=='unlike'){
				mysql_query(' UPDATE posts SET `unlike`=`unlike`+1 WHERE id="'.(int)$_POST['postid'].'"');
				$num = mysql_fetch_row(mysql_query(' SELECT `unlike` FROM posts WHERE id="'.(int)$_POST['postid'].'" LIMIT 1'));
			}
			echo $num[0];
				mysql_query(' INSERT INTO voted (`postid`,`ip`) VALUES ("'.(int)$_POST['postid'].'","'.$_SERVER['REMOTE_ADDR'].'")');
		}else {
			echo 'You already Liked, Thank you so much';
		}

	} 

 ?>