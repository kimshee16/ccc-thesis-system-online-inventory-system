<?php
ob_start();
session_start();

date_default_timezone_set("Asia/Manila");

include 'inventoryconfig.php';
include 'barcode128.php';

if(!isset($_SESSION['name'])){
		header("Location: index.php");
	}

$dn = date("Y-m-d G:i:s");
	$sn = $_SESSION['name'];

	mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Generate barcode for fixed assets', '$dn')");

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
	top: 4px;
	left: 65px;
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

<?php
	$getpersons = mysqli_query($conn, "SELECT * FROM fixedassets");
?>

<div class="bodywrapper">
	<nav>
	<table>
	<tr>
		<td><img src="assetpics/CCCvector.png" id="logopic" width="90px" height="90px"></td><td><label id="title">City College of Calamba</label><br><label id="title2">Inventory Management System</label></td>
	</tr>
	</table>
	</nav>

	<p>&nbsp&nbsp&nbsp&nbsp<a href="#"  onclick="printContent('bccontain')">Print Barcode</a> <a href="dashboard.php?done=">Back to Dashboard</a> </p><br><br><br>

	<div id="bccontain">
	<br><br><br>
	<?php
	while($getpersonsrow = mysqli_fetch_array($getpersons)){
		echo "<center><div style='height: 15%; width: 60%;'>";
		echo bar128(stripcslashes($getpersonsrow['barcode']))."</div></center>";
	}	
	?>

	</div>

</body>
<script>
	function printContent(el){
		var restorepage = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restorepage;
	}
</script>
</html>

