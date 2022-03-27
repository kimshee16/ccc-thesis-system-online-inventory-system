<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}
	
$p_i_c = mysqli_query($conn, "SELECT * FROM `personincharge`");

?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="assetpics/CCCISICON3.png" type="image/x-icon">

<script src="jscss/jquery-3.1.1.min.js"></script>
<script src="jscss/Chart.min.js"></script>
<script src="jscss/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="jscss/bootstrap.min.css">


<title>CCC Inventory Management System</title>
<style>
body {
	margin: -14px 0px;
	padding: 0px 0px;
	/*
	font-family: tahoma;
	*/
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
	left: -15px;
	width: 102.5%;
	height: 100px;
	background-color: #6b6666;
	z-index: 2;
	margin: 0px 0px;
	padding: 0px 0px;
}

#logopic {
	position: relative;
	left: 15px;
	top: 3px;
}

@font-face {
	font-family: Lato;
	src: url('jscss/Lato/fonts/Lato-Regular.woff');
}

#title {
	color: #fff;
	font-family: Lato;
	position: relative;
	left: 20px;
	top: 10px;
	font-size: 30px;
}

#title2 {
	color: #fff;
	font-family: Lato;
	position: relative;
	left: 75px;
}

input[type=text], input[type=password] {
	border: 1px solid #fcb60e;
	padding: 5px 2px;
}

.submit {
	background-color: #fd6d17;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 10px;
	transition: .3s;
}

.submit:hover {
	background-color: #fa7f36;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 10px;
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



.bbutton {
	position: relative;
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

.cbutton {
	position: relative;
	text-decoration: none;
	background-color: #fa7f36;
	padding: 5px 10px;
	color: white;
	border-radius: 5px;
	transition: .3s;
}

.cbutton:hover {
	box-shadow: 0 2px 5px rgba(0,0,0,.5);
}

/*
.dropdown {
	display: inline-block;
}

.dropdown div {
	z-index: 1;
	visibility: hidden;
	position: absolute;
}

.dropdown:hover div {
	visibility: visible;
}

.dropdown div a:hover {
	background-color: #022c7a;
	color: #fff;
}

.dropdown div a {
	box-shadow: 0 4px 8px rgba(0,0,0,0.2);
	background-color: white;
	display: block;
	text-decoration: none;
	color: black;
	padding: 10px 15px;
	position: relative;
	left: 620px;
	transition: .3s;
}

*/

.supplyreceivingtable {
	width: 100%;
}

.supplyreceivingtable table tr {
	width: 100%;
	border: 1px solid black;
}

.textandbuttonRemove {
	display: none;
}

.receivingpanel {
	float: left;
    width: 50%;
    height: 375px;
    overflow: scroll;
    }

.unreceivingpanel {
	float: left;
    width: 50%;
    height: 375px;
    overflow: scroll;
    }

.row:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>

<body>


<div class="bodywrapper">
<div class="container-fluid">

	<nav>
	<table>
	<tr>
		<td><a href='dashboard.php?done='><img src="assetpics/CCCISICON2.png" id="logopic" width="90px" height="90px"></a></td><td><label id="title">City College of Calamba</label><br><label id="title2">Inventory Management System</label></td>
		<td width="600px"></td>


		<!--
		<td><div class="dropdown">
		<button id="userint">
		
		<table>
			<tr>
				<td><img src="assetpics/usericon.png" width="35px" height="35px"></td> 
				<td>
					<?php 
						$rawname = $_SESSION['name'];
						$nameexplode = explode(' ', $rawname);
						echo "Hi ".$nameexplode[0]."!";
					?>
				</td>
			</tr>
		</table>
		</button>
		-->
		<td>
		<div class="dropdown">
			<button class="btn btn dropdown-toggle" type="button" data-toggle="dropdown">
				<img src="assetpics/usericon.png" width="35px" height="35px">
				<?php 
						$rawname = $_SESSION['name'];
						$nameexplode = explode(' ', $rawname);
						echo "Hi ".$nameexplode[0]."!";
				?>&nbsp&nbsp
				<span class="caret"></span>
			</button>
			
			<ul class="dropdown-menu">
				<li><a href="addaccount.php">Add Manage Account</a></li>
				<li><a href="requester_signup.php">Add Requester Account</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
				<li><a href="activitylog.php">Activity Log</a></li>
				<li><a href="setinventorydate.php">Day Settings</a></li>
				<li><a href="setpersons.php">Set Person-in-charges</a></li>
				<li><a href="userlogout.php">Sign out</a></li>
			</ul>
		</div>

		</td>
		<!--
		<div>
			<a href="addaccount.php">Add Manage Account</a>
			<a href="requester_signup.php">Add Requester Account</a>
			<a href="changepassword.php">Change Password</a>
			<a href="activitylog.php">Activity Log</a>
			<a href="setinventorydate.php">Day Settings</a>
			<a href="setpersons.php">Set Person-in-charges</a>
			<a href="userlogout.php">Sign out</a>
		</div>
		</div>
	-->
		</td>
	</tr>
	</table>
	</nav>
	