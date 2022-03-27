<?php
ob_start();
$conn = mysqli_connect("localhost", "root", "", "ccc_inventorysystem");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
?>