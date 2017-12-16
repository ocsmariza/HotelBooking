<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>X-Axis Hotel</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/font2.css">
<link rel="stylesheet" href="font/font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{

var y=document.forms["room"]["no_rooms"].value;

if ((y==null || y==""))
  {
  alert("all field are required!");
  return false;
  }

}
</script>
<!--sa minus date-->
<script type="text/javascript">
	// Error checking kept to a minimum for brevity
 
	function setDifference(frm) {
	var dtElem1 = frm.elements['start'];
	var dtElem2 = frm.elements['end'];
	var resultElem = frm.elements['result'];
	 
// Return if no such element exists
	if(!dtElem1 || !dtElem2 || !resultElem) {
return;
	}
	 
	//assuming that the delimiter for dt time picker is a '/'.
	var x = dtElem1.value;
	var y = dtElem2.value;
	var arr1 = x.split('/');
	var arr2 = y.split('/');
	 
// If any problem with input exists, return with an error msg
if(!arr1 || !arr2 || arr1.length != 3 || arr2.length != 3) {
resultElem.value = "Invalid Input";
return;
	}
	 
var dt1 = new Date();
dt1.setFullYear(arr1[2], arr1[1], arr1[0]);
var dt2 = new Date();
dt2.setFullYear(arr2[2], arr2[1], arr2[0]);

resultElem.value = (dt2.getTime() - dt1.getTime()) / (60 * 60 * 24 * 1000);
}
</script>



<!--sa input that accept number only-->
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>

<!--end sa nivo slider-->
<?php	
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$adults = $_POST['adult'];
	$child = $_POST['child'];	
	
?>

<style type="text/css">
<!--
.style2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<!-- Navigation Bar -->
<div class="w3-bar w3-black w3-large">
  <a href="index.html" class="w3-bar-item w3-button w3-aqua w3-mobile"><img src="img/logo.png"></a>
  <a href="index.html" class="w3-bar-item w3-button w3-mobile">HOME</a>
  <a href="admin_index.php" class="w3-bar-item w3-button w3-right w3-mobile">Admin</a>
</div>




<!-- HEADER -->
<!-- CONTENT -->
<div id="content">

<div id="leftPan">

<div id="services">
<h2>RESERVATION DETAILS</h2>
<p>
  <ul>
      Check In Date :<?php echo $arival; ?><br />
      Check Out Date :<?php echo $departure; ?>  <br />
	  Adults : <?php echo $adults; ?><br />
	  Child :<?php echo $child; ?><br />
	  
 </ul>
    </p>
</p>
</div>


</div>
<div id="featured"><br />
 <div>
 <form action="personnalinfo.php" method="post" onsubmit="return validateForm()" name="room">
  <input name="start" type="hidden" value="<?php echo $arival; ?>" />
  <input name="end" type="hidden" value="<?php echo $departure; ?>" />
  <input name="adult" type="hidden" value="<?php echo $adults; ?>" />
  <input name="child" type="hidden" value="<?php echo $child; ?>" />
  <span class="style2">NUMBER OF ROOM/ROOMS:</span> 
  <input id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="no_rooms" class="ed">
 </div><br />

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
$result = mysql_query("SELECT * FROM room");

while($row = mysql_fetch_array($result))
  {
  $a=$row['room_id'];
  $query = mysql_query("SELECT sum(qty_reserve) FROM roominventory where arrival <= '$arival' and departure >= '$departure' and room_id='$a'");
while($rows = mysql_fetch_array($query))
  {
  $inogbuwin=$rows['sum(qty_reserve)'];
  }
  $angavil = $row['qty'] - $inogbuwin;
echo '<table width="490" border="0">';
  echo '<tr>';
    echo '<td colspan="2">&nbsp;<span class="style2">'.$row['type'].'</span></td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td width="150" rowspan="5">'. '<img width=150 height=105 alt="Unable to View" src="' . $row["image"] . '"/>'.'</td>';
    echo '<td width="340">';
	$rt=$row['rate'];
	echo 'Room Rates: Php ';
	echo formatMoney($rt, true);
	echo '</td>';
  echo '</tr>';
    echo '<tr>';
    echo '<td>'.'Available Rooms: '.$angavil.'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Room Description: '.$row['description'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum Child Capacity: '.$row['max_child'].'</td>';
  echo '</tr>';
  echo '<tr>';
    echo '<td>'.'Maximum Adult Capacity: '.$row['max_adult'].'</td>';
    echo '<td>';
	if ($angavil > 0){
	echo '<input name="roomid" type="image" value="' .$row["room_id"]. '" src="images/reseve.jpg" alt="Reserve" align="middle" width="60" height="30" onclick="setDifference(this.form);" />';
					}
  if ($angavil <= 0){
	echo '<span class="style5">'.'Not Available'.'</span>';
				    }	
	echo '</td>';
  echo '</tr>';
echo '</table>';  
}
mysql_close($con);
?> 
 
 
 
 
  
  <input type="hidden" name="result" id="result" />
</form>
</div>
<div class="clear"></div>

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
<!------------------------------------------------------ The JavaScript ------------------->  
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js?ver=3.3"></script>
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

$('a[href^="#"]').click(function(){

var the_id = $(this).attr("href");

    $('html, body').animate({
        scrollTop:$(the_id).offset().top
    }, 1000);

return false;});
</script>
</body>
</html>
