<?php
	include 'header3.php';


?>

<br>

<div class="container">

<a href="dashboard.php?done=">Back to Dashboard</a><br><br>
<p style="margin-left: 15px;">
	Please select date for inventory. Admin and requesters will be restricted by the system to use the entire program for any relevant purposes including requesting equipments and supplies, approving, claiming and returning of equipments, uploading and printing reports and lists, checking and uploading of physical inventory.
</p>
<p style="color:red; margin-left: 15px;">
	Note: Please be careful in choosing dates. Wrong dates for inventory will make the system inconvenient.
</p>
<p style="margin-left: 15px;">
The inventory date that has been set is: </b>
<b>
<?php
	$getthedate = mysqli_query($conn, "SELECT * FROM inventorydate");
	$getget = mysqli_fetch_array($getthedate);

	if(empty($getget['date'])){
		echo "None";
	}else{
		echo $getget['date'];
	}
?>
</b>
</p>
<center>	
<form action="inventorydateset.php" method="POST">
	<div class="form-group">
	<div class="col-sm-2">
	<input type="date" class="form-control" name="date" required autocomplete="off">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>

	</form>
</center>

<br><br><br>
<p style="margin-left: 15px;">
	Please enter a prefered number of reservation days for borrowing equipment at the VPA. Your currently set reservation day/s is: 
<b>
<?php
	$gettheday = mysqli_query($conn, "SELECT * FROM reserveday");
	$getday = mysqli_fetch_array($gettheday);

		echo $getday['numday'];
	
?>
</b>


</p>
<center>	
<form action="reservedayset.php" method="POST">
	<div class="form-group">
	<div class="col-sm-2">
	<input type="text" class="form-control" name="numday" required autocomplete="off" placeholder="Number of days" pattern="^[0-9]+$" title="Only numbers are allowed.">
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-2">
	<input type="submit" name="submit" value="Done" class="btn btn-primary">
	</div>
	</div>
	</form>
</center>

</div>
</body>
</html>