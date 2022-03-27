<?php
	include 'header3.php';

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		

	}

?>
	<br>
	<div class="container">	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="printconsumption2.php" method="POST">
	
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
	<label for="sem" class="control-label col-sm-4">Semester:</label>
	<select name="sem" class="form-control">
	<option>1st</option>
	<option>2nd</option>
	<option>Summer</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="year" class="control-label col-sm-10">Select Inventory Year:</label>
	<select name="year" class="form-control"><br><br>
	<option>2019</option>
	<option>2020</option>
	<option>2021</option>
	<option>2022</option>
	<option>2023</option>
	<option>2024</option>
	<option>2025</option>
	<option>2026</option>
	<option>2027</option>
	<option>2028</option>
	<option>2029</option>
	<option>2030</option>
	<option>2031</option>
	<option>2032</option>
	<option>2033</option>
	<option>2034</option>
	<option>2035</option>
	<option>2036</option>
	<option>2037</option>
	<option>2038</option>
	<option>2039</option>
	<option>2040</option>
	<option>2041</option>
	<option>2042</option>
	<option>2043</option>
	<option>2044</option>
	<option>2045</option>
	<option>2046</option>
	<option>2047</option>
	<option>2048</option>
	<option>2049</option>
	<option>2050</option>
	</select>
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