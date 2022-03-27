<?php
	include 'header3.php';
	$err = '';
?>
	
	<div id="BorrowItem" class="tabcontent">
	<b>Please fill-up the following information.</b> <a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	
	Which department? 

	<form action="settransfer2.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" >
	<select name="location">
		<?php
			$getoff = mysqli_query($conn, "SELECT * FROM offices");
			while($getoffrow = mysqli_fetch_array($getoff)){
				echo "<option>".$getoffrow['office']."</option>";
			}
		?>
	</select>

	<input type="text" id="barcode" name="barcode" placeholder="Scan/Enter Barcode" autofocus="on" autocomplete="off" required> 
	
	<input type="submit" name="submit" value="Done" class="btn btn-primary"> <span style="color: red;"><?php if(isset($_GET['err'])){ echo $_GET['err']; } ?></span>
	</form>

</body>
</html>