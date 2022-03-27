<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$name_desc = $_POST['name_desc1'];
$quantity = $_POST['quantity1'];
$unit = $_POST['unit1'];
$reqdate = date("Y-m-d G:i:s");
$person = $_SESSION['name'];

$inputreq = mysqli_query($conn, "INSERT INTO supplies_request (name_desc, quantity, unit, requesting_date, requestor_name) VALUES ('$name_desc', '$quantity', '$unit', '$reqdate', '$person')"); 

mysqli_close($conn);
header("Location: dashboard.php");

?>