<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<input name="id" type="hidden" value="'. $messages_id . '" />';
			
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "booking";
				$confirmation = $messages_id;
				// Create connection
				$con = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($con->connect_error) {
					die("Connection failed: " . $con->connect_error);
						}
					$sql = "SELECT * FROM payment WHERE confirmation = '$confirmation'";
						$result = $con->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				while($rows = $result->fetch_assoc()) {
					echo "<img  height='1000px' width='1000px' src='".$rows['imgpath']."'>";				
				}
				
				} else {
				echo "0 results";
				}
	}
?>