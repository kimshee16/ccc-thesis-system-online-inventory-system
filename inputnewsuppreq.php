<?php 
	include 'header3.php'; 

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$unit = $_POST['unit'];
		$quantity = $_POST['quantity'];
		$itemname = $_POST['itemname'];
		$requestdate = date("Y-m-d");
		$name = $_SESSION['name'];

		mysqli_query($conn, "INSERT INTO supplies_request (name_desc, quantity, unit, requesting_date, requestor_name, req_status) VALUES ('$itemname','$quantity','$unit','$requestdate','$name','unreceived')");

		mysqli_query($conn, "INSERT INTO supplies_unreceive (name_desc, quantity, unit, posting_date, person_to_receive) VALUES ('$itemname','$quantity','$unit','$requestdate','$name')");

		mysqli_close($conn);
		header("Location: dashboard.php?done=");
	}
?>

	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	
	<!--
	<div class="form-group">
	<div class="col-sm-3">
	<label for="date" class="control-label col-sm-10">Purpose (write it eligibly):</label>
	<input class="form-control" type="text" autocomplete="off" name="purpose"><br><br>
	</div>
	</div>
	-->

	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Item name:</label>
	<input class="form-control" type="text" name="itemname" required autocomplete="off" placeholder="Item name">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Unit:</label>
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
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Quantity:</label>
	<input class="form-control" type="text" name="quantity" required autocomplete="off" placeholder="Quantity" pattern="^[0-9]+$" title="Only numbers are allowed."><br><br>
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