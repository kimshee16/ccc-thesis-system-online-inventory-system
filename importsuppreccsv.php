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
				$getlastid = mysqli_query($conn, "SELECT * FROM supplies_receive");
				
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
						/*
						$item4 = mysqli_real_escape_string($conn, $data[3]);
						$item5 = mysqli_real_escape_string($conn, $data[4]);
						$item6 = mysqli_real_escape_string($conn, $data[5]);
						$item7 = mysqli_real_escape_string($conn, $data[6]);
						$item8 = mysqli_real_escape_string($conn, $data[7]);
						*/
						if($item1 == "Name and Description" || $item2 == "Quantity" || $item3 == "Unit"){
							$lastid++;	
						}else{
							$getsupplist = mysqli_query($conn, "SELECT * FROM supplies WHERE name_desc = '$item1'");
							$getsupplistrow = mysqli_fetch_array($getsupplist);

							if($getsupplistrow['name_desc'] == ""){
								$insertnewsupp = mysqli_query($conn, "INSERT INTO supplies (name_desc, quantity, unit) VALUES ('$item1', '$item2', '$item3')");

								$sql = "INSERT INTO supplies_receive (id, name_desc, quantity, unit, receiving_date, receiver_name) VALUES ('$lastid', '$item1', '$item2', '$item3', '$datenow', '$reqperson')";
								mysqli_query($conn, $sql);

								$lastid++;
							}else{
								$q = $getsupplistrow['quantity'];
								$sum = $item2 + $q;
								$updatesupplies = mysqli_query($conn, "UPDATE supplies SET quantity = '$sum' WHERE name_desc = '$item1'");

								$sql = "INSERT INTO supplies_receive (id, name_desc, quantity, unit, receiving_date, receiver_name) VALUES ('$lastid', '$item1', '$item2', '$item3', '$datenow', '$reqperson')";
								mysqli_query($conn, $sql);

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

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Import supplies receiving to the system', '$dn')");

	header("Location: importreccheck.php");
?>