<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

//ID and batch number is ready
$id = $_GET['id'];
$batchnum = $_POST['batchnum'];

//get the data from dept request database
$getdeptreq = mysqli_query($conn, "SELECT * FROM dept_request WHERE id = '$id'");
$getdeptreqrow = mysqli_fetch_array($getdeptreq);

//data from from dept request database
$item = $getdeptreqrow['name_desc'];
$deptquantity = $getdeptreqrow['quantity'];
$pic = $getdeptreqrow['personincharge'];
$unit = $getdeptreqrow['unit'];
$date = date("Y-m-d");

//get location data from offices database
$getloc = mysqli_query($conn, "SELECT * FROM personincharge WHERE name = '$pic'");
$getlocrow = mysqli_fetch_array($getloc);

//location data from offices database
$loc = $getlocrow['dept'];

$getinch = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$loc'");
$getinchrow = mysqli_fetch_array($getinch);

$incharge = $getinchrow['personincharge'];

//get quantity and itemcode data from supplies database
$getsupp = mysqli_query($conn, "SELECT * FROM supplies WHERE name_desc = '$item' AND batchnumber = '$batchnum'");
$getsupprow = mysqli_fetch_array($getsupp);

//quantity and itemcode from supplies database
$suppquantity = $getsupprow['quantity'];
$itemcode = $getsupprow['itemcode'];

//subtract the dept request quantity from supplies quantity
$deptdiff = $suppquantity - $deptquantity;

//update status to approved
$updatedept = mysqli_query($conn, "UPDATE dept_request SET r_status = '1' WHERE id = '$id'");
//update quantity to supplies database
$updatesupp = mysqli_query($conn, "UPDATE supplies SET quantity = '$deptdiff' WHERE name_desc = '$item' AND batchnumber = '$batchnum' AND location = 'VPA'");
//insert new entry for other dept for newly transfered item together with batch number
$insertsupptonew = mysqli_query($conn, "INSERT INTO supplies (name_desc, unit, quantity, itemcode, batchnumber, location, receivingperson, receivingdate) VALUES ('$item', '$unit', '$deptquantity', '$itemcode', '$batchnum', '$loc', '$incharge', '$date')");

mysqli_close($conn);

$dn = date("Y-m-d G:i:s");
$sn = $_SESSION['name'];
mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Approve Supplies Request', '$dn')");

header("Location: dashboard.php?done=");

/*
$getdeptreqnum = mysqli_query($conn, "SELECT * FROM dept_request WHERE id = '$id'");
$getdeptreqnumrow = mysqli_fetch_array($getdeptreqnum);

i
*/

/*
$getdeptreq = mysqli_query($conn, "SELECT * FROM dept_request WHERE id = '$id'");
$getdeptreqrow = mysqli_fetch_array($getdeptreq);

$item = $getdeptreqrow['name_desc'];
$deptquantity = $getdeptreqrow['quantity'];
$pic = $getdeptreqrow['personincharge'];

$getsupp = mysqli_query($conn, "SELECT * FROM supplies WHERE name_desc = '$item'");
$getsupprow = mysqli_fetch_array($getsupp);

$suppquantity = $getsupprow['quantity'];

$deptdiff = $suppquantity - $deptquantity;

$updatedept = mysqli_query($conn, "UPDATE dept_request SET r_status = '1' WHERE id = '$id'");
$updatesupp = mysqli_query($conn, "UPDATE supplies SET quantity = '$deptdiff' WHERE name_desc = '$item'");
*/

//echo $deptdiff;

/*
$stringmessage = "Hi ".$pic."! Your request has been approved. Please claim the item at VPA Office. Thank you.";
$datenow = date("Y-m-d h:i:s");

$addnotif = mysqli_query($conn, "INSERT INTO requester_status (personincharge, ar_status, supplyorequipment, date) VALUES('$pic', '$stringmessage', '$item', '$datenow')");

$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Approve supply request', '$dn')");

mysqli_close($conn);
header("Location: dashboard.php");
*/
?>