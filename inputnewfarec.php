<?php
include 'header3.php';
?>	
	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<!--<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">-->
	
	<!--
	<div class="form-group">
	<div class="col-sm-3">
	<label for="itemname" class="control-label col-sm-10">Quantity:</label>
	<input class="form-control" type="text" name="quantity" required autocomplete="off" placeholder="Quantity"><br><br>
	</div>
	</div>
	-->

	<form action="inputnewfarec2.php" method="POST">
	<div class="form-group">
	<div class="col-sm-6">
	<label for="item" class="control-label col-sm-10">Item for receiving:</label>
	<select name="item" class="form-control">
		<?php
			$getitem = mysqli_query($conn, "SELECT * FROM fixedassets_request WHERE req_status = 'unreceived' OR req_status = 'partially received'");
			while($getitemrow = mysqli_fetch_array($getitem)){
				echo "<option>".$getitemrow['name']."</option>";
			}
		?>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
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
	<br><br>
	<span class="inperr" style="color: red; text-align: right;"><?php if(isset($_GET['inperr'])){echo $_GET['inperr']." <button id='togbtn'>OK</button>";} ?></span>


</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#togbtn').click(function(){
		$('span.inperr').toggleClass('textandbuttonRemove');
		$('#togbtn').toggleClass('textandbuttonRemove');
	});
});
</script>


</body>
</html>