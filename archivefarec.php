<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getsuppreq = mysqli_query($conn, "SELECT * FROM fixedassets_receive");

	while($getsuppreqrow = mysqli_fetch_array($getsuppreq)){
		$section = "Fixed Assets Receive";
		$description = $getsuppreqrow['quantity']." ".$getsuppreqrow['name'];
		$person = $getsuppreqrow['receiver_name'];
		$date = $getsuppreqrow['receiving_date'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `fixedassets_receive`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Fixed Assets Receiving', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>