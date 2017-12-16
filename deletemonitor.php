			<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<form action="deletemonitor.php" method="post">';
			echo '<input name="id" type="hidden" value="'. $messages_id . '" />';
			echo 'Are you sure you want to delete this Reservation?';
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
			$messages_id = $_POST['id'];
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("DELETE FROM reservation WHERE confirmation='$messages_id'");
			mysql_query("DELETE FROM roominventory WHERE confirmation='$messages_id'");
			header("location: home_admin.php");
			exit();
			mysql_close($con);
			}
			 if (isset($_POST['no']))
			{
			
			header("location: home_admin.php");
			exit();
		
			}
			?>