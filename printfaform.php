<?php
	include 'header3.php';
?>
	<br>
	<div class="container">	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="printfa.php" method="POST">
	
	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="dept" class="control-label col-sm-4">Department:</label>
	<select name="dept" class="form-control">
	<option>DASTE</option>
	<option>DBE</option>
	<option>DCE</option>
	<option>Faculty Office</option>
	<option>Guidance's Office</option>
	<option>Library</option>
	<option>Office of the President</option>
	<option>OSA</option>
	<option>Registrar's Office</option>
	<option>VPA</option>
	<option>VPAA</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="typeass" class="control-label col-sm-10">Type of Asset:</label>
	<select name="typeass" class="form-control"><br><br>
		<option>equipment</option>
		<option>furnitures and fixtures</option>
	</select>
</div>
</div>

	<div class="form-group">
	<div class="col-sm-10">
	<br><input type="submit" name="submit" value="Done" class="btn btn-primary">
</div>
</div>
	</form>
</div>

</div>
</body>
</html>