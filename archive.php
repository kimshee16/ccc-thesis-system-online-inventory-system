<?php
	include 'header3.php';
?>
<br>
<div class="container">
<h3>Archive Records</h3>
<a href="dashboard.php?done=">Back to Dashboard</a><br><br>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Section</th>
			<th>Description</th>
			<th>Person</th>
			<th>Record Date</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$get = mysqli_query($conn, "SELECT * FROM `archiverecords` ORDER BY id DESC");
			while($getrow = mysqli_fetch_array($get)){
				echo "<tr>";
				echo "<td>".$getrow['section']."</td>";
				echo "<td>".$getrow['description']."</td>";
				echo "<td>".$getrow['personincharge']."</td>";
				echo "<td>".$getrow['date']."</td>";
				echo "</tr>";
			}
		?>
	</tbody>
</table>
</div>
</body>
</html>