<?php include 'header3.php'; ?>
	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	<?php
		$id = $_GET['id'];
		$getitem = mysqli_query($conn, "SELECT * FROM dept_request WHERE id = '$id'");
		$getitemrow = mysqli_fetch_array($getitem);

		echo "Please choose the smallest/oldest batch number to follow the FI-FO (First In - First Out) system. The item you requested is: <b>".$getitemrow['name_desc']."</b><br><br>";
	?>  

	<form action="approvesuppreq2.php?id=<?php echo $id; ?>" method="POST">
	Batch number: <select name="batchnum">
		<?php
			$name = $getitemrow['name_desc'];
			$dept = $getitemrow['dept'];
			$getbat = mysqli_query($conn, "SELECT * FROM supplies WHERE name_desc = '$name' AND location = 'VPA'");
			while($getbatrow = mysqli_fetch_array($getbat)){
				echo "<option>".$getbatrow['batchnumber']."</option>";
			}
		?>
	</select>
	<br><br>
	<input type="submit" class="btn btn-primary" name="submit" value="Done">
	</form>


</script>

</body>
</html>