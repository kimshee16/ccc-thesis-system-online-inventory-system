<?php
 include 'header3.php';
?>	
	<div id="BorrowItem" class="tabcontent">
	<b>Please scan the borrower's ID to confirm.</b> <a href="dashboard.php">Back to Dashboard</a>
	<br><br>
	<?php $id = $_GET['id']; ?>
	<form action="return_id.php?id=<?php echo $id; ?>" method="POST">
	ID Barcode: <input type="text" name="idnum" required autocomplete="off" autofocus="on"><span style="color: red;"><?php if(isset($_GET['numerr'])){echo $_GET['numerr'];}?></span>
	<br><br>
	<button>Done</button>
	</form>


</script>

</body>
</html>