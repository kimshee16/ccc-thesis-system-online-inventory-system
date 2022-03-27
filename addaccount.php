<?php
include 'header3.php';

$err = "";
$suErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	$checkuserexist = mysqli_query($conn, "SELECT * FROM login WHERE uname = '$username'");
	$checkuserexistrow = mysqli_fetch_array($checkuserexist);

	if($checkuserexistrow['uname'] != ""){
		$err = "Username already exists!";
	}else{
		if($password1 != $password2){
		$suErr="Please repeat your password";
	}else{
		
		$sql = "INSERT INTO login (name, uname, pswd) VALUES ('$fullname', '$username', '$password1')";
		$result = $conn->query($sql);
		mysqli_close($conn);
		header("Location: dashboard.php?done=");
		}	
	}
}
?>
<br>
<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following to sign-up.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	<span style="color: red;"><?php echo $err; ?></span>
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	
	<div class="form-group">
	<div class="col-sm-6">
	<label for="fullname" class="control-label col-sm-8">Full name:</label>
	<input class="form-control" type="text" name="fullname" required autocomplete="off" placeholder="Full name" pattern="^[A-Za-z\s.]+$" title="Only letters are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<label for="date" class="control-label col-sm-8">Username:</label>
	<input class="form-control" type="text" name="username" required autocomplete="off" placeholder="Username"><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<label for="date" class="control-label col-sm-8">Password:</label>
	<input class="form-control" type="password" name="password1" required autocomplete="off" placeholder="Password">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<label for="date" class="control-label col-sm-8">Confirm Password:</label>
	<input class="form-control" type="password" name="password2" required autocomplete="off" placeholder="Confirm Password"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" value="Submit" class="btn btn-primary">
	</div>
	</div>

	
	</form>

	<span class="error" style="color: red;"><?php echo $suErr;?></span>
	

</div>
</body>
</html>