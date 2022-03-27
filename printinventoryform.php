<?php
	include 'header3.php';
?>
	<br>
	<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following details.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>

	<form action="printinventory.php" method="POST" class="form-horizontal">
	<b>Type of Report:</b><br>
	<input type="hidden" name="month" value="none">
	<input type="hidden" name="span" value="none">

	<input type="checkbox" name="type" id="box1" onclick="Click1()" value="Annual" required> Annual<br>
	<input type="checkbox" name="type" id="box2" onclick="Click2()" value="Monthly"> Monthly<br>
	<input type="checkbox" name="type" id="box3" onclick="Click3()" value="Semi-annual"> Semi-annual
	<!--
	Type of Report: <select id="type" name="type">
	<option value="Annual" onchange="Change1()">Annual</option>
	<option value="Monthly" onchange="Change2()">Monthly</option>
	<option value="Semi-annual" onchange="Change3()">Semi-annual</option>
	</select>
	-->
<br><br>
	
	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="month" class="control-label col-sm-6">Select Month:</label>
	<select id="month" name="month" class="form-control">
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
	<label for="span" class="control-label col-sm-6">Select Span:</label>
	<select id="span" name="span" class="form-control">
	<option>January - June</option>
	<option>July - December</option>
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3"> 
	<label for="span" class="control-label col-sm-6">Select Year:</label>
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
	<br>
	<div class="form-group">
	<div class="col-sm-6"> 
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>

	</form>
</div>

</div>
</body>

<script type="text/javascript">
function Click1(){
		document.getElementById('box2').checked = false;
		document.getElementById('box3').checked = false;
		document.getElementById('month').disabled = true;
		document.getElementById('span').disabled = true;
}
function Click2(){
		document.getElementById('box1').checked = false;
		document.getElementById('box3').checked = false;
		document.getElementById('span').disabled = true;
		document.getElementById('month').disabled = false;
}
function Click3(){
		document.getElementById('box1').checked = false;
		document.getElementById('box2').checked = false;
		document.getElementById('span').disabled = false;
		document.getElementById('month').disabled = true;
}

	
</script>

</html>