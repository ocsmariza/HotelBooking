<?php

	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("booking", $con);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];	
	$status='unread';

	
	$sql=mysql_query("INSERT INTO comment (name, email, status, content) VALUES ('$name','$email','$status','$message')");
  header("location: index.html");
mysql_close($con)

	
?>

