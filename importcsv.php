<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
		
	if(isset($_POST["submit"]))
	{
		if($_FILES['file']['name'])
		{
			$filename = explode(".",$_FILES['file']['name']);
			if($filename[1] == 'csv')
			{
				$handle = fopen($_FILES['file']['tmp_name'], "r");
				$getlastid = mysqli_query($conn, "SELECT * FROM physical_inventory");
				
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
						$item4 = mysqli_real_escape_string($conn, $data[3]);
						$item5 = mysqli_real_escape_string($conn, $data[4]);
						if($item1 == "Barcode" || $item2 == "Quantity" || $item3 == "Location" || $item4 == "Person-in-Charge" || $item5 == "Status"){
							$lastid++;	
						}else{
							$date_inv = date("Y-m-d");

							$getnamedesc = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$item1'");

							$getnamedescrow = mysqli_fetch_array($getnamedesc);

							$finname = $getnamedescrow['itemname'];
							$findesc = $getnamedescrow['description'];

							$getperson = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$item3'");

							$getpersonrow = mysqli_fetch_array($getperson);

							$finperson = $getpersonrow['personincharge'];							


							//To check if there will be double entry which must be avoided
							$checkdouble = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE barcode = '$item1' AND location = '$item3' AND inventorydate = '$date_inv'");
							$checkdoublerow = mysqli_fetch_array($checkdouble);

							if(empty($checkdoublerow)){
								$sql = "INSERT INTO physical_inventory (id, barcode, name, description, quantity, location, personincharge, status, inventorydate) VALUES ('$lastid', '$item1', '$finname', '$findesc', '$item2', '$item3', '$finperson', '$item5', '$date_inv')";
								mysqli_query($conn, $sql);
								$lastid++;	
							}else{
								$lastid++;
							}

						}
						
						
				}
				fclose($handle);
			}
		}
	}

	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Import Physical Inventory CSV Files', '$dn')");
	
	header("Location: dashboard.php?done=");
?>