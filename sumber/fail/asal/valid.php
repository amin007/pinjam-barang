<?php
	require_once 'connect.php';
	session_start();
	$_SESSION['admin_id'] = 'biarlah';
/*	if(!ISSET($_SESSION['admin_id'])){
		header('location: index.php');
	}
*/