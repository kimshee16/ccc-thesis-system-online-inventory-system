<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];

$getrecord = mysqli_query($conn, "SELECT * FROM supplies WHERE id = '$id'");
$getrecordrow = mysqli_fetch_array($getrecord);

$qu = $getrecordrow['quantity']." ".$getrecordrow['unit'];
$name = $getrecordrow['name_desc'];
$location = $getrecordrow['location'];
$pic = $getrecordrow['receivingperson'];
$itemcode = $getrecordrow['itemcode'];
$date = date("Y-m-d");

mysqli_query($conn, "INSERT INTO supp_consumed (itemcode, name_desc, fromlocation, fromwho, quantity_unit, datetrans) VALUES ('$itemcode', '$name', '$location', '$pic', '$qu', '$date')");

mysqli_query($conn, "DELETE FROM supplies WHERE id = '$id'");

mysqli_close($conn);
header("Location: dashboard.php?done=");

?>