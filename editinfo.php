<?php
	include 'header3.php';

	$id = $_GET['id'];

	$getinfo = mysqli_query($conn, "SELECT * FROM personincharge WHERE id = '$id'");
	$getinforow = mysqli_fetch_array($getinfo);

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$cpnum = $_POST['cpnum'];

		mysqli_query($conn, "UPDATE personincharge SET `name` = '$name', `username` = '$username', `password` = '$password', `email` = '$email', `cpnum` = '$cpnum' WHERE `id` = '$id'");
		mysqli_close($conn);

		$dn = date("Y-m-d G:i:s");
		$sn = $_SESSION['name'];
		mysqli_query($conn, "INSERT INTO activitylog (personincharge, activity, datetime) VALUES ('$sn', 'Edit information of ".$name."', '$dn')");
		
		header("LOcation: dashboard.php?done=");

	}

?>
<br>
<div class="container">
<b>Information shown below are editable.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
<form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$getinforow['id']; ?>" method="POST">
	
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="name" class="control-label col-sm-14">Requester name:</label>
	<input class="form-control" type="text" name="name" required autocomplete="off" value="<?php echo $getinforow['name']; ?>"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="username" class="control-label col-sm-8">Username:</label>
	<input class="form-control" type="text" name="username" required autocomplete="off" value="<?php echo $getinforow['username']; ?>"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="password" class="control-label col-sm-8">Password:</label>
	<input class="form-control" type="text" name="password" required autocomplete="off" value="<?php echo $getinforow['password']; ?>"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="email" class="control-label col-sm-14">E-mail address:</label>
	<input class="form-control" type="text" name="email" required autocomplete="off" value="<?php echo $getinforow['email']; ?>"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="cpnum" class="control-label col-sm-14">Phone number:</label>
	<input class="form-control" type="text" name="cpnum" required autocomplete="off" value="<?php echo $getinforow['cpnum']; ?>"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<input type="submit" value="Edit" class="btn btn-primary">
	</div>
	</div>

</form>	

</div>
</body>
</html>