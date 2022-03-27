<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}
	

?>

<!DOCTYPE html>
<html>
<head>

<script src="jscss/jquery-3.1.1.min.js"></script>
<script src="jscss/Chart.min.js"></script>
<script src="jscss/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="jscss/bootstrap.min.css">

<link rel="shortcut icon" href="assetpics/CCCISICON3.png" type="image/x-icon">
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
	width: 106%;
	height: 640px;
	background-color: #fff;
	position: relative;
	top: 20px;
	left: -25px;
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
	padding: 5px 2px;
}

input[type=submit] {
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 15px;
	transition: .3s;
}

input[type=submit]:hover {
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

/*
.tablink {
	margin: 0 0;
	background-color: #ffffff;
	padding: 5px 10px;
	color: black;
	border-radius: 5px;
	transition: .3s;
}

.tablink:hover {
	box-shadow: 0 2px 5px rgba(0,0,0,.5);
}
*/

.tablink {

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

/*
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

*/

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

#disptable tr th, #disptable tr td{
	border: 1px solid black; 
	border-collapse: collapse;
}

.ok {
	background-color: #fd6d17;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 5px 10px;
	transition: .3s;
	text-decoration: none;
}

.textandbuttonRemove {
	display: none;
}
</style>
</head>

<body>

<div class="container">
<div class="bodywrapper">
	<nav>
	<table>
	<tr>
		<td><a href='requesterboard.php?done='><img src="assetpics/CCCISICON2.png" id="logopic" width="90px" height="90px"></a></td><td><label id="title">City College of Calamba</label><br><label id="title2">Inventory Management System</label></td>
		<td width="595px"></td>

		<td>

		<!--
		<div class="dropdown"><button id="userint"><table><tr><td><img src="assetpics/usericon.png" width="35px" height="35px"></td> 
		<td>
		<?php 
			$rawname = $_SESSION['name'];
			$nameexplode = explode(' ', $rawname);
			echo "Hi ".$nameexplode[0]."!";
		?></td></tr></table></button>
		
		<div>
			<a href="changepasswordreq.php">Change Password</a>
			<a href="userlogout.php">Sign out</a>
		</div>
		</div>
		-->
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
				<li><a href="requeststatus.php">Request Status</a></li>
				<li><a href="notifications.php">Notifications</a></li>
				<li><a href="changepasswordreq.php">Change Password</a></li>
				<li><a href="userlogout.php">Sign out</a></li>
			</ul>
		</div>

		</td>
	</tr>
	</table>
	</nav>