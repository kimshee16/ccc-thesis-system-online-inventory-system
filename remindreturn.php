<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];

$getname = mysqli_query($conn, "SELECT * FROM borrowitem WHERE id = '$id'");
$getnamerow = mysqli_fetch_array($getname);

$pic = $getnamerow['personincharge'];
$item = $getnamerow['itemborrowed'];
$approvalperson = $getnamerow['approvedby'];
$date = $getnamerow['dateclaimed'];

$getemail = mysqli_query($conn, "SELECT * FROM personincharge WHERE name = '$pic'");
$getemailrow = mysqli_fetch_array($getemail);

$email = $getemailrow['email'];

$message = "Good day! Please be reminded to return the specific item you have borrowed, ".$item.". Thank you. <br><br>Date and time borrowed: ".
	$date."<br>Approved by: ".$approvalperson;

mail($email, 'Reminder for Borrowed Equipment Returning', $message);

$message2 = "Good day! Please be reminded to return the specific item you have borrowed. Thank you.";
$datenow = date("Y-m-d h:i:s");

mysqli_query($conn, "INSERT INTO requester_status (personincharge, ar_status, supplyorequipment, date) VALUES ('$pic', '$message2', '$item', '$datenow')");

header("Location: dashboard.php");

?>