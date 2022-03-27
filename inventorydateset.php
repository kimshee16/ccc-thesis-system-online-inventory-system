<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$date = $_POST['date'];

	//To check if there are date in the inventory date database.
	$checkdate = mysqli_query($conn, "SELECT * FROM inventorydate");
	$checkdatearr = mysqli_fetch_array($checkdate);

	if(empty($checkdatearr['date'])){
		mysqli_query($conn, "INSERT INTO inventorydate (date) VALUES ('$date')");
		mysqli_close($conn);
		header("Location: setinventorydate.php");
	}else{
		mysqli_query($conn, "UPDATE inventorydate SET date = '$date'");
		mysqli_close($conn);
		header("Location: setinventorydate.php");
	}


?>