<?php
	ob_start();
	session_start();

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	
	$date = date("Y-m-d h:i:sa");
	$id = $_GET['id'];
	
	$r = mysqli_query($conn, "SELECT * FROM borrowitem WHERE id='$id'");
	
	$rw = mysqli_fetch_array($r);
	
	if($rw['b_status'] == '1') {
		$pic = $rw['personincharge'];
		$soe = $rw['itemborrowed'];
		$ar = "Your request has been approved! You have 3 business days before claiming the item to VPA office. Thank you.";
		mysqli_query($conn, "INSERT INTO requester_status (personincharge, ar_status, supplyorequipment, date) VALUES ('$pic','$ar','$soe','$date')");
	}elseif($rw['b_status'] == '2') {
		$pic = $rw['personincharge'];
		$soe = $rw['itemborrowed'];
		$ar = "Your request has been rejected! Sorry.";
		mysqli_query($conn, "INSERT INTO requester_status (personincharge, ar_status, supplyorequipment, date) VALUES ('$pic','$ar','$soe','$date')");
	}
	
	mysqli_close($conn);
	header("Location: dashboard.php?done=");
?>