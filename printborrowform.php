<?php
	include 'header3.php';



?>
	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<form action="printborrow.php" method="POST">
	
	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="type" class="control-label col-sm-10">Type of Report:</label>
	<select name="type" class="form-control">
	<option>Annual</option>
	<option>Monthly</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="month" class="control-label col-sm-10">Select Month:</label>
	<select name="month" class="form-control">
	<option>January</option>
	<option>February</option>
	<option>March</option>
	<option>April</option>
	<option>May</option>
	<option>June</option>
	<option>July</option>
	<option>August</option>
	<option>September</option>
	<option>October</option>
	<option>November</option>
	<option>December</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="year" class="control-label col-sm-10">Select Year:</label>
	<select name="year" class="form-control">
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
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-10">
	<br>
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>

	</form>
</div>

</div>
</body>
</html>