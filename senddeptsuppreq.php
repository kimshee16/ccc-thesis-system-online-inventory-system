<?php

include 'header2.php';

$item = $_GET['item'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];
	$dateneeded = $_POST['dateneeded'];
	$daterequested = date('Y-m-d');
	$name = $_SESSION['name'];
	$purpose = $_POST['purpose'];

	$getdept = mysqli_query($conn, "SELECT dept FROM personincharge WHERE name = '$name'");
	$getdeptrow = mysqli_fetch_array($getdept);	

	$dept = $getdeptrow['dept'];

	$getunit = mysqli_query($conn, "SELECT unit FROM supplies WHERE name_desc = '$item'");
	$getunitrow = mysqli_fetch_array($getunit);

	$unit = $getunitrow['unit'];

	mysqli_query($conn, "INSERT INTO dept_request (name_desc, quantity, unit, personincharge, dept, purpose, daterequested, dateneeded, r_status) VALUES ('$item', '$quantity', '$unit', '$name', '$dept',' $purpose', '$daterequested', '$dateneeded', '0')");

	mysqli_close($conn);
	header("Location: requesterboard.php?done=2");

}

?>

<div class="container">

<h3>Supplies Request</h3>
<br>
<?php
	echo "Enter details for the item, <b>".$item."</b>";		

?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="hidden" name="item" value="<?php echo $_GET['item']; ?>">
	<div class="form-group">
	<div class="col-sm-6"> 
	<label for="date" class="control-label col-sm-4">Date needed:</label>
	<input class="form-control" type="date" name="dateneeded"><br><br>
	</div>
	</div>

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

	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" value="Submit" class="btn btn-primary">
	
	</div>
	</div>
</form>

</div>
</body>
</html>