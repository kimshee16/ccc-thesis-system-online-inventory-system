<?php
include 'header3.php';

$suErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$fullname = $_POST['fullname'];
	$position = $_POST['position'];
	$username = $_POST['username'];
	$dept = $_POST['dept'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$idnum = $_POST['idnum'];
	$email = $_POST['email'];
	$cpnum = $_POST['cpnum'];

	if($password1 != $password2){
		$suErr="Please repeat your password";
	}else{
		
		$sql = "INSERT INTO personincharge (name, position, dept, username, idnum, password, email, cpnum) VALUES ('$fullname', '$position', '$dept', '$username', '$idnum', '$password1', '$email', '$cpnum')";
		$result = mysqli_query($conn, $sql);
		mysqli_close($conn);
		header("Location: dashboard.php?done=");
	}
}
?>
	<br>

	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following to sign-up.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">

	<div class="form-group">
	<div class="col-sm-3">
	<label for="fullname" class="control-label col-sm-8">Full name:</label>
	<input class="form-control" type="text" name="fullname" required autocomplete="off" placeholder="Full name" pattern="^[A-Za-z\s.]+$" title="Only letters are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="position" class="control-label col-sm-8">Position:</label>
	<select name="position" class="form-control">
	<option>Director</option>
	<option>Professor</option>
	<option>Staff</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="dept" class="control-label col-sm-8">Department:</label>
	<select name="dept" class="form-control">
	<option>CCC Staff</option>
	<option>DASTE</option>
	<option>DBE</option>
	<option>DCE</option>
	<option>Faculty Office</option>
	<option>Guidance's Office</option>
	<option>Library</option>
	<option>OSA</option>
	<option>Registrar's Office</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="idnum" class="control-label col-sm-8">ID num:</label>
	<input class="form-control" type="text" name="idnum" required autocomplete="off" placeholder="ID Number" pattern="^[0-9\-]+$" title="Only numbers are allowed."><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="email" class="control-label col-sm-8">Email:</label>
	<input class="form-control" type="text" name="email" required autocomplete="off" placeholder="E-mail" pattern="^.+@.+\..+" title="Please insert proper email address.">
	</div>
	</div>



	<div class="form-group">
	<div class="col-sm-3">
	<label for="cpnum" class="control-label col-sm-8">Phone number:</label>
	<input class="form-control" type="text" name="cpnum" required autocomplete="off" placeholder="Phone number" pattern="^[0-9]+$" title="Only numbers are allowed.">
	</div>
	</div>
	
	<div class="form-group">
	<div class="col-sm-3">
	<label for="username" class="control-label col-sm-8">Username</label>
	<input class="form-control" type="text" name="username" required autocomplete="off" placeholder="Username">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="password1" class="control-label col-sm-8">Password:</label>
	<input class="form-control" type="password" name="password1" required autocomplete="off" placeholder="Password"><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="password2" class="control-label col-sm-8">Confirm Password:</label>
	<input class="form-control" type="password" name="password2" required autocomplete="off" placeholder=" Confirm Password">
	</div>
	</div>

	
	
	<div class="form-group">
	<div class="col-sm-2">
	<br><input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>

	</form>

<span class="error" style="color: red;"><?php echo $suErr;?></span><br>
</div>

</body>
</html>