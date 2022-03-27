<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];

$deletereqrec = mysqli_query($conn, "DELETE FROM dept_request WHERE id = '$id'");

mysqli_close($conn);

$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Delete 1 department request', '$dn')");

header("Location: dashboard.php?done=");
?>