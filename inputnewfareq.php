<?php
	include 'header3.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$itemname = $_POST['itemname'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$person = $_SESSION['name'];
		$date = date("Y-m-d");

		mysqli_query($conn, "INSERT INTO fixedassets_request (name, description, quantity, requesting_date, requestor_name, req_status
	) VALUES ('$itemname', '$description', '$quantity','$date', '$person', 'unreceived')");

		mysqli_query($conn, "INSERT INTO fixedassets_unreceive (name, description, quantity, person_to_receive, posting_date

	) VALUES ('$itemname', '$description', '$quantity','$person', '$date')");

		mysqli_close($conn);
		header("Location: dashboard.php?done=");
	}
?>
	<br><br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">

	<!--
	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Item name:</label>
	<input class="form-control" type="text" name="itemname" required autocomplete="off" placeholder="Item name">
	</div>
	</div>
	-->

	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Item:</label>
	<input class="form-control" type="text" name="itemname" required autocomplete="off" placeholder="Item name">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Description:</label>
	<select class="form-control" name="description">
		<option>equipment</option>
		<option>furnitures and fixtures</option>
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
</div>

</body>
</html>