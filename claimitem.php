<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}



$id = $_GET['id'];
$now = date("Y-m-d G:i:s");

$getday = date("l");

if($getday == "Sunday" || $getday == "Saturday"){
	header("Location: dashboard.php?claimerr=No claiming of items during weekends!");
	}else{
		$claim = mysqli_query($conn, "SELECT * FROM borrowitem WHERE id='$id' AND datetobeclaimed<='$now'");

		$crow = mysqli_fetch_array($claim);
			
		if(!empty($crow['personincharge'])){
			header("Location: confirm_id_barcode.php?id=".$id);
		}elseif(empty($crow['personincharge'])){
			header("Location: dashboard.php?done=&claimerr=Please wait until remaining days is 0!");
			}

	}

	/*
	$dateapprove = $crow['dateapproved'];
	$da = date_create($dateapprove);
	date_modify($da,"+3days");
	$end = date_format($da,"Y-m-d h:i:s");
	echo $end."<br><br>";
	
	$now = date("Y-m-d h:i:s");
	$today = date_create($now);
	$datenow = date_format($today,"Y-m-d h:i:s");
	*/

	/*
	if($end >= $datenow){
		echo "Okay na!";
		//Claiming process goes here!
		//
	}else{
		echo "Hindi okay!";
		//header("Location: dashboard.php?claimerr=Please wait until remaining days is 0!");
	}
	*/

?>