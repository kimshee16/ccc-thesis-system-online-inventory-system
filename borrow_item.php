<?php
ob_start();
session_start();

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}
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
	background-color: #022c7a;
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
	<b>Please fill-up the following to borrow item.</b><a href="dashboard.php" class="bbutton">Back</a>
	<br><br>
	
	<form action="confirm_id_barcode.php" method="POST">
		Item to be borrowed: <select name="itemborrowed">
		<option>Projector</option>
		<option>Chairs</option>
		<option>Tables</option>
		</select>
	<br><br>
	Quantity: <input type="text" name="quantity" required autocomplete="off">
	<br><br>
	Reason: <input type="text" name="quantity" required autocomplete="off">
	<br><br>
	<button>Done</button>
	</form>


</script>

</body>
</html>