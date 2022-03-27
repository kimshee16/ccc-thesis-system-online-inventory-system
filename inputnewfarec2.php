<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];
	$date = date("Y-m-d");
	$name = $_SESSION['name'];

	$getquan = mysqli_query($conn, "SELECT * FROM fixedassets_unreceive WHERE name = '$item'");
	$getquanrow = mysqli_fetch_array($getquan);

	$reqquan = $getquanrow['quantity'];
	$reqdesc = $getquanrow['description'];

	if($quantity < $reqquan){

		$diff = $reqquan - $quantity;

		mysqli_query($conn, "UPDATE fixedassets_unreceive SET quantity = '$diff' WHERE name = '$item'");

		mysqli_query($conn, "INSERT INTO fixedassets_receive (name, description, quantity, receiving_date, receiver_name
		) VALUES ('$item', '$reqdesc', '$quantity', '$date', '$name')");

		mysqli_query($conn, "UPDATE fixedassets_request SET req_status = 'partially received' WHERE name='$item'");

		mysqli_query($conn, "INSERT INTO fixedassets (barcode, itemname, description, quantity, location, personincharge, status) VALUES ('0', '$item', '$reqdesc', '$quantity', '0', '0', 'functioning')");
		mysqli_close();
		$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
		mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Input new supplies', '$dn')");
		header("Location: dashboard.php?done=");


	}elseif($quantity > $reqquan){
		header("Location: inputnewfarec.php?inperr=Excess input entry upon request!");

	}else {
		mysqli_query($conn, "DELETE FROM `fixedassets_unreceive` WHERE `name` = '$item'");

		
		mysqli_query($conn, "INSERT INTO fixedassets_receive (name, description, quantity, receiving_date, receiver_name
) VALUES ('$item', '$reqdesc', '$quantity', '$date', '$name')");

		mysqli_query($conn, "UPDATE `fixedassets_request` SET `req_status` = 'received' WHERE name='$item'");

		mysqli_query($conn, "INSERT INTO fixedassets (barcode, itemname, description, quantity, location, personincharge, status) VALUES ('0', '$item', '$reqdesc', '$quantity', '0', '0', 'functioning')");
		$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
		mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Input new supplies', '$dn')");
		mysqli_close();
		header("Location: dashboard.php?done=");
		
	}




?>