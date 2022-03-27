<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$getunrec = mysqli_query($conn, "SELECT * FROM supplies_unreceive");
	while($getunrecrow = mysqli_fetch_array($getunrec)){
		$getrec = mysqli_query($conn, "SELECT * FROM supplies_receive");
		while($getrecrow = mysqli_fetch_array($getrec)){
			if($getunrecrow['name_desc'] == $getrecrow['name_desc']){
				$getname = $getunrecrow['name_desc'];
				if($getrecrow['quantity'] == $getunrecrow['quantity']){
					mysqli_query($conn, "DELETE FROM supplies_unreceive WHERE name_desc = '$getname'");
					mysqli_query($conn, "UPDATE supplies_request SET req_status = 'Received' WHERE name_desc = '$getname'");
				}elseif($getrecrow['quantity'] < $getunrecrow['quantity']){
					$diff = $getunrecrow['quantity'] - $getrecrow['quantity'];
					mysqli_query($conn, "UPDATE supplies_unreceive SET quantity = '$diff' WHERE name_desc = '$getname'");
					mysqli_query($conn, "UPDATE supplies_request SET req_status = 'Partially Received' WHERE name_desc = '$getname'");
				}elseif($getrecrow['quantity'] > $getunrecrow['quantity']){
					mysqli_query($conn, "DELETE FROM supplies_unreceive WHERE name_desc = '$getname'");
					mysqli_query($conn, "UPDATE supplies_request SET req_status = 'Received' WHERE name_desc = '$getname'");
				}
			}
		}		
	}

	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Import fixed assets receiving to the system', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php");
?>