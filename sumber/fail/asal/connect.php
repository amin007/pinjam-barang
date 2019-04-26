<?php

$conn = mysqli_connect("localhost","root","","borrow");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>