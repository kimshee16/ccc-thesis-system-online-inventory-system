<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getsuppreq = mysqli_query($conn, "SELECT * FROM supplies_request");

	while($getsuppreqrow = mysqli_fetch_array($getsuppreq)){
		$section = "Supplies Request";
		$description = $getsuppreqrow['quantity']." ".$getsuppreqrow['name_desc'].", ".$getsuppreqrow['req_status'];
		$person = $getsuppreqrow['requestor_name'];
		$date = $getsuppreqrow['requesting_date'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `supplies_request`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Supplies Request', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>