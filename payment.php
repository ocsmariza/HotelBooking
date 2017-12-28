<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X-Axis Hotel </title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/font2.css">
<link rel="stylesheet" href="font/font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--sa poip up-->
 <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>


</head>
<?php
if (!isset($_POST['confirm'])) {

	$errmsg_arr = array();
	
	$errflag = false;
	
	$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("booking", $con);

	function createRandomPassword() {



    $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;



    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }



    return $pass;



}
$confirmation = createRandomPassword();
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	
	$nroom = $_POST['n_room'];
	$roomid = $_POST['rm_id'];
	$result = $_POST['result'];
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$name = $_POST['name'];
	$last = $_POST['last'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$country = $_POST['country'];
	$email = $_POST['email'];
	$cnumber = $_POST['cnumber'];
	$stat= 'Pending';
	$result1 = mysql_query("SELECT * FROM room where room_id='$roomid'");
while($row = mysql_fetch_array($result1))
  {
  $rate=$row['rate'];
  $type=$row['type'];
  
  }
  $payable= $rate*$result*$nroom;
	
	
	
	//send the email
				$from="X-AXIS@Hotel.com";
				$mail_To = $email;
                $mail_Subject = "Reservation notification From X-AXIS Hotel";
                $mail_Body = "From: $from\<br>".
		"First Name: $name\<br>".
		"Last Name: $last<br>".
		"Email: $email <br>".
		"City: $city <br>".
		"Zip Code: $zip <br>".
		"Country: $country <br>".
		"Contact Number: $cnumber <br>".
		"Check In: $arival<br> ".
		"Check Out: $departure<br> ".
		"Number of Adults: $adults<br> ".
		"Number of child: $child<br> ".
		"Total nights of stay: $result<br> ".
		"Room Type: $type<br> ".
		"Number of rooms: $nroom<br> ".
		"Payable amount: $payable<br> ".
		"Confirmation Number: $confirmation<br> ";	
              		
		
		
		$checkUsername = 'select `username` from `user` where `username` = "'.$username.'"';
     if (mysql_num_rows(mysql_query($checkUsername)) != 0)
  {
			echo "<script>alert('Username already exists Cannot Book Please Try Again'); window.location.href = 'index.html';</script>";

  }

  else
  {
			$pos="client";
			mysql_query("INSERT INTO reservation (arrival, departure, adults, child, result, room_id, no_room, firstname, lastname, city, zip, province, country, email, contact,username,password, payable, status, confirmation)
			VALUES
			('$arival','$departure','$adults','$child','$result','$roomid','$nroom','$name','$last','$city','$zip','$address','$country','$email','$cnumber','$username','$password','$payable','$stat','$confirmation')");
			mysql_query("INSERT INTO roominventory (arrival, departure, qty_reserve, room_id, confirmation) VALUES ('$arival','$departure','$nroom','$roomid','$confirmation')");
			mysql_query("INSERT INTO user (username, password, position, email)VALUES ('$username', '$password', '$pos', '$email')");
			mysql_query("INSERT INTO userinbox (email, username, inbox)VALUES ('$email', '$username', '$mail_Body')");
			echo "<script>alert('Booked Successfuly')</script>";

  }
		
    }

mysql_close($con)

	
?>
<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-black w3-large">
  <a href="index.html" class="w3-bar-item w3-button w3-mobile">HOME</a>
  <a href="admin_index.php" class="w3-bar-item w3-button w3-right w3-mobile">Login</a>
</div>

<!-- HEADER -->
<!-- CONTENT -->
<div id="content">

<div id="leftPan">

</div><br /><br /><br />
<div id="featured">
  
  <br />
<form action="index.html"  method="post">
        
		<p color="red" size="20px">Login for payment upload your receipt and wait for the confirmation of the admin</p>
		<p color="red" size="20px">Check Your Inbox to view the reservation details</p>
  <br>
	<input type="submit" name="confirm" value="HOME">
    </form>
</div>
<div class="clear"> </div>

</div>
<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>ALL RIGHTS RESERVED. COPYRIGHT © 2017 <a href="#" class="w3-hover-text-green">X-AXIS</a></p>
</footer>


</body>
</html>