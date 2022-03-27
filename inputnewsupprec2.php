s<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	
	$item = $_POST['item'];
	$location = $_POST['location'];
	$barcode = $_POST['barcode'];
	$batchnum = $_POST['batchnum'];
	$quantity = $_POST['quantity'];
	$date = date("Y-m-d");
	$name = $_SESSION['name'];
	$class = $_POST['class'];

	$getquan = mysqli_query($conn, "SELECT * FROM supplies_unreceive WHERE name_desc = '$item'");
	$getquanrow = mysqli_fetch_array($getquan);

	$reqquan = $getquanrow['quantity'];
	$requnit = $getquanrow['unit'];


	$checkbatchnum = mysqli_query($conn, "SELECT * FROM supplies WHERE name_desc = '$item' AND batchnumber = '$batchnum'");

	$checkbatchnumrow = mysqli_fetch_array($checkbatchnum);

	if(!empty($checkbatchnumrow['id'])){

		header("LOcation: inputnewsupprec.php?err=There is existing batch number for the specific item.");	
	
	}else{
		echo $checkbatchnumrow['id']." ".$checkbatchnumrow['name_desc'];
		
		if($quantity < $reqquan){

		
		$diff = $reqquan - $quantity;

		mysqli_query($conn, "UPDATE supplies_unreceive SET quantity = '$diff' WHERE name_desc = '$item'");

		mysqli_query($conn, "INSERT INTO supplies_receive (name_desc, quantity, unit, receiving_date, receiver_name
		) VALUES ('$item', '$quantity', '$requnit', '$date', '$name')");

		mysqli_query($conn, "UPDATE supplies_request SET req_status = 'partially received' WHERE name_desc = '$item'");

		mysqli_query($conn, "INSERT INTO supplies (name_desc, classification, unit, quantity, itemcode, batchnumber, location, receivingperson, receivingdate
) VALUES ('$item', '$class', '$requnit', '$quantity', '$barcode', '$batchnum', 'VPA', '$name', '$date')");
		


	}else {
		mysqli_query($conn, "DELETE FROM `supplies_unreceive` WHERE `name_desc` = '$item'");

		
		mysqli_query($conn, "INSERT INTO supplies_receive (name_desc, quantity, unit, receiving_date, receiver_name
) VALUES ('$item', '$quantity', '$requnit', '$date', '$name')");

		mysqli_query($conn, "UPDATE `supplies_request` SET `req_status` = 'received' WHERE name_desc = '$item'");

		mysqli_query($conn, "INSERT INTO supplies (name_desc, classification, unit, quantity, itemcode, batchnumber, location, receivingperson, receivingdate) VALUES ('$item', '$class', '$requnit', '$quantity', '$barcode', '$batchnum', 'VPA', '$name', '$date')");
		
		}
	

	mysqli_close();
	header("Location: dashboard.php?done=");
	}


?>