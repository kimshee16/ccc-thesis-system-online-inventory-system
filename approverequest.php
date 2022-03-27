<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	if(date("l") == "Saturday" || date("l") == "Sunday"){
		header("Location: dashboard.php?dayerr=Approval within weekends is strictly prohibited!&done=");
	}else{
		if(date("G:i") >= "8:00" || date("G:i") <= "17:00"){
			$getresday = mysqli_query($conn, "SELECT * FROM reserveday");
			$getresdayrow = mysqli_fetch_array($getresday);

			$resday = $getresdayrow['numday'];

			$id = $_GET['id'];
			$dateapprove = date('Y-m-d G:i:s');
			$approvedby = $_SESSION['name'];

			$dtbclaim = date_create($dateapprove);
			date_modify($dtbclaim,"+".$resday."days");
			$dtbclaim2 = date_format($dtbclaim,"Y-m-d G:i:s");

			$sql = "UPDATE borrowitem SET b_status='1', dateapproved='$dateapprove', approvedby='$approvedby', datetobeclaimed='$dtbclaim2' WHERE id = ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: dashboard.php?done=");
			}else{
				mysqli_stmt_bind_param($stmt, "i", $id);
				mysqli_stmt_execute($stmt);
			}
			mysqli_close($conn);
			header("Location: notifier.php?id=".$id);
			/*
			}else{
				echo date("h:i:s")."<br>";
				echo "Approval beyond office hours is strictly prohibited!";
				header("Location: dashboard.php?hourerr=Approval beyond office hours is strictly prohibited!");
			}
			*/	
		}else{
			echo date("h:i:s")."<br>";
			echo "Approval beyond office hours is strictly prohibited!";
			header("Location: dashboard.php?hourerr=Approval beyond office hours is strictly prohibited!&done=");
		}
		
	}

	$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Approve equipment borrow request', '$dn')");
?>