<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>X-Axis Hotel</title>
<style type="text/css">
.style2 {
	font-size: 24px;
	font-weight: bold;
}
</style>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/font2.css">
<link rel="stylesheet" href="/font/font.css">

<!--para sa online na icon backup-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-black w3-large">
  <a href="user-info.php" class="w3-bar-item w3-button w3-mobile">Back</a>
  <a href="admin_index.php" class="w3-bar-item w3-button w3-right  w3-mobile">Logout</a>
</div>
<div align="center"><span class="style2">X-Axis</span><br />
<div class="paperl">
  <?php
if (isset($_GET['id'])){
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("booking", $con);

function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}





$member_id = $_GET['id'];
			$result = mysql_query("SELECT * FROM reservation WHERE confirmation = '$member_id'");

while($row = mysql_fetch_array($result))
  {
  echo '<br />';
  echo '<b>'.'Booker Personnal Information'.'</b>';
  echo '<br />';
  echo "FirstName: ".$row['firstname']. "<br />"; 
  echo "LastName: ".$row['lastname']. "<br />"; 
  echo "Address: ".$row['province']. "<br />"; 
  echo "City: ".$row['city']. "<br />"; 
  echo "Zip: ".$row['zip']. "<br />"; 
  echo "Country: ".$row['country']. "<br />"; 
  echo "Email: ".$row['email']. "<br />"; 
  echo "Telephone/Cellphone Number: ".$row['contact']. "<br />"; 
  echo '<br />';
  

 echo '<br>';
  echo '<b>'.'Reservation Details'.'</b>'.'<br />';
  echo "Arrival Date: ".$row['arrival']. "<br />"; 
  echo "Departure Date: ".$row['departure']. "<br />"; 
  echo "Confirmation Code: ".$row['confirmation']. "<br />";  
  echo "Number of night stay: ".$row['result']; 
  echo '<br />';
  echo '<br />';
  echo '<b>'.'Rate Information'.'</b>'.'<br />';
  $q=$row['room_id'];
  $result1 = mysql_query("SELECT * FROM room WHERE room_id = '$q'");

while($row1 = mysql_fetch_array($result1))
  {
  echo "Room Type: ".$row1['type']. "<br />";
  echo "Room Rate: Php";
$sd=$row1['rate'];

	echo formatMoney($sd, true);
echo  "<br />";
  }
  
  echo 'Total Payable amount: Php';
  $dfg=$row['payable'];
echo formatMoney($dfg, true);
echo '<br /><br />';





 
  
		
  }

mysql_close($con);
}
?>



</div>

<p>&nbsp; </p>
</body>
</html>
