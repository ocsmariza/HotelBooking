<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<form action="accept.php" method="post">';
			echo '<input name="id" type="hidden" value="'. $messages_id . '" />';
			echo 'Are you sure you want to Accept this booking?';
			echo '<div>'.'<input name="yes" type="submit" value="Yes" /><input name="no" type="submit" value="No" />'.'</div>';
			echo '</form>';
			
	}
			?>

<?php
			if (isset($_POST['yes'])){
			$con = mysql_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			mysql_select_db("booking", $con);
			$confirmation = $_POST['id'];
			$status='Accepted';
			$sql=mysql_query("UPDATE reservation SET status='$status' WHERE confirmation='$confirmation'");
			$sql=mysql_query("UPDATE roominventory SET status='$status' WHERE confirmation='$confirmation'");
			header("location: home_admin.php");
			exit();
			
			}
			 if (isset($_POST['no'])){	
			header("location: home_admin.php");
			exit();
			}
			
?>