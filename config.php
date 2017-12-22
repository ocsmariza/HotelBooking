<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking";

//create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if(!$con){
     die("ERROR: Could not connect. " . mysqli_connect_error());
 }

        ?>