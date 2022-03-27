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

$checkitem = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$itemnum' AND location = 'VPA'");

$checkitemrow = mysqli_fetch_array($checkitem);

if(!$checkitemrow['itemname'] == ""){
	$item = $checkitemrow['itemname'];

	$checkbitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed = '$item' AND id='$id'");

	$checkbitemrow = mysqli_fetch_array($checkbitem);
	if(!$checkbitemrow['itemborrowed'] == ""){
		$datenow = date("Y-m-d h:i:s");
		$updateitem = mysqli_query($conn, "UPDATE borrowitem SET itemcode='$itemnum', dateclaimed='$datenow', b_status='2' WHERE itemborrowed = '$item' AND id='$id'");
		$updatestatus = mysqli_query($conn, "UPDATE fixedassets SET status='BORROWED' WHERE itemname = '$item'");

		$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];

		mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Confirm item claiming', '$dn')");

		header("Location: dashboard.php?done=1");
		}else{
			header("Location: confirm_itemcode.php?id=".$id);
			}

}else{
	mysqli_close($conn);
	header("Location: confirm_itemcode.php?id=".$id);
}

/*
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
*/
?>