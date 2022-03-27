<?php
	include 'header3.php';

?>

<br>
<div class="container">
<a href="dashboard.php?done=">Back to Dashboard</a><br><br>

Choose office and input new name of the person-in-charge for the office specified. 
<br>
<form class="updateform" action="inchargenameset.php" method="POST">
	<div class="form-group">
	<div class="col-sm-3">
	<select name="offices" class="form-control">
		<?php
		$getop = mysqli_query($conn, "SELECT * FROM offices");

		while ($getoprow = mysqli_fetch_array($getop)) {
			echo "<option>".$getoprow['office']."</option>";
		}
	?>	
	</select>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<input class="form-control" type="text" name="names" required autocomplete="off" placeholder="Person-in-charge name" pattern="^[A-Za-z\s.]+$" title="Only letters, spaces, and periods are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-3">
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>

	</form>
<br><br><br>
<center>
<table class="table table-hover">
	<tr>
		<th>Office</th>
		<th>Person-in-charge</th>
	</tr>
	<?php
		$getop = mysqli_query($conn, "SELECT * FROM offices");

		while ($getoprow = mysqli_fetch_array($getop)) {
			echo "<tr>";
			echo "<td>".$getoprow['office']."</td>";
			echo "<td>".$getoprow['personincharge']."</td>";
			echo "</tr>";
		}
	?>
</table>
</center>
</div>
</body>
</html>