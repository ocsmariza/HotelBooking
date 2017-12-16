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

	
	$sql=mysql_query("INSERT INTO comment (name, email, content) VALUES ('$name','$email','$message')");
  header("location: index.html");
mysql_close($con)

	
?>

