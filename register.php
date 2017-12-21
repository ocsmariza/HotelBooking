<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Register</title>
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
<style>
.div{
	background-image: url("images/b_form.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
}
</style>
</head>

<body>

<div style="width:300px; height:300px; margin:10px auto; position:relative; border:3px solid rgba(0,0,0,0);
 -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
 -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4); margin-top:10%;" class="div">
  <h1><div align="center" style="margin-top:-5%;">Register</div></h1>
  <form id="form1" name="register" method="post" action="register.php" onsubmit="return validateForm()" style="margin-top:15%;">
  <table width="286" align="center">
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="92"><div align="right">Username</div></td>
    <td width="178"><input type="text" name="username"/></td>
  </tr>
  <tr>
    <td><div align="right">Password:</div></td>
    <td>
      <input type="password" name="password"/>
    </td>
  </tr>
  <tr>
    <td><div align="right">Email:</div></td>
    <td>
      <input type="email" name="email"/>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Register" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
	<td><input type="submit" name="cancel" value="Cancel" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
  </form>
<?php
	require ('config.php');
	
	if(isset($_POST['cancel'])){
	header('location: login.php');
	}
	if(isset($_POST['Submit'])){
		$user=$_POST["username"];
		$pass=$_POST['password'];
		$email=$_POST['email'];
		$pos="client";

		$sql="SELECT username FROM user ";
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $row["username"];
	   if($row["username"]==$user){
			echo "username already Exist";
			exit();
		}if($row["username"]!=$user){
					$sql = "INSERT INTO user (username, password, position, email)
					VALUES ('$user', '$pass', '$pos', '$email')";
					if (mysqli_query($con, $sql)) {
					echo "<div align='center'>";
					echo "<a href='admin_index.php'>LOGIN</a>";
					echo "</div>";
					exit();
					} else {
					echo "";
					}
		}
    }
} else {
    echo "0 results";
}


}
?>
</div>
</body>
</html>
