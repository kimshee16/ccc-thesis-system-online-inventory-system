<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$getinventory = mysqli_query($conn, "SELECT * FROM physical_inventory");

	while($getinventoryrow = mysqli_fetch_array($getinventory)){
		$section = "Physical Inventory";
		$description = $getinventoryrow['quantity']." ".$getinventoryrow['name'].", ".$getinventoryrow['status'];
		$person = $getinventoryrow['personincharge'];
		$date = $getinventoryrow['inventorydate'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `physical_inventory`");
	
	mysqli_close($conn);
	header("Location: dashboard.php?done=");
	
?>