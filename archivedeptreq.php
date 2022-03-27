<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}


	$getdept = mysqli_query($conn, "SELECT * FROM dept_request");

	while($getdeptrow = mysqli_fetch_array($getdept)){
		if($getdeptrow['r_status'] == "1"){
			$stat = "approved";
		}else{
			$stat = "disapproved";
		}

		$section = "Department Request for Supplies";
		$description = $getdeptrow['quantity']." ".$getdeptrow['name_desc'].", ".$stat;
		$person = $getdeptrow['personincharge'];
		$date = $getdeptrow['daterequested'];

		mysqli_query($conn, "INSERT INTO archiverecords (section, description, personincharge, date) VALUES ('$section', '$description', '$person', '$date')");

	}


	mysqli_query($conn, "DELETE FROM `dept_request`");
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Archive Department Request for Supplies', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=1");


?>