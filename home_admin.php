<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Monitor</title>
<link href="css/header.css" rel="stylesheet" type="text/css" />
<!--sa pop up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script src="./js/application.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>

<style>
a,li,ul {
    text-decoration: none;
	list-style-type:none;
	font-weight: bold;
}
th {
   border: 1px solid black;
}
.disabled {
        pointer-events: none;
        cursor: default;
        opacity: 0.6;
    }
</style> 
</head>

<body >
<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="c"><a href="user.php"><img src="images/user.png" alt="user" /></a></li>';	
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="monitor"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 echo '</ul>';
 }
 ?>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="client"){
echo '<ul class="menu">';
  echo '<li class="g"><a href="user-info.php"><img src="images/user-info.png" alt="user-info" /></a></li>';
  echo '<li class="h"><a href="user-files.php"><img src="images/user-files.png" alt="user-files" /></a></li>';  
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
  echo '</ul>';
  
 }
 ?> 
 <div style="width:120%; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0);
 -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
 -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;background-color:white;" align="center">
 <center>
  <br /><label style="margin-left:12px;">Filter</label> <input type="text" name="filter" value="" id="filter" /><br /><br />
  <form action="home_admin.php" method="POST">
		|| All<input type="radio" name="radio" value="All" >||
		Accepted<input type="radio" name="radio" value="Accepted" >||
		Pending<input type="radio" name="radio" value="Pending" >||
		Expired<input type="radio" name="radio" value="Expired" >||
		Canceled<input type="radio" name="radio" value="Canceled" > ||
		Checked Out<input type="radio" name="radio" value="CheckedOut" > ||<br><br>
		<input type="submit" name="searchBtn" value="Sort"><br>
	</form>
	</center>
  <table cellpadding="10" cellspacing="2" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              <th>Date Reservation</th>
			  <th>Reservation Expired In</th>
			  <th>Arrival</th>
              <th>Departure</th>
			  <th>Confirmation No.</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Payable</th> 
              <th>Status</th> 
              <th>View Payment</th> 			  
              <th>Action</th> 
            </tr>
          </thead>
          <tbody>
		  
