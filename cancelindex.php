<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cancel</title>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="css/example.css" media="screen" rel="stylesheet" type="text/css" />
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
  
  <script type="text/javascript">
function validateForm()
{

var a=document.forms["cancelpage"]["confirmation"].value;
if ((a==null || a==""))
  {
  alert("enter your confirmation number to cancel you reservation");
  return false;
  }
 
if (document.cancelpage.cancelpolicy.checked == false)
{
alert ('pls. agree the cancelation policy of this hotel');
return false;
}
else
{
return true;
}
}
</script>

</head>

<body>
<form id="form1" name="cancelpage" method="post" action="cancelindex.php"  onsubmit="return validateForm()">
  <label>Confirmation Number
  <input type="text" name="confirmation" id="ed" />
  <br />
  <input type="checkbox" name="cancelpolicy" value="checkbox" />
  I agree the <a rel="facebox" href="cancelationpolicy.php">cancelation policy</a> of this hotel<br />
  </label>
  <p><input name="cancel" type="submit" value="Cancel" id="button1" />&nbsp;</p>
</form>

</body>
</html>
<?php
			if(isset($_POST['cancel'])){

			$con = mysql_connect("localhost","root","");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
			
			mysql_select_db("booking", $con);
			$confirmation = $_POST['confirmation'];
			$status='Canceled';
			//$result = mysql_query("SELECT * FROM friendlist WHERE friends_id = $member_id");
			mysql_query("UPDATE reservation SET status='$status' WHERE confirmation='$confirmation'");
			mysql_query("UPDATE roominventory SET status='$status' WHERE confirmation='$confirmation'");
			header("location: index.html");
			exit();
			
			mysql_close($con);
			}
			
?>