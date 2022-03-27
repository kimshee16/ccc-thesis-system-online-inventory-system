<!--
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
	left: 730px;
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
-->

<?php

include 'header2.php';

	$incPass = "";
	$errPass = "";	

	if($_SERVER["REQUEST_METHOD"] == "POST"){		
		
		$fullname = $_SESSION['name'];
		$current = $_POST['current'];
		$password1 = $_POST['new'];
		$password2 = $_POST['confirm'];
		
		$check = mysqli_query($conn, "SELECT * FROM personincharge WHERE name='$fullname' AND password='$current'");
		$crow = mysqli_fetch_array($check);
		
		if($crow['password'] == ""){
			$incPass="Incorrect current password!";
		}else{
			if($password1 != $password2){
				$errPass="Password not matched!";
			}else{
				$change = mysqli_query($conn, "UPDATE `personincharge` SET password='$password1' WHERE name='$fullname' AND password='$current'");
				$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
				mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Change Password - Requester/Director', '$dn')");
				header("Location: requesterboard.php?done=");
			}
		}
		mysqli_close($conn);

	}

?>
<div class="container">
<br>
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following to change your password.</b> <a href="requesterboard.php?done=" class="bbutton">Back to dashboard</a>
	&nbsp&nbsp<span style="color: red;"><?php echo $errPass;?></span><span style="color: red;"><?php echo $incPass;?></span>
	<br><br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	 
	
	<div class="form-group">
	<div class="col-sm-6"> 
	<label for="date" class="control-label col-sm-4">Current Password:</label>
	<input class="form-control" type="password" name="current" required autocomplete="off" placeholder="Current Password">
	</div>
	</div>
	
	

	<div class="form-group">
	<div class="col-sm-3">
	<label for="date" class="control-label col-sm-10">New Password:</label>
	<input class="form-control" type="password" name="new" required autocomplete="off" placeholder=" New Password">
	</div>
	</div>
	
	

	<div class="form-group">
	<div class="col-sm-3">
	<label for="date" class="control-label col-sm-10">Confirm Password:</label>
	<input class="form-control" type="password" name="confirm" required autocomplete="off" placeholder=" Confirm Password"><br><br>
	</div>
	</div>
	
	<div class="form-group">
	<div class="col-sm-3">
	<input type="submit" value="Submit" class="btn btn-primary">
	</div>
	</div>

	</form><br><br>
	

</div>

</body>
</html>