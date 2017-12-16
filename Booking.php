<!DOCTYPE html>
<html>
<title>X-axis Hotel</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="font/font2.css">
<link rel="stylesheet" href="font/font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
body,h1,h2,h3,h4,h5,h6 {
		font-family: "Raleway", Arial, Helvetica, sans-serif
		}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #1a1a1a;
  color: white;
  cursor: pointer;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

#myBtn:hover {
  background-color: #f1f1f1;
}		
</style>
<!--sa calendar-->	
	<script type="text/javascript" src="js/datepicker.js"></script>
        <link href="css/demo.css"       rel="stylesheet" type="text/css" />
        <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
//<![CDATA[

/*
        A "Reservation Date" example using two datePickers
        --------------------------------------------------

        * Functionality

        1. When the page loads:
                - We clear the value of the two inputs (to clear any values cached by the browser)
                - We set an "onchange" event handler on the startDate input to call the setReservationDates function
        2. When a start date is selected
                - We set the low range of the endDate datePicker to be the start date the user has just selected
                - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

        * Caveats (aren't there always)

        - This demo has been written for dates that have NOT been split across three inputs

*/

function makeTwoChars(inp) {
        return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
        // Clear any old values from the inputs (that might be cached by the browser after a page reload)
        document.getElementById("sd").value = "";
        document.getElementById("ed").value = "";

        // Add the onchange event handler to the start date input
        datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
}

var initAttempts = 0;

function setReservationDates(e) {
        // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
        // until they become available (a maximum of ten times in case something has gone horribly wrong)

        try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
        } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
        }

        // Check the value of the input is a date of the correct format
        var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

        // If the input's value cannot be parsed as a valid date then return
        if(dt == 0) return;

        // At this stage we have a valid YYYYMMDD date

        // Grab the value set within the endDate input and parse it using the dateFormat method
        // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
        var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

        // Set the low range of the second datePicker to be the date parsed from the first
        ed.setRangeLow( dt );
        
        // If theres a value already present within the end date input and it's smaller than the start date
        // then clear the end date value
        if(edv < dt) {
                document.getElementById("ed").value = "";
        }
}

function removeInputEvents() {
        // Remove the onchange event handler set within the function initialiseInputs
        datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
}

datePickerController.addEvent(window, 'load', initialiseInputs);
datePickerController.addEvent(window, 'unload', removeInputEvents);

//]]>
</script>

<!--sa error trapping-->
<script type="text/javascript">
function validateForm()
{
var x=document.forms["index"]["start"].value;
if (x==null || x=="")
  {
  alert("you must enter your check in Date(click the calendar icon)");
  return false;
  }
var y=document.forms["index"]["end"].value;
if (y==null || y=="")
  {
  alert("you must enter your check out Date(click the calendar icon)");
  return false;
  }
}
</script>
<!--end sa nivo slider-->
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {
	font-size: 1.4em;
	font-weight: bold;
	color: #FFFFFF;
}
.style3 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>

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
</head>
<body class="w3-light-grey">
<!-------- Button------>
	<button onclick="topFunction()" id="myBtn" title="Go to top"><img src="img/up.png" alt="scrollUp" align="middle" width=20 height=20></button>
<!-- Navigation Bar -->
<div class="w3-bar w3-black w3-large">
  <a href="index.html" class="w3-bar-item w3-button w3-aqua w3-mobile"><img src="img/logo.png"></a>
  <a href="#rooms" class="w3-bar-item w3-button w3-mobile">Rooms</a>
  <a href="Gallery.html" class="w3-bar-item w3-button w3-mobile">Gallery</a>
  <a href="#amenities" class="w3-bar-item w3-button w3-mobile">Amenities</a>
  <a href="#about" class="w3-bar-item w3-button w3-mobile">About</a>
  <a href="#contact" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="home_admin.php" class="w3-bar-item w3-button w3-right w3-mobile">Admin</a>
  <a href="#booked" class="w3-bar-item w3-button w3-right  w3-mobile">Book Now</a>
</div>
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
  <img class="w3-image" src="img/img1.jpg" alt="The Hotel" style="min-width:1000px" width="1500" height="800">
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-aqua">
      <h2><i class="fa fa-bed w3-margin-right"></i>X-AXIS Hotel</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16" id="formPan">
	
	<!--BOOKING-->
	<div style="margin-top:10px; margin-left:10px;">
     <form method="post" action="booked.php" name="index" onsubmit="return validateForm()" class=" w3-padding-large ">
	<table width="186" border="0">
	<tr>
    <td class="w3-half">
	<div >
            <label><i class="fa fa-calendar-o"></i> Check In</label>
          </div></td>
    <td width="101">
	<input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today w3-padding-16" name="start" id="sd" value="" maxlength="10" readonly="readonly" />
	</td>
  <td><div class="w3-half">
            <label><i class="fa fa-calendar-o"></i>Check Out</label>
           </div></td>
    <td><input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today w3-padding-16" name="end" id="ed" value="" maxlength="10" readonly="readonly" /></td>

  </tr>
  <tr>
    <td>
	<div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-male"></i> Adults</label>
          </div>
	</td>
    <td><select name="adult" class="ed w3-padding-16" >
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select></td>
	
	<td>
	<div class="w3-half">
            <label><i class="fa fa-child"></i> Kids</label>
          </div>
		  </td>
    <td><select name="child" class="ed w3-padding-16">
      <option>0</option>
      <option>1</option>
      <option>2</option>
    </select></td>
  </tr>
</table>   
	<input name="Input" type="submit" value="Check Availability" id="button" class="w3-button w3-dark-grey w3-padding  w3-padding-32"  >
</form>
 </div> 
    </div>
  </div>
</header>
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