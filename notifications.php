<?php include 'header2.php'; ?>

<div class="container">
<h3>Notifications</h3> <a href="requesterboard.php?done=" class="bbutton">Back to dashboard</a>
<br><br>
<?php
	$getnotif = mysqli_query($conn, "SELECT * FROM requester_status");
	
	while($getnotifrow = mysqli_fetch_array($getnotif)){
		echo "<b>".$getnotifrow['date']."</b>. ".$getnotifrow['ar_status'].". Item requested: ".$getnotifrow['supplyorequipment']."<br>";
		echo "<a href='okaynotif.php?id=".$getnotifrow['id']."' class='btn btn-primary btn-xs'>OK</a>";
		echo "<br><br>";
	}
?>

</div>
</body>
</html>