<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getsupprec = mysqli_query($conn, "SELECT * FROM supplies_receive");

	while($getsupprecrow = mysqli_fetch_array($getsupprec)){
		$section = "Supplies Receive";
		$description = $getsupprecrow['quantity']." ".$getsupprecrow['name_desc'];
		$person = $getsupprecrow['receiver_name'];
		$date = $getsupprecrow['receiving_date'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `supplies_receive`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Supplies Receive', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>