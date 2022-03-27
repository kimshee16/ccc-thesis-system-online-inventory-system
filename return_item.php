<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];
$itemnum = $_POST['itemnum'];
$datenow = date("Y-m-d h:i:s");

$checkitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemcode = '$itemnum' AND id = '$id'");

$checkitemrow = mysqli_fetch_array($checkitem);

if(!empty($checkitemrow['itemcode'])){
	$item = $checkitemrow['itemborrowed'];	

	$updatereturndate = mysqli_query($conn, "UPDATE borrowitem SET datereturned = '$datenow' WHERE id = '$id'");
	$updatestatus = mysqli_query($conn, "UPDATE borrowitem SET b_status = '3' WHERE id = '$id'");
	$updatestatus = mysqli_query($conn, "UPDATE fixedassets SET status='functioning' WHERE itemname = '$item'");

	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Confirm item returning', '$dn')");

	header("Location: dashboard.php?done=1");
}else{
	header("Location: return_item_confirm.php?id=".$id."&numerr2=Invalid Item code!");
}

?>