<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
		
	$datenow = date("Y-m-d h:i:s");
	$reqperson = $_SESSION['name'];

	if(isset($_POST["submit"]))
	{
		if($_FILES['file']['name'])
		{
			$filename = explode(".",$_FILES['file']['name']);
			if($filename[1] == 'csv')
			{
				$handle = fopen($_FILES['file']['tmp_name'], "r");
				$getlastid = mysqli_query($conn, "SELECT * FROM fixedassets_request");
				
				$csvarray = array();
				$x = 0;
				while($getlastidrow = mysqli_fetch_array($getlastid)){
				$csvarray[$x] = $getlastidrow['id'];
				$x++;
				}
				
				$i = 1;

				$lastid = end($csvarray) + $i;
				
				
				while(($data = fgetcsv($handle,100000,",")) !== FALSE){
						$item1 = mysqli_real_escape_string($conn, $data[0]);
						$item2 = mysqli_real_escape_string($conn, $data[1]);
						$item3 = mysqli_real_escape_string($conn, $data[2]);
						
						if($item1 == "Name" || $item2 == "Description" || $item3 == "Quantity"){
							$lastid++;	
						}else{
							$sql = "INSERT INTO fixedassets_request (id, name, description, quantity, requesting_date, requestor_name, req_status) VALUES ('$lastid', '$item1', '$item2', '$item3', '$datenow', '$reqperson', 'Pending')";
							mysqli_query($conn, $sql);
							$sql1 = "INSERT INTO fixedassets_unreceive (id, name, description, quantity, posting_date, person_to_receive) VALUES ('$lastid', '$item1', '$item2', '$item3', '$datenow', '$reqperson')";
							mysqli_query($conn, $sql1);
							$lastid++;
						}
						
						
				}
				fclose($handle);
			}
		}
	}
	
	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Import fixed asset request to the system', '$dn')");

	header("Location: dashboard.php");
?>