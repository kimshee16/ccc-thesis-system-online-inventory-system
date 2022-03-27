<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getborrow = mysqli_query($conn, "SELECT * FROM borrowitem");

	while($getborrowrow = mysqli_fetch_array($getborrow)){
		if($getborrowrow['b_status'] == "3"){
			$stat = "returned";
		}else{
			$stat = "unreturned";
		}

		$section = "Equipment Borrow Request";
		$description = $getborrowrow['quantity']." ".$getborrowrow['itemborrowed'].", ".$stat;
		$person = $getborrowrow['personincharge'];
		$date = $getborrowrow['datereturned'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `borrowitem`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Borrow Item Request', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");


?>