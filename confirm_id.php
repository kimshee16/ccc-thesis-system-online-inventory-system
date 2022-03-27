<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];
$idnum = $_POST['idnum'];

$checkid = mysqli_query($conn, "SELECT * FROM personincharge WHERE idnum = '$idnum'");

$checkidrow = mysqli_fetch_array($checkid);
	if(!$checkidrow['name'] == ""){
		$name = $checkidrow['name'];
		
		$checkcharge = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge = '$name' AND id='$id'");

		$checkchargerow = mysqli_fetch_array($checkcharge);
			if(!$checkchargerow['personincharge'] == ""){
				$updateid = mysqli_query($conn, "UPDATE borrowitem SET idnum='$idnum' WHERE personincharge = '$name' AND id='$id'");
				header("Location: confirm_itemcode.php?id=".$id);
			}else{
				header("Location: confirm_id_barcode.php?id=".$id);
				}		
		
	}else{
		header("Location: confirm_id_barcode.php?id=".$id);
	}

?>