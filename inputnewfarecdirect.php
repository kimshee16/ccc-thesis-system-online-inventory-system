<?php
include 'header3.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$item = $_POST['item'];
	$desc = $_POST['desc'];
	$quantity = $_POST['quantity'];

	mysqli_query($conn, "INSERT INTO fixedassets (barcode, itemname, description, quantity, location, personincharge, status) VALUES ('0', '$item', '$desc', '$quantity', '0', '0', 'functioning')");
	mysqli_close($conn);
	header("Location: dashboard.php?done=");
}


?>

<br>
<div class="container">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="form-group">
	<div class="col-sm-4">
	<label for="item" class="control-label col-sm-10">Item received:</label>
	<input type="text" name="item" required autocomplete="off" class="form-control" placeholder="Items received"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="through" class="control-label col-sm-14">Receive Though:</label>
	<select class="form-control" name="through">
		<option>Donations</option>
		<option>City Hall</option>
		<option>Other Organizations</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="barcode" class="control-label col-sm-10">Received from:</label>
	<input class="form-control" type="text" name="from" required autocomplete="off" pattern="^[0-9\-]+$" title="Only numbers are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="desc" class="control-label col-sm-10">Description</label>
	<select name="desc" class="form-control" required>
		<option></option>
		<option>equipment</option>
		<option>furnitures and fixtures</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="quantity" class="control-label col-sm-10">Quantity:</label>
	<input type="text" name="quantity" required autocomplete="off" class="form-control" placeholder="How many items received?" pattern="^[0-9]+$" title="Only numbers are allowed."><br><br>
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