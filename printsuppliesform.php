<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

/*
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST['id'];
	$barcode = $_POST['barcode'];
	$location = $_POST['location'];
	$person = $_POST['pic'];
	
	//$sql = "INSERT INTO personincharge (name, position, dept, username, idnum, password) VALUES ('$fullname', '$position', '$dept', '$username', '$idnum', '$password1')";
	//$result = mysqli_query($conn, $sql);
	
	mysqli_query($conn, "UPDATE fixedassets SET barcode = '$barcode' WHERE id = '$id'");
	mysqli_query($conn, "UPDATE fixedassets SET location = '$location' WHERE id = '$id'");
	mysqli_query($conn, "UPDATE fixedassets SET personincharge = '$person' WHERE id = '$id'");

	mysqli_close($conn);
	header("Location: dashboard.php");
	}
*/
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assetpics/favicon.png" type="image/x-icon">
<title>CCC Inventory Management System</title>
<style>
body {
	margin: -14px 0px;
	padding: 0px 0px;
	font-family: tahoma;
	background-image: url('assetpics/wm_bg.png');
	background-size: cover;
	font-size: 14px;
	}

.bodywrapper {
	width: 90%;
	height: 640px;
	background-color: #fff;
	position: relative;
	top: 20px;
	left: 75px;
	overflow: scroll;
	box-shadow: 0 15px 25px rgba(0,0,0,.5);
}

nav {
	position: relative;
	width: 100%;
	height: 100px;
	background-color: #616161;
	z-index: 2;
}

#logopic {
	position: relative;
	left: 15px;
	top: 3px;
}

#title {
	color: #fff;
	font-family: trajan pro;
	position: relative;
	left: 20px;
	font-size: 23px;
}

#title2 {
	color: #fff;
	font-family: trajan pro;
	position: relative;
	left: 50px;
}

input[type=text], input[type=password] {
	border: 1px solid #fcb60e;
	padding: 5px 2px;
}

input[type=submit] {
	background-color: #fd6d17;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 15px;
	transition: .3s;
}

input[type=submit]:hover {
	background-color: #fa7f36;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 15px;
}

#userint {
	position: relative;
	left: 650px;
	border: none;
	background: transparent;
	color: #fff
}

.tablink {
	margin: 0 0;
}

.tabcontent {
	margin-left: 10px;
	margin-right: 10px;
	margin-top: 10px;
	margin-bottom: 10px;
}

.usernav {
	position: relative;
	left: 1050px;
	top: -60px;
	background-color: #fae9a6;
	width: 12%;
}

#btable {
	width: 100%;
}

#btable, #btable th, #btable td {
	border: 1px solid black;
	border-collapse: collapse;
}

.bbutton {
	position: relative;
	left: 830px;
	text-decoration: none;
	background-color: #fa7f36;
	padding: 5px 10px;
	color: white;
	border-radius: 5px;
	transition: .3s;
}

.bbutton:hover {
	box-shadow: 0 2px 5px rgba(0,0,0,.5);
}

</style>
</head>

<body>

<div class="bodywrapper">
	<nav>
	<table>
	<tr>
		<td><img src="assetpics/CCCvector.png" id="logopic" width="90px" height="90px"></td><td><label id="title">City College of Calamba</label><br><label id="title2">Inventory Management System</label></td>
	</tr>
	</table>
	</nav>
	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b><a href="dashboard.php" class="bbutton">Back</a>
	<br><br>
	
	<form action="printborrow.php" method="POST">
	
	Type of Report: <select name="type">
	<option>Annual</option>
	<option>Monthly</option>
	</select>
	<br><br>
	Select Month: <select name="month">
	<option>January</option>
	<option>February</option>
	<option>March</option>
	<option>April</option>
	<option>May</option>
	<option>June</option>
	<option>July</option>
	<option>August</option>
	<option>September</option>
	<option>October</option>
	<option>November</option>
	<option>December</option>
	</select>

	<br><br>
	Select Year: <select name="year">
	<option>2019</option>
	<option>2020</option>
	<option>2021</option>
	<option>2022</option>
	<option>2023</option>
	<option>2024</option>
	<option>2025</option>
	<option>2026</option>
	<option>2027</option>
	<option>2028</option>
	<option>2029</option>
	<option>2030</option>
	<option>2031</option>
	<option>2032</option>
	<option>2033</option>
	<option>2034</option>
	<option>2035</option>
	<option>2036</option>
	<option>2037</option>
	<option>2038</option>
	<option>2039</option>
	<option>2040</option>
	<option>2041</option>
	<option>2042</option>
	<option>2043</option>
	<option>2044</option>
	<option>2045</option>
	<option>2046</option>
	<option>2047</option>
	<option>2048</option>
	<option>2049</option>
	<option>2050</option>
	</select>
	<br><br>
	<input type="submit" name="submit" value="Done">
	</form>
</div>

</div>
</body>
</html>