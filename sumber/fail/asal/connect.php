<?php

//$conn = mysqli_connect("localhost","root","","borrow");
$conn = mysqli_connect("localhost","akar","akar","mvc_pinjambarang");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>