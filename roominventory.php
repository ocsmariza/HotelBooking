<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Room Inventory</title>
<link href="css/ble.css" rel="stylesheet" type="text/css" />
<!--sa poip up-->
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

  <!--sa validate from-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["login"]["user"].value;
var a=document.forms["login"]["password"].value;
if ((y==null || y==""))
  {
  alert("you must enter your username");
  return false;
  }
  if ((a==null || a==""))
  {
  alert("you must enter your password");
  return false;
  }
 

}
</script>


<body>
  <?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="g"><a href="user.php"><img src="images/user.png" alt="user" /></a></li>';	
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  echo '<li class="inventory"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 echo '</ul>';
 }
 ?>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="client"){
echo '<ul class="menu">';	
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
  echo '</ul>';
  
 }
 ?> 
 <div style="width:1000px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0);
 -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
 -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;" align="center">
 
 <br /><label style="margin-left:12px;">Filter</label> <input type="text" name="filter" value="" id="filter" /><br /><br />
  
  <table cellpadding="10" cellspacing="2" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              		<th>Arrival</th>
					<th>Departure</th>
					<th>Quantity Reserve</th>
					<th>Room Type</th>
					<th>Confirmation Number</th>
                                        <th>Status</th>
            </tr>
          </thead>
          <tbody>
         <?php
			   $con = mysql_connect("localhost","root","");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								
								mysql_select_db("booking", $con);
								
								$result3 = mysql_query("SELECT * FROM roominventory where status != 'out'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['arrival'].'</td>';
									echo '<td>'.$row3['departure'].'</td>';
									echo '<td>'.$row3['qty_reserve'].'</td>';
									
									echo '<td>';
                                                               $ro=$row3['room_id'];
                                                             $result4 = mysql_query("SELECT * FROM room where room_id='$ro'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  {
								echo $row4['type'];
                                                                  }
									echo '</td>';
                                                                        echo '<td>'.$row3['confirmation'].'</td>';
                                                                        echo '<td>'.$row3['status'].'</td>';
								 echo '</tr>';

								  }
$result5 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='13' or room_id='14' or room_id='15' or room_id='15' or room_id='17'");
				                        while($row5 = mysql_fetch_array($result5))
				                           {
echo 'Total reserve Room of Single Room: ';
echo $row5['sum(qty_reserve)'];
echo '<br>';
                                                           }
														   
$result6 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='18' or room_id='19' or room_id='20' or room_id='21' or room_id='22'");
				                        while($row6 = mysql_fetch_array($result6))
				                           {
echo 'Total reserve Room of Double Room: ';
echo $row6['sum(qty_reserve)'];
echo '<br>';
                                                           }
$result7 = mysql_query("SELECT sum(qty_reserve) FROM roominventory where status != 'out' and room_id='23' or room_id='23' or room_id='25' or room_id='26' or room_id='27'");
				                        while($row7 = mysql_fetch_array($result7))
				                           {
echo 'Total reserve Room of Deluxe Room: ';
echo $row7['sum(qty_reserve)'];
echo '<br>';
                                                           }
	  
			  ?>
          </tbody>
       </table>
  
  
</div>
</body>
</html>