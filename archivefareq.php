<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getfareq = mysqli_query($conn, "SELECT * FROM fixedassets_request");

	while($getfareqrow = mysqli_fetch_array($getfareq)){
		$section = "Fixed Assets Request";
		$description = $getfareqrow['quantity']." ".$getfareqrow['name'].", ".$getfareqrow['req_status'];
		$person = $getfareqrow['requestor_name'];
		$date = $getfareqrow['requesting_date'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `fixedassets_request`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Fixed Assets Request', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>