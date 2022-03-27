<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}


$id = $_POST['id'];	
$location = $_POST['location'];
$barcode = $_POST['barcode'];

$checkexist = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$barcode' AND id = '$id'");
$checknumrow = mysqli_num_rows($checkexist);


if($checknumrow > 0){

		$getpic = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$location'");
		$getpicrow = mysqli_fetch_array($getpic);

		$person = $getpicrow['personincharge'];

		mysqli_query($conn, "UPDATE fixedassets SET location = '$location', personincharge = '$person' WHERE id = '$id'");

		mysqli_close($conn);
		header("Location: dashboard.php?done=1");

	}else{
		header("Location: settransfer.php?err=Non-existing item&id=".$id);
	}


?>