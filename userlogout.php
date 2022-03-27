<?php
	ob_start();
	session_start();
	date_default_timezone_set("Asia/Manila");
	if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}
	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Logout', '$dn')");
					
	session_destroy();
	header("Location: index.php");
?>

