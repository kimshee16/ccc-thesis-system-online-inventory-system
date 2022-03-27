<?php
	include 'header3.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$item = $_POST['item'];
		$barcode = $_POST['barcode'];
		$batchnum = $_POST['batchnum'];
		$quantity = $_POST['quantity'];
		$unit = $_POST['unit'];
		$location = "VPA";
		$receivingdate = date("Y-m-d");
		$class = $_POST['class'];

		$getperson = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$location'");
		$getpersonrow = mysqli_fetch_array($getperson);

		$receivingperson = $getpersonrow['personincharge'];

		mysqli_query($conn, "INSERT INTO supplies (name_desc, classification, unit, quantity, itemcode, batchnumber, location, receivingperson, receivingdate) VALUES ('$item', '$class', '$unit', '$quantity', '$barcode', '$batchnum', '$location', '$receivingperson', '$receivingdate')");

		mysqli_query($conn, "INSERT INTO supplies_receive (name_desc, unit, quantity, receiver_name, receiving_date) VALUES ('$item', '$unit', '$quantity', '$receivingperson', '$receivingdate')");

		header("Location: dashboard.php?done=");
	}

?>
<br><br>
<div class="container">
<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

	<div class="form-group">
	<div class="col-sm-2">
	<label for="item" class="control-label col-sm-16">Item & description:</label>
	<input class="form-control" type="text" name="item" required autocomplete="off">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="class" class="control-label col-sm-10">Classification:</label>
	<select class="form-control" name="class">
		<option>Teaching Supplies</option>
		<option>Office Supplies</option>
		<option>Janitorial Supplies</option>
		<option>Tools</option>
	</select>
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
	<label for="barcode" class="control-label col-sm-10">Item code:</label>
	<input class="form-control" type="text" name="barcode" required autocomplete="off" pattern="^[0-9\-]+$" title="Only numbers are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="batchnum" class="control-label col-sm-10">Batch number:</label>
	<input class="form-control" type="text" name="batchnum" required autocomplete="off" pattern="^[0-9]+$" title="Only numbers are allowed."><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="quantity" class="control-label col-sm-10">Quantity:</label>
	<input class="form-control" type="text" name="quantity" required autocomplete="off" pattern="^[0-9]+$" title="Only numbers are allowed."><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="unit" class="control-label col-sm-10">Unit:</label>
	<select class="form-control" name="unit">
		<option>pcs</option>
		<option>rolls</option>
		<option>boxes</option>
		<option>btls</option>
		<option>reams</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-4"><br>
	<input class="btn btn-primary" type="submit" name="submit" value="Done">
	</div>
	</div>

</form>


</div>
</body>
</html>