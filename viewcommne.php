<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css/ble.css" rel="stylesheet" type="text/css" />
<!--sa pop up-->
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
<link rel="stylesheet" href="./febe/style.css" type="text/css" media="screen" charset="utf-8">
    
        <script src="./js/application.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
 <?php
if ($_SESSION['SESS_FIRST_NAME']=="admin"){
	echo '<ul class="menu">';
  echo '<li class="comment"><a href="viewcommne.php"><img src="images/viewcomment.png" alt="view" /></a></li>';
  echo '<li class="b"><a href="home_admin.php"><img src="images/monitor.png" alt="monitor" /></a></li>';
  echo '<li class="c"><a href="reports.php"><img src="images/report.png" alt="report" /></a></li>';
  echo '<li class="d"><a href="roominventory.php"><img src="images/inventory.png" alt="inventory" /></a></li>';
  echo '<li class="e"><a href="room.php"><img src="images/maintenance.png" alt="maintenance" /></a></li>';
  echo '<li class="f"><a href="admin_index.php"><img src="images/logout.png" alt="logout" /></a></li>';
 echo '</ul>';
 }
 ?> 
 <div style="width:600px; margin:0 auto; position:relative; border:3px solid rgba(0,0,0,0); -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;" align="center">
  <br /><label style="margin-left:12px;">Filter</label> <input type="text" name="filter" value="" id="filter" /><br />
  
  <table cellpadding="10" cellspacing="2" id="resultTable">
          <thead>
            <tr bgcolor="#33FF00" style="margin-bottom:10px;">
              <th>Name</th>
              <th>Email Address</th>
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
								
								$result3 = mysql_query("SELECT * FROM comment");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {
								 echo '<tr>';
    								echo '<td class="contacts">'.$row3['name'].'</td>';
    								echo '<td class="contacts">'.$row3['email'].'</td>';
									echo '<td class="contacts">'.'<a rel="facebox" href=viewcomment.php?id=' . $row3["comment_id"] . '>' . 'Read Message' . '</a>'.'&nbsp|&nbsp'.' <a rel="facebox" href=deletemessage.php?id=' . $row3["comment_id"] . '>' . 'Delete' . '</a>'.'</td>';
									
  								echo '</tr>';
							
								  }
			  
			  ?>
          </tbody>
       </table>
  
  
</div>
</body>
</html>
