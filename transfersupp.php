<?php
	include 'header3.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		$dept = $_POST['dept'];
		$location = $_POST['dept'];
		$unit = $_POST['unit'];
		$name = $_POST['name'];
		$batchnum = $_POST['batchnum'];
		$itemcode = $_POST['itemcode'];
		$receivingdate = date("Y-m-d");
		$receivingperson = $_POST['receivingperson'];
		$sem = $_POST['sem'];

		$getperson = mysqli_query($conn, "SELECT * FROM offices WHERE office = '$dept'");
		$getpersonrow = mysqli_fetch_array($getperson);

		$person = $getpersonrow['personincharge'];

		mysqli_query($conn, "INSERT INTO supplies (name_desc, unit, quantity, itemcode, batchnumber, location, receivingperson, receivingdate) VALUES ('$name', '$unit', '$quantity', '$itemcode', '$batchnum', '$location', '$person', '$receivingdate')");

		$getquan = mysqli_query($conn, "SELECT * FROM supplies WHERE id = '$id'");
		$getquanrow = mysqli_fetch_array($getquan);

		$diff = $getquanrow['quantity'] - $quantity;

		mysqli_query($conn, "UPDATE supplies SET quantity = '$diff' WHERE id = '$id'");

		mysqli_query($conn, "INSERT INTO suppliesconsumption (name_desc, quantity, unit, location, itemcode, batchnumber, issuingdate, personincharge, sem) VALUES ('$name', '$quantity', '$unit', '$location', '$itemcode', '$batchnum', '$receivingdate', '$receivingperson', '$sem')");



		mysqli_close($conn);
		header("Location: dashboard.php?done=2");

	}
	
?>

<div class="container">
	<h3>Transfer Supplies to other Department</h3>
	<a href="dashboard.php?done=">Back to Dashboard</a>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
		<input type="hidden" name="unit" value="<?php echo $_GET['unit']; ?>">
		<input type="hidden" name="batchnum" value="<?php echo $_GET['bn']; ?>">
		<input type="hidden" name="itemcode" value="<?php echo $_GET['ic']; ?>">

		<div class="form-group">
		<div class="col-sm-3"> 
		<label for="date" class="control-label col-sm-4">Department:</label>
		<select name="dept" class="form-control">
			<option>Office of the President</option>
			<option>VPA</option>
			<option>VPAA</option>
			<option>Registrar</option>
			<option>OSA</option>
			<option>DCE</option>
			<option>DASTE</option>
			<option>DBE</option>
		</select>

		<br><br>
		</div>
		</div>

		<div class="form-group">
		<div class="col-sm-3">
		<label for="sem" class="control-label col-sm-4">Semester:</label>
		<select name="sem" class="form-control">
			<option>1st</option>
			<option>2nd</option>
			<option>Summer</option>
		</select>
		<br><br>
		</div>
		</div>

		<div class="form-group">
		<div class="col-sm-3">
		<label for="date" class="control-label col-sm-2">Quantity:</label>
		<input class="form-control" type="text" name="quantity" required autocomplete="off"><br><br>
		</div>
		</div>

		<div class="form-group">
		<div class="col-sm-3">
		<label for="receivingperson" class="control-label col-sm-10">Receiving Person:</label>
		<input class="form-control" type="text" name="receivingperson" required autocomplete="off"><br><br>
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