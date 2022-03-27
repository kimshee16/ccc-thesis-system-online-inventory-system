<?php

	include 'header3.php';



?>
	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<!--<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">-->
	<form action="inputnewsupprec2.php" method="POST">
	
	<div class="form-group">
	<div class="col-sm-4">
	<label for="item" class="control-label col-sm-10">Item:</label>
	<select name="item" class="form-control">
		<?php
			$getitem = mysqli_query($conn, "SELECT * FROM supplies_request WHERE req_status = 'unreceived' OR req_status = 'partially received'");
			while($getitemrow = mysqli_fetch_array($getitem)){
				echo "<option>".$getitemrow['name_desc']."</option>";
			}
		?>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="class" class="control-label col-sm-10">Classification:</label>
	<select name="class" class="form-control">
		<option>Teaching Supplies</option>
		<option>Office Supplies</option>
		<option>Janitorial Supplies</option>
		<option>Tools</option>
	</select>
	</div>
	</div>


	<div class="form-group">
	<div class="col-sm-2">
	<label for="barcode" class="control-label col-sm-10">Item code:</label>
	<input class="form-control" type="text" name="barcode" required autocomplete="off" placeholder="Item code (barcode)" pattern="^[0-9]+$" title="Only numbers are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="batchnum" class="control-label col-sm-10">Batch number:</label>
	<input class="form-control" type="text" name="batchnum" required autocomplete="off" placeholder="Batch Number" pattern="^[0-9]+$" title="Only numbers are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<label for="quantity" class="control-label col-sm-10">Quantity:</label>
	<input class="form-control" type="text" name="quantity" required autocomplete="off" placeholder="How many items received?" pattern="^[0-9]+$" title="Only numbers are allowed."><br><br>
	</div>
	</div>


	<div class="form-group">
	<div class="col-sm-4">
	<input class="btn btn-primary" type="submit" name="submit" value="Done">
	</div>
	</div>

	</form><br>
	<span class="err" style="color: red;"><?php if(isset($_GET['err'])){echo $_GET['err']." <button id='togbtn'>OK</button>";} ?></span>

<script type="text/javascript">
$(document).ready(function(){
	$('#togbtn').click(function(){
		$('span.err').toggleClass('textandbuttonRemove');
		$('#togbtn').toggleClass('textandbuttonRemove');
	});
});
</script>

</div>
</body>
</html>