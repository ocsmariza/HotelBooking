<!DOCTYPE html>
<html lang="en">
<body>
<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<form action="uploadpay.php" method="post" enctype="multipart/form-data">';
			echo '<input name="id" type="hidden" value="'. $messages_id . '" />';
			echo 'Select Receipt to upload:';
			echo ''.'<input type="file" name="picture" id="image"><br><br>'.'';
			echo ''.'<input type="submit" name="btnSubmit" value="Submit" id="insert">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.'';
			echo ''.' <input type="submit" name="btnCancel" value="Cancel" id="insert"><br>'.'</div>';			
			echo '</form>';
			
	}
?>


</body>
</html>
<?php

	
	$db = mysqli_connect('localhost','root','','booking');
	
	if(isset($_POST['btnSubmit'])){

		$confirmation = $_POST['id'];
		$filetmp = $_FILES['picture']['tmp_name'];
		$filename = $_FILES['picture']['name'];
		$filetype = $_FILES['picture']['type'];
		$filepath = "payment/".$filename;
		move_uploaded_file($filetmp, $filepath);
		
	$checkpayment = 'select `confirmation` from `payment` where `confirmation` = "'.$confirmation.'"';
     if (mysql_num_rows(mysql_query($checkpayment)) != 0)
  {
			echo "<script>alert('Payment Already Exist')</script>";

  }

  else
  {
			$ins = "INSERT into payment(confirmation,imgname,imgpath,imgtype) values ('$confirmation','$filename','$filepath','$filetype')";
			$check=mysqli_query($db,$ins);
			if($check){
			echo "<script>alert('File uploaded successfully.')</script>";
        }else{
			echo "<script>alert('File upload failed, please try again.')</script>";
        } 
	}
			header('location: pay.php');
		}
    
    if(isset($_POST['btnCancel'])){
		header('location: pay.php');
	}
?>
 