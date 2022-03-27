<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$getfixedunrec = mysqli_query($conn, "SELECT * FROM fixedassets_unreceive");

	while($getfixedunrecrow = mysqli_fetch_array($getfixedunrec)){
		
		$getfixedrec = mysqli_query($conn, "SELECT * FROM fixedassets_receive");
		
		while($getfixedrecrow = mysqli_fetch_array($getfixedrec)){
			if($getfixedunrecrow['name'] == $getfixedrecrow['name']){
				$getname = $getfixedrecrow['name'];
				
				if($getfixedrecrow['quantity'] == $getfixedunrecrow['quantity']){

					mysqli_query($conn, "DELETE FROM fixedassets_unreceive WHERE name = '$getname'");
					mysqli_query($conn, "UPDATE fixedassets_request SET req_status = 'Received' WHERE name = '$getname'");
				
				}elseif($getfixedrecrow['quantity'] < $getfixedunrecrow['quantity']){
					
					$diff = $getfixedunrecrow['quantity'] - $getfixedrecrow['quantity'];
					mysqli_query($conn, "UPDATE fixedassets_unreceive SET quantity = '$diff' WHERE name = '$getname'");
					mysqli_query($conn, "UPDATE fixedassets_request SET req_status = 'Partially Received' WHERE name = '$getname'");
				
				}elseif($getfixedrecrow['quantity'] > $getfixedunrecrow['quantity']){
					
					mysqli_query($conn, "DELETE FROM fixedassets_unreceive WHERE name = '$getname'");
					mysqli_query($conn, "UPDATE fixedassets_request SET req_status = 'Received' WHERE name = '$getname'");

				}
				
			}
		}		
	}

	mysqli_close($conn);
	header("Location: dashboard.php");
?>