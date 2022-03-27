<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	

	$id = $_POST['id'];
	
	//$sql = "INSERT INTO personincharge (name, position, dept, username, idnum, password) VALUES ('$fullname', '$position', '$dept', '$username', '$idnum', '$password1')";
	//$result = mysqli_query($conn, $sql);
	$gettotalnum = mysqli_query($conn, "SELECT * FROM fixedassets WHERE id = '$id'");
	$gettotalnumrow = mysqli_fetch_array($gettotalnum);

	$qu = $gettotalnumrow['quantity'];
	$desc = $gettotalnumrow['description'];
	$st = $gettotalnumrow['status'];

	$x = 1;
	if($qu > 1){
		while($x <= $qu){
			//$barcode." ".$x = $_POST["barcode".$x.];
			

			$barcode = $_POST["barcode".$x];

			$location = $_POST["location".$x];

			$getpic = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$location'");

			$getpicrow = mysqli_fetch_array($getpic);

			$person = $getpicrow['personincharge'];

			$item = $gettotalnumrow['itemname'];

			$checkexist = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$barcode'");
			$checkexistrow = mysqli_fetch_array($checkexist);

			if(!empty($checkexistrow['id'])){
				$barcode = 0;
				mysqli_query($conn, "INSERT INTO fixedassets (barcode, itemname, description, quantity, location, personincharge, status) VALUES ('$barcode', '$item', '$desc', '1', '', '', '$st')");
			}else{
				mysqli_query($conn, "INSERT INTO fixedassets (barcode, itemname, description, quantity, location, personincharge, status) VALUES ('$barcode', '$item', '$desc', '1', '$location', '$person', '$st')");
				
				if($x == $qu){
					mysqli_query($conn, "DELETE FROM fixedassets WHERE id = '$id'");
					}

				
				}
					
			$x++;
			}	
	
	}elseif($qu == 1){
		$barcode = $_POST["barcode".$x];

			$location = $_POST["location".$x];

			$getpic = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$location'");

			$getpicrow = mysqli_fetch_array($getpic);

			$person = $getpicrow['personincharge'];

			$item = $gettotalnumrow['itemname'];

			$checkexist = mysqli_query($conn, "SELECT * FROM fixedassets WHERE barcode = '$barcode'");
			$checkexistrow = mysqli_fetch_array($checkexist);

			if(!empty($checkexistrow['id'])){
				$barcode = 0;
				mysqli_query($conn, "UPDATE fixedassets SET barcode = '$barcode', location = '', personincharge = '' WHERE id = '$id'");
			}else{
				echo "Ramirez";
				mysqli_query($conn, "UPDATE fixedassets SET barcode = '$barcode', location = '', personincharge = '' WHERE id = '$id'");
				
				}

	}
	$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Assign new info for new fixed asset', '$dn')");

	mysqli_close($conn);
	header("Location: dashboard.php?done=");
?>
