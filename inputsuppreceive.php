<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$name_desc = $_POST['name_desc1'];
$quantity = $_POST['quantity1'];
$unit = $_POST['unit1'];



?>