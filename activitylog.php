<?php
	include 'header3.php';
?>
<div class="container">
	<div id="BorrowItem" class="tabcontent">
	<b>Activity Log</b> &nbsp&nbsp&nbsp<a href="dashboard.php?done=">Back to Dashboard</a>
	<br><br>
	<table id="btable" class="table table-hover">
	<thead>
		<tr>
			<th>Admin</th>
			<th>Activity</th>
			<th>Date & Time</th>
		</tr>
	</thead>
	<tbody>
		<?php
				$getlog = mysqli_query($conn, "SELECT * FROM activitylog ORDER BY datetime DESC");
				while($getlogrow = mysqli_fetch_array($getlog)){
					echo "<tr>";
					echo "<td>".$getlogrow['personincharge']."</td>";
					echo "<td>".$getlogrow['activity']."</td>";
					echo "<td>".$getlogrow['datetime']."</td>";
					echo "</tr>";
				}
				?>
	</tbody>
	</table>
</div>
</div>
</body>
</html>