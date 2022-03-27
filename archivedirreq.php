<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getdir = mysqli_query($conn, "SELECT * FROM directorrequest");

	while($getdirrow = mysqli_fetch_array($getdir)){
		$section = "Director's Request for Fixed Assets Transfer";
		$description = $getdirrow['quantity']." ".$getdirrow['item'];
		$person = $getdirrow['personincharge'];
		$date = $getdirrow['daterequested'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `directorrequest`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Director Request for Fixed Assets Transfer', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=1");


?>