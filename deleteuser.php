
			<?php
				  if (isset($_GET['id']))
	{
			$user_id = $_GET['id'];
			echo '<form action="deleteuser.php" method="post">';
			echo '<input name="id" type="hidden" value="'. $user_id . '" />';
			echo 'Are you sure you want to delete this user?';
			echo '<div>'.'<input name="yes" type="submit" value="Yes" /><input name="no" type="submit" value="No" />'.'</div>';
			echo '</form>';
			
	}
			?>
			<?php
				  if (isset($_POST['yes']))
	{
			$con = mysql_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("booking", $con);
			$user_id = $_POST['id'];
			mysql_query("DELETE FROM user WHERE user_id='$user_id'");
			header("location: user.php");
			exit();
			mysql_close($con);
			}
			 if (isset($_POST['no']))
	{
			
			header("location: user.php");
			exit();
		
			}
			?>