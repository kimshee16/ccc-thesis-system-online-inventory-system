<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$numday = $_POST['numday'];

	mysqli_query($conn, "UPDATE reserveday SET numday = '$numday'");

	mysqli_close($conn);
	header("Location: setinventorydate.php");
?>