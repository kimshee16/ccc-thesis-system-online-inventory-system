<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$itemid = $_GET['id'];

$getofficeperson = mysqli_query($conn, "SELECT * FROM offices WHERE office = 'VPA'");
$getperson = mysqli_fetch_array($getofficeperson);

$person = $getperson['personincharge'];

$updatemal = mysqli_query($conn, "UPDATE fixedassets SET `status` = 'malfunctioned', `location` = 'Stockroom', personincharge = '$person' WHERE id = '$itemid' ");

$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Set specific fixed asset as obsolete item inventory', '$dn')");

mysqli_close($conn);

header("Location: dashboard.php?done=");

?>