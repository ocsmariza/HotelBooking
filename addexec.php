<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("booking") or die(mysql_error());





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $_FILES["image"]["name"]);
			
			$location="img/" . $_FILES["image"]["name"];
			$type=$_POST['type'];
			$rate=$_POST['rate'];
			$desc=$_POST['desc'];
			$qty=$_POST['qty'];
			

			
			$update=mysql_query("INSERT INTO room (type, rate, description, image, qty)
			VALUES
			('$type','$rate','$desc','$location','$qty')");
			
			
			header("location: room.php");
			exit();
		
			}
	}


?>
