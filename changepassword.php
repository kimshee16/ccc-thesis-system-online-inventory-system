<?php
include 'header3.php';

$incPass = "";
$errPass = "";	

if($_SERVER["REQUEST_METHOD"] == "POST"){		
	
	$fullname = $_SESSION['name'];
	$current = $_POST['current'];
	$password1 = $_POST['new'];
	$password2 = $_POST['confirm'];
	
	$check = mysqli_query($conn, "SELECT * FROM login WHERE name='$fullname' AND pswd='$current'");
	$crow = mysqli_fetch_array($check);
	
	if($crow['pswd'] == ""){
		$incPass="Incorrect current password!";
	}else{
		if($password1 != $password2){
			$errPass="Password not matched!";
		}else{
			$change = mysqli_query($conn, "UPDATE `login` SET pswd='$password1' WHERE name='$fullname' AND pswd='$current'");
			$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
			mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Change Password - Admin', '$dn')");
			header("Location: dashboard.php?done=");
		}
	}
	mysqli_close($conn);

	
}
?>
	<br>
	<div class="container">	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following to change your password.</b> <a href="dashboard.php?done=">Back to Dashboard</a> <span style="color: red;"><?php echo $incPass;?></span><span style="color: red;"><?php echo $errPass;?></span>
	<br><br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	
	<div class="form-group">
	<div class="col-sm-3">
	<label for="current" class="control-label col-sm-8">Password:</label>
	<input class="form-control" type="password" name="current" required autocomplete="off" placeholder="Current Password">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="new" class="control-label col-sm-8">New Password:</label>
	<input class="form-control" type="password" name="new" required autocomplete="off" placeholder="New Password">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="confirm" class="control-label col-sm-8">Confirm Password:</label>
	<input class="form-control" type="password" name="confirm" required autocomplete="off" placeholder="Confirm Password"><br>
	</div>
	</div>


	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>
	
	</form>


</div>

</body>
</html>