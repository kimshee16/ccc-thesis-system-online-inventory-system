<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
body, html {
	margin: -10px 0px;
	padding: 0px 0px;
	font-family: Arial, Helvetica, sans-serif;
	background-color: #adb6fd;
}


.fill-up-form {
	padding-top: 10px;
	padding-left: 10px;
	height: 464px;
	width: 100%;
}

.guide_tab {
	background-color: black;
	padding-top: 110px;
	padding-bottom: 10px;
	padding-left: 5px;
	width: 100%;
	z-index: -1;
}

nav {
	background-color: #6487e1;
	padding: 10px 10px;
	height: 80px;
	width: 100%;
	position: fixed;
}


.logo {
	margin-top: 3px;
	margin-right: 4px;
	padding-top: 10px;
	float: left;
}

.sys_name {
	float: left;
}

.account_but {
	float: right;
	margin-right: 20px;
	margin-top: 12px;
}

.acc_pic {
	width: 20px;
	height: 20px;
}

.dropdown .dropdown_acc {
	background-color: DodgerBlue;
    color: white;
    padding: 14px 20px;
    margin: 8px 5px;
    border: none;
    cursor: pointer;
	text-shadow: 0 3px 10px black;
	border-radius: 10px;
	box-shadow: 0 3px 10px black;
	width: 100%;
}

.dropdown:hover .dropdown_acc {
	background-color: blue;
}

.dropdown-content {
	display: none;
	position: center;
	background-color: #8acffa;
	min-width: 320px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0,2);
	z-index: 1;
	border-radius: 10px;
	width: 50%;
}

.dropdown-content a {
	float: none;
	color: black;
	padding: 10px 10px;
	text-decoration: none;
	display: block;
	text-align: left;
	font-size:14px;
	transition: 0.3s;
}

.dropdown-content a:hover {
	background-color: blue;
	color: white;
	border-radius: 10px;
}

.dropdown:hover .dropdown-content {
	display: block;
}

.row:after {
    content: "";
    display: table;
    clear: both;
}

.footer {
	background-color: black;
	color: white;
	margin: 0px 0px;
	padding: 10px;
	position: fixed;
	width: 100%;
	font-size: 10px;
}

</style>
</head>
<body>

<nav>
<div class="row">
	<div class="logo">
		<img src="CCCvector.png" width="78px" height="75px">
	</div>
	<div class="sys_name">
		<br><h1 style="font-size: 50px; font-family: American Captain; text-shadow: 2px 2px 5px black; margin: 0px; padding: 0 0; color: white; text-border: 0.5px solid black;">City College of Calamba Inventory System</h1>
	</div>
	<div class="account_but">
		<div class="dropdown">
		<button class="dropdown_acc"><?php echo "admin";?></button>
			<div class="dropdown-content">
			<a href="#">Add Admin Account</a>
			<a href="#">Change Password</a>
			<a href="#">Log-out</a>
			</div>
		</div>
	</div>
</div>
</nav>

<div class="guide_tab">
<a href="dashboard.php" style="text-decoration: none; padding: 4px 4px; border-radius: 5px; border: 1px solid white; color: white;">Home</a>
</div>

<div class="fill-up-form">
<center><h2 style="margin: 0px 0px;">BORROW EQUIPMENT REQUEST</h2></center>
<h3>Please fill-up the following.</h3>
<form action="#" method="POST">
Name: <select>
<option>Arwie Fernando</option>
<option>Neil Aligam</option>
<option>Helen Almoro</option>
<option>Arlou Fernando</option>
<option>Mary Rose Montano</option>
<option>Marilyn Garma</option>
</select>
<br><br>
Equipment to be borrowed: <select>
<option>LCD Projector</option>
<option>Monobloc Chairs</option>
<option>Hammer</option>
<option>Saw</option>
<option>Screw Drivers</option>
<option>Ladder</option>
</select>
<br><br>
Quantity: <input type="text" name="quantity" autocomplete="off" required>
<br><br>
Reason: <input type="text" name="reason" autocomplete="off" required>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>

<br>
<div class="footer">
	<center>Copyright@2019 | All rights reserved. City College of Calamba Inventory System.</center>
</div>
		
</body>
</html>