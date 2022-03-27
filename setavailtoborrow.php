<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$id = $_GET['id'];

	$getperm = mysqli_query($conn, "SELECT * FROM fixedassets WHERE location = 'VPA' AND id = '$id'");
	$getpermrow = mysqli_fetch_array($getperm);

	if($getpermrow['permissioncode'] == '0') {
		mysqli_query($conn, "UPDATE fixedassets SET permissioncode = '1' WHERE location = 'VPA' AND id = '$id'");
		mysqli_close($conn);
		header("LOcation: dashboard.php?done=");
	}elseif($getpermrow['permissioncode'] == '1') {
		mysqli_query($conn, "UPDATE fixedassets SET permissioncode = '0' WHERE location = 'VPA' AND id = '$id'");
		mysqli_close($conn);
		header("LOcation: dashboard.php?done=");
	}

?>