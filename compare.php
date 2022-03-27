<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	//Check if already have  remarks

	$getinventory = mysqli_query($conn, "SELECT * FROM physical_inventory");

	while($getinventoryrow = mysqli_fetch_array($getinventory)){

		if(empty($getinventoryget['remarks'])){
			
			
				$id = $getinventoryrow['id'];
				$code = $getinventoryrow['barcode'];
				$name = $getinventoryrow['name'];
				$location = $getinventoryrow['location'];
				$status = $getinventoryrow['status'];

				//echo $id." ".$code." ".$name." ".$location." ".$status."<br>";

				
				
				$checkexist = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$code' AND itemname = '$name' AND location = '$location'");
				$checkexistrow = mysqli_fetch_array($checkexist);

					

				if($checkexistrow['barcode'] != ""){
						$string = "existing at ".$location;
						mysqli_query($conn, "UPDATE physical_inventory SET remarks = '$string' WHERE id = '$id'");

					}else{
						$string = "missing at ".$location;
						mysqli_query($conn, "UPDATE physical_inventory SET remarks = '$string' WHERE id = '$id'");

					}
		
		}

	}

$sn = $_SESSION['name'];
		$dn = date("Y-m-d");
		mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Compare Physical Inventory to Fixed Assets list', '$dn')");
		header("Location: dashboard.php?done=");
	
    
?>