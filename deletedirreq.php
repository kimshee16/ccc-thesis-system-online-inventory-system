<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM directorrequest WHERE id='$id'");
$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Delete 1 director's request, '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php");

?>