<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reports</title>
<link href="css/ble.css" rel="stylesheet" type="text/css" />
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
}
</style> 
</head>

<body >
<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="g"><a href="user.php"><img src="images/user.png" alt="user" /></a></li>';	
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="report"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 echo '</ul>';
 }
 ?>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="client"){
echo '<ul class="menu">';
  echo '<li><a href="user-info.php"><img src="images/user-info.png" alt="user-info" height="90px" width="90px" /></a></li>';
  echo '<li><a href="pay.php"><img src="images/booking.png" alt="booking" height="90px" width="90px" /></a></li>';
  echo '<li><a href="user-files.php"><img src="images/user-files.png" alt="user-files" height="90px" width="90px" /></a></li>';  
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
  echo '</ul>';
  
 }
 ?>
 <div style="width:90%; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0);
 -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
 -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;background-color:white;" align="center">
 
  <table cellpadding="10" cellspacing="2" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              <th>Reservation ID</th>
			  <th>Arrival</th>
              <th>Departure</th>
			  <th>Room ID</th>
			  <th>Confirmation No.</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Payable</th>
              <th>Status</th>			
              <th>View Payment</th>
			  <th>Add Bank Receipt</th> 
			  </tr>
          </thead>
          <tbody>
         <?php
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
								$sql ="SELECT *  FROM reservation WHERE username='".$_SESSION['Username']."' ";
								$result = $con->query($sql);
								if ($result->num_rows > 0) {
				// output data of each row
				while($rows = $result->fetch_assoc()) {
									echo '<tr>';
    								echo '<td class="contacts">'.$rows['reservation_id'].' </td>';
									echo '<td class="contacts">'.$rows['arrival'].' </td>';
									echo '<td class="contacts">'.$rows['departure'].' </td>';
									echo '<td class="contacts">'.$rows['room_id'].' </td>';
									echo '<td class="contacts">'.$rows['confirmation'].' </td>';
    								echo '<td class="contacts">'.$rows['firstname'].'</td>';
									echo '<td class="contacts">'.$rows['lastname'].'</td>';
									echo '<td class="contacts">'.$rows['email'].' </td>';
    								echo '<td class="contacts">'.$rows['contact'].'</td>';
									echo '<td class="contacts">'.$rows['payable'].'</td>';
									echo '<td class="contacts">'.$rows['status'].'</td>';
									echo '<td class="contacts"><div align="center">'.'<a rel="facebox" href=viewpayment.php?id=' . $rows["confirmation"] . '>' . 'View Payment' . '</a>'.'</div></td>';
									echo '<td class="contacts"><div align="center">'.'<a rel="facebox" href=uploadpay.php?id=' . $rows["confirmation"] . '>' . 'Upload' . '</a>'.'</div></td>';	
									echo '</tr>';
				}
				
				} else {
				echo "0 results";
				}		
								
			  ?>
          </tbody>
  </table>
  
  
</div>
</body>
</html>
