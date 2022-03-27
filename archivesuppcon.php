<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getsuppcon = mysqli_query($conn, "SELECT * FROM suppliesconsumption");

	while($getsuppconrow = mysqli_fetch_array($getsuppcon)){
		$section = "Supplies Consumption Inventory";
		$description = $getsuppconrow['quantity']." ".$getsuppconrow['name_desc'].", to ".$getsuppconrow['location'];
		$person = $getsuppconrow['personincharge'];
		$date = $getsuppconrow['issuingdate'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `suppliesconsumption`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Supplies Consumption', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>