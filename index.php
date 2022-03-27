<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");


	$now = date("Y-m-d");

	$loginErr2 = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		include 'inventoryconfig.php';

		$getdate = mysqli_query($conn, "SELECT * FROM inventorydate WHERE date='$now'");
		$getdaterow = mysqli_fetch_array($getdate);

		$type = $_POST['type'];
		if($type == "Admin"){

			if(empty($getdaterow)){

				$username = $_POST['username'];
				$pswd = $_POST['pswd'];

				$sql = "SELECT * FROM login WHERE uname='$username' AND pswd='$pswd'";
				$result = $conn->query($sql);

				if(!$row = $result->fetch_assoc()){
					$loginErr2 = "Incorrect username or password!";
				}else{
					$_SESSION['name'] = $row['name'];
					$dn = date("Y-m-d G:i:s");
					$sn = $_SESSION['name'];

					mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Login - Admin', '$dn')");
					
					header("Location: dashboard.php?done=");
				}

			}else{
				$loginErr2 = "System is temporarity off due to inventory day. Sorry.";
			}

		}elseif($type == "Requester"){
			
			if(empty($getdaterow)){
				
				$username = $_POST['username'];
				$pswd = $_POST['pswd'];

				$sql = "SELECT * FROM personincharge WHERE username='$username' AND password='$pswd'";
				$result = mysqli_query($conn, $sql);

				if(!$row = mysqli_fetch_array($result)){
					$loginErr2 = "Incorrect username or password!";
				}else{
					if($row['position'] == "Director"){
						$_SESSION['name'] = $row['name'];
						$dn = date("Y-m-d G:i:s");
						$sn = $_SESSION['name'];
						mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Login - Director', '$dn')");
						header("Location: directorboard.php?done=");						
					}else{
						$_SESSION['name'] = $row['name'];
						$dn = date("Y-m-d G:i:s");
						$sn = $_SESSION['name'];
						mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Login - Requester', '$dn')");
						header("Location: requesterboard.php?done=");	
					}
				}
				
			}else{
				$loginErr2 = "System is temporarity off due to inventory day. Sorry.";
			}

		}

		mysqli_close($conn);
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="assetpics/CCCISICON3.png" type="image/x-icon">
<script src="jscss/jquery-3.1.1.min.js"></script>
<script src="jscss/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="jscss/bootstrap.min.css">
<title>CCC Inventory Management System</title>
<style>
body {
	margin: -14px 0px;
	padding: 0px 0px;
	background-image: url('assetpics/wm_bg.png');
	background-size: cover;
	font-size: 14px;
	}

.logwrapper {
	width: 43%;
	height: 380px;
	background-color: #fff;
	position: relative;
	top: 170px;
	left: 305px;
	box-shadow: 0 15px 25px rgba(0,0,0,.5);
}

nav {
	width: 100%;
	height: 100px;
	background-color: #616161;
}

#logopic {
	position: relative;
	left: 15px;
	top: 5px;
}

@font-face {
	font-family: Lato;
	src: url('jscss/Lato/fonts/Lato-Regular.woff');
}

#title {
	color: #fff;
	font-family: Lato;
	position: relative;
	left: 28px;
	top: 14px;
	font-size: 30px;
}

#title2 {
	color: #fff;
	font-family: Lato;
	position: relative;
	left: 95px;
}

input[type=text],input[type=password] {
	border: 1px solid #6f6e6d;
}

select, option {
	border: 2px solid black;
}

.form-control {
	border: 1px solid #6f6e6d;
}

/*
input[type=submit] {
	background-color: #fd6d17;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 15px;
	transition: .3s;
}
*/

/*
input[type=submit]:hover {
	background-color: #fa7f36;
	border: none;
	border-radius: 3px;
	color: white;
	padding: 10px 15px;
}
*/

.form-horizontal {
	position: relative;
	left: 130px;
}

