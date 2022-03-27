<?php
	include 'header3.php';
	$id = $_GET['id'];
?>
	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<!--<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">-->
	<form action="assignnewinfo2.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; $id = $_GET['id'];?>">

	<!--
	<div class='form-group'>
	<div class='col-sm-3'>
	<label for='itemname' class='control-label col-sm-10'>Item name:</label>
	<input class="form-control" type="text" name="itemname" required autocomplete="off" placeholder="Item name">
	</div>
	</div>
	-->

	<?php
		$getquan = mysqli_query($conn, "SELECT * FROM fixedassets WHERE id = '$id'");
		$getquanrow = mysqli_fetch_array($getquan);

		$q = $getquanrow['quantity'];

		$x = 1;
		while($x <= $q){
			echo "
			<div class='form-group'>
			<div class='col-sm-4'>
			<label for='barcode' class='control-label col-sm-10'>Item code for item ".$x.":</label>
			<input type='text' class='form-control' name='barcode".$x."' required autocomplete='off' placeholder=' Item code ".$x."'>
			</div>
			


			";
			


			echo "
			<div class='form-group'>
			<div class='col-sm-6'>
			<label for='location' class='control-label col-sm-10'>Location for item ".$x.":</label>
			<select name='location".$x."' class='form-control'>
					<option>DASTE</option>
					<option>DBE</option>
					<option>DCE</option>
					<option>Faculty Office</option>
					<option>Guidance's Office</option>
					<option>Library</option>
					<option>Office of the College President</option>
					<option>OSA</option>
					<option>Registrar's Office</option>
					<option>VPA</option>
					<option>VPAA</option>
					</select><br>
			</div>
			</div>
			</div>
			";
			$x++;	
		}
	?>
	
	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>
	</form><br><br>
	<span class="bcerr" style="color: red; text-align: right;"><?php if(isset($_GET['bcerr'])){echo $_GET['bcerr']." <button id='togbtn'>OK</button>";} ?></span>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	$('#togbtn').click(function(){
		$('span.bcerr').toggleClass('textandbuttonRemove');
		$('#togbtn').toggleClass('textandbuttonRemove');
	});
});
</script>
</body>
</html>