<?php
		 
				date_default_timezone_set("Asia/Manila");
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "booking";
				// Create connection
				$con = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($con->connect_error) {
					die("Connection failed: " . $con->connect_error);
						}
		
		
	if(!isset($_POST['searchBtn'])){

	$sql ="SELECT date_reservation, firstname, lastname, email, contact, arrival, departure, payable, status, confirmation  FROM reservation ORDER BY status DESC";
	$result = $con->query($sql);
	}
				
	if(isset($_POST['searchBtn'])){
		$all = 'All';
		$accepted = 'Accepted';
		$pending = 'Pending';
		$expired = 'Expired';
		$canceled = 'Canceled';
		$checkout = 'CheckedOut';		
		if(!empty($_POST['radio'])){
			$selectedRadio = $_POST['radio'];
		}
		else{
			$selectedRadio = ""; 
			$message = "Select List To View Content.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			
		}
		
	if($selectedRadio == 'All'){
	$sql ="SELECT reservation_id, date_reservation, firstname, lastname, email, contact, arrival, departure, payable, status, confirmation  FROM reservation ORDER BY status DESC";
	$result = $con->query($sql);
	}
	if($selectedRadio == 'Accepted'){
	$sql = "SELECT * from reservation where status='$accepted'";
	$result = mysqli_query($con, $sql);
	}
	if($selectedRadio == 'Pending'){
	$sql = "SELECT * from reservation where status='$pending'";
	$result = mysqli_query($con, $sql);
	}
	if($selectedRadio == 'Expired'){
	$sql = "SELECT * from reservation where status='$expired'";
	$result = mysqli_query($con, $sql);
	}
	if($selectedRadio == 'Canceled'){
	$sql = "SELECT * from reservation where status='$canceled'";
	$result = mysqli_query($con, $sql);
	}
	if($selectedRadio == 'CheckedOut'){
	$sql = "SELECT * from reservation where status='$checkout'";
	$result = mysqli_query($con, $sql);
	}
	
		}
				if ($result->num_rows > 0) {
				// output data of each row
				while($rows = $result->fetch_assoc()) {
									echo '<tr>';
    								echo '<td class="contacts">'.$rows['date_reservation'].' </td>';
									
									$startdate=strtotime($rows['date_reservation']);
									$enddate=strtotime("+3 days", $startdate);
									while ($startdate < $enddate) {
									date("Y M D h:i:s a", $startdate) . "<br>";
									$startdate = strtotime("+1 day", $startdate);
									}
									//Determine if not expired
									if(date("Y-m-d h:i:s a", $startdate)< date("Y-m-d h:i:s a")&& $rows['status']=='Pending'){
									$sql = "UPDATE reservation SET status='Expired' WHERE confirmation='".$rows['confirmation']."' ";
									if ($con->query($sql) === TRUE) {
									echo "";
									} else {
									echo "Error updating record: " . $con->error;
									}
									}
									//Determine if not pending
									if(date("Y-m-d h:i:s a", $startdate)> date("Y-m-d h:i:s a")&& $rows['status']=='Expired'){
									$sql = "UPDATE reservation SET status='Pending' WHERE confirmation='".$rows['confirmation']."' ";
									if ($con->query($sql) === TRUE) {
									echo "";
									} else {
									echo "Error updating record: " . $con->error;
									}	
									}
									echo '<td class="contacts">'.date("Y-m-d h:i:s a", $startdate).'</td>';
									echo '<td class="contacts">'.$rows['arrival'].' </td>';
									echo '<td class="contacts">'.$rows['departure'].' </td>';
									echo '<td class="contacts">'.$rows['confirmation'].' </td>';
    								echo '<td class="contacts">'.$rows['firstname'].'</td>';
									echo '<td class="contacts">'.$rows['lastname'].'</td>';
									echo '<td class="contacts">'.$rows['email'].' </td>';
    								echo '<td class="contacts">'.$rows['contact'].'</td>';
									echo '<td class="contacts">'.$rows['payable'].'</td>';
									echo '<td class="contacts status">'.$rows['status'].'</td>';
									echo '<td class="contacts"><div align="center">'.'<a rel="facebox" href=viewpayment.php?id=' . $rows["confirmation"] . '>' . 'View Payment' . '</a>'.'</div></td>';
									if($rows['status']=='Canceled' || $rows['status']=='Expired'|| $rows['status']=='CheckedOut'){
									echo '<td class="contacts disabled"><div align="center">'.'<a rel="facebox" href=accept.php?id=' . $rows["confirmation"] . '>'.'Accept' . '</a>' . '&nbsp||&nbsp'.'<a rel="facebox" href=cancelindex-exec.php?id=' . $rows["confirmation"] . '>'.'Cancel' . '</a>'.'&nbsp||&nbsp'.'<a rel="facebox" href=out.php?id=' . $rows["confirmation"] . '>'.'Out' . '</a>'.'</div></td>';
									}else{
									echo '<td class="contacts"><div align="center">'.'<a rel="facebox" href=accept.php?id=' . $rows["confirmation"] . '>'.'Accept' . '</a>' . '&nbsp||&nbsp'.'<a rel="facebox" href=cancelindex-exec.php?id=' . $rows["confirmation"] . '>'.'Cancel' . '</a>'.'&nbsp||&nbsp'.'<a rel="facebox" href=out.php?id=' . $rows["confirmation"] . '>'.'Out' . '</a>'.'</div></td>';
									}
									echo '</tr>';
				}
				
				} else {
				echo "0 results";
				}		
				mysqli_close($con);				
			  ?>
          </tbody>
  </table>
  
  
</div>
</body>
</html>
<script>
$(document).ready(function() {
  $('.status:contains("Pending")').css('color', '#0099ff');
  $('.status:contains("Accepted")').css('color', '#00ff00'); 
  $('.status:contains("Canceled")').css('color', '#ffff00');   
  $('.status:contains("Expired")').css('color', 'red');
  $('.status:contains("CheckedOut")').css('color', '#000066');
  });
</script>