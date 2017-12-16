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



</script>
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

<br /><br /><br />
<div id="featured">
  
  <br />
  
  <form action="viewreservation.php" method="post" style="height: 89px; margin-top: -31px;" name="log">
  <table width="1002" border="0">
    <tr>
      <td colspan="3"><div align="right" class="style1"></div></td>
      </tr>
    <tr>
      <td width="133"><div align="right" class="style1">Confirmation Number:</div></td>
      <td width="262"><input name="text" type="text" class="ed" id="last" size="35" />
      <span class="style3">*</span></td>
      <td width="93">&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><input name="login" type="submit" value="login" /></td>
      <td>&nbsp;</td>
    </tr>
	</table> 
 </form> 
 <br /> <br /> <br />  <br />
 </div>
<div class="clear"></div>

</div>
<br /> <br />  <br /> <br /> <br />  <br /> <br /> <br />  <br /> <br /> <br />  <br /> <br /> <br /> 
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
