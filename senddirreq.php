<?php
	
	include 'header2.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];
	$daterequested = date('Y-m-d');
	$name = $_SESSION['name'];
	$purpose = $_POST['purpose'];

	$getdept = mysqli_query($conn, "SELECT dept FROM personincharge WHERE name = '$name'");
	$getdeptrow = mysqli_fetch_array($getdept);	

	$dept = $getdeptrow['dept'];

	mysqli_query($conn, "INSERT INTO directorrequest (item, purpose, quantity, daterequested, personincharge, department) VALUES ('$item',' $purpose', '$quantity', '$daterequested', '$name', '$dept')");

	mysqli_close($conn);
	header("Location: directorboard.php?done=3");

}

?>
<div class="container">
<h3>Director's Request for Fixed Assets Transfer</h3>
<br>
<?php
	echo "Enter details for the item, <b>".$_GET['item']."</b>";		

?>
<br><br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="hidden" name="item" value="<?php echo $_GET['item']; ?>">
	

	<div class="form-group">
	<div class="col-sm-3">
	<label for="date" class="control-label col-sm-10">Purpose (write it eligibly):</label>
	<input class="form-control" type="text" autocomplete="off" name="purpose"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="date" class="control-label col-sm-2">Quantity:</label>
	<input class="form-control" type="text" autocomplete="off" name="quantity"><br><br>
	</div>
	</div>

<br>
	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" value="Submit" class="btn btn-primary">
	
	</div>
	</div>
</form>


</div>
</body>
</html>