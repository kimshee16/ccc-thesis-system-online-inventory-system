<?php
include 'header3.php';
?>
	
	<div id="BorrowItem" class="tabcontent">
	<b>Please scan the item barcode to confirm.</b> <a href="dashboard.php">Back to Dashboard</a>
	<br><br>
	<?php $id = $_GET['id']?>
	<form action="confirm_item.php?id=<?php echo $id;?>" method="POST">
	Item Barcode: <input type="text" name="itemnum" required autocomplete="off" autofocus="on">
	<br><br>
	<button>Done</button>
	</form>


</script>

</body>
</html>