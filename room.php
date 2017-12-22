<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Room</title>
<link href="css/header.css" rel="stylesheet" type="text/css" />
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
<style>
a,li,ul {
    text-decoration: none;
	list-style-type:none;
}
</style> 
</head>

<body>
<?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="c"><a href="user.php"><img src="images/user.png" alt="user" /></a></li>';	
  echo '<li class="a"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="room"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
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
 <div style="width:90%; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0);
 -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
 -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;background-color:white;" align="center">
 
 <br /><label style="margin-left:12px;">Filter</label> <input type="text" name="filter" value="" id="filter" /> &nbsp &nbsp &nbsp
 <a rel="facebox" href="addroom.php"><input name="Input" type="submit" value="ADD ROOM" class="w3-button w3-dark-grey w3-padding  w3-padding-32"  ></a><br /><br />
  
  
  <table cellpadding="10" cellspacing="2" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              		<th>Type</th>
					<th>Rate</th>
					<th>Descripton</th>
					<th>Image</th>
					<th>Quantity</th>
					<th>Action</th>
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

								
								$result3 = mysql_query("SELECT * FROM room");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
									echo '<td>'.$row3['type'].'</td>';
									echo '<td>Php';
									$klp=$row3['rate'];
									echo formatMoney($klp, true);
									echo '</td>';
									echo '<td>'.$row3['description'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=editpic.php?id=' . $row3["room_id"] . '>' . '<img width=72 height=52 alt="Unable to View" src=' . $row3["image"] . '>' . '</a>';
									echo '</td>';
									echo '<td>'.$row3['qty'].'</td>';
									echo '<td>';
									echo'<a rel="facebox" href=editroom.php?id=' . $row3["room_id"] . '>' . 'Edit' . '</a>';
									echo ' | ';
									echo'<a rel="facebox" href=deleteroom.php?id=' . $row3["room_id"] . '>' . 'Delete' . '</a>';
									echo '</td>';
								 echo '</tr>';
							
								  }
			  
			  ?>
          </tbody>
       </table>
  
  
</div>
</body>
</html>