@media (max-width: 490px) {
	body, html {width: 100%;}
	nav {width: ; height: ;}

	.logwrapper {
		width: 100%;
		height: 380px;
		background-color: #fff;
		position: relative;
		top: 70px;
		left: 0px;
		box-shadow: 0 15px 25px rgba(0,0,0,.5);
		}

	.logopic {
		width: 60px;
		height: 60px;
		}
	
	nav {
		width: 100%;
		height: 70px;
		background-color: #616161;
		}

	#title {
		color: #fff;
		font-family: Lato;
		position: relative;
		left: 18px;
		top: 14px;
		font-size: 15px;
		}

	#title2 {
		color: #fff;
		font-family: Lato;
		position: relative;
		left: 27px;
		font-size: 10px;
		}

	.form-horizontal {
		position: relative;
		left: 10px;
		top: 20px;
	}

	.form-control {
		width: 80%;
	}

	}

</style>
</head>
<body>
<div class="container">
<div class="logwrapper">
	<nav>
	<table>
	<tr>
		<td><img class="logopic" src="assetpics/CCCISICON2.png" id="logopic" width="90px" height="90px"></td><td><label id="title">City College of Calamba</label><br><label id="title2">Inventory Management System</label></td>
	</tr>
	</table>
	</nav>

	<center><span class="error" style="color: red;"><?php echo $loginErr2;?></span></center>
	
		<form class="form-horizontal" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
			
			<!--
			<div class="form-group">
			<div class="col-sm-6"> 
			<label for="date" class="control-label col-sm-4">Current Password:</label>
			<input class="form-control" type="password" name="current" required autocomplete="off" placeholder="Current Password">
			</div>
			</div>
			-->
			<div class="form-group">
			<div class="col-xs-6">
			<label for="type" class="control-label col-sm-10">Account Type:</label>
			<select class="form-control" name="type">
			<option>Admin</option>
			<option>Requester</option>
			</select>
			</div>
			</div>
<br>
			<div class="form-group">
			<div class="col-sm-6"> 
			<input class="form-control" type="text" name="username" autocomplete="off" placeholder="Username" required>
			</div>
			</div>

			<div class="form-group">
			<div class="col-sm-6"> 
			<input class="form-control" type="password" name="pswd" placeholder="Password" required> 
			</div>
			</div>
			


			<label for="type" class="control-label col-sm-4"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-md"></label>
		</form>
	
</div>
</div>

</body>
</html>


<!--
<nav>
<div class="row">
	<div class="logo">
		<img src="CCCvector.png" width="78px" height="75px">
	</div>
	<div class="sys_name">
		<br><h1 style="font-size: 30px; font-family: Trajan Pro; text-shadow: 2px 2px 5px black; margin: 0px; padding: 0 0; margin: 0 0; color: white; text-border: 0.5px solid black;">City College of Calamba</h1><h1 style="font-size: 20px; font-family: Trajan Pro; text-shadow: 2px 2px 5px black; margin: 0px; padding: 0 0; margin: 0 0; color: white; text-border: 0.5px solid black;">Inventory Management System</h1>
	</div>
	<div class="login_button">
	<button class="btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
	</div>
</div>
</nav>
-->



<!--
<div id="id01" class="modal">
  <br><br><br><br><br><br><br>
  <form class="modal-content animate" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="CCC3D.png"class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" autocomplete="off" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pswd" required>
        
      <input class="button" type="submit" value="Login">
     
    </div>
  </form>
</div>
<br><br><br><br><br>
-->
<!--
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="C1.jpeg" style="width:1000px; height: 500px;">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="C2.jpeg" style="width:1000px; height: 500px;">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="C3.jpeg" style="width:1000px; height: 500px;">
</div>

</div>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
-->


<!--
<div class="footer">
	<center>Copyright@2019 | All rights reserved. City College of Calamba Inventory Management System.</center>
</div>
-->


<script>






/*

var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000);
}

*/

</script>


