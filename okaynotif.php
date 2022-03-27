<?php
ob_start();
session_start();

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$id = $_GET['id'];

$sql = "DELETE FROM requester_status WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "SQL Error! <a href='main.php'>Try again.</a>";
	}else{
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
	}

mysqli_close($conn);
header("Location: notifications.php");

?>