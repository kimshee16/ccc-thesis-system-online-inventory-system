<?php include 'header2.php'; ?>

<br>
<div class="container">
<h3>Request Status</h3><a href="requesterboard.php?done=" class="bbutton">Back to dashboard</a><br><br>

<table width="100%">
	<tr>
		<td>
		  <h4>Status for Equipment Request</h4>
		  <div style="overflow: scroll; height: 470px;">
		  <table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>Item Code</th>
		  			<th>Name</th>
		  			<th>Quantity</th>
		  			<th>Status</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  		$name = $_SESSION['name'];
		  		$getb = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge = '$name' AND (b_status = '0' OR b_status = '1' OR b_status = '2')");
		  		while($getbrow = mysqli_fetch_array($getb)){
		  			echo "<tr>";
		  			if($getbrow['itemcode'] == '0'){
		  				echo "<td>Not yet claimed</td>";
		  			}else{
		  				echo "<td>".$getbrow['itemcode']."</td>";
		  			}
		  			echo "<td>".$getbrow['itemborrowed']."</td>";
		  			echo "<td>".$getbrow['quantity']."</td>";
					if($getbrow['b_status'] == '0'){
						echo "<td>Pending</td>";
					}elseif($getbrow['b_status'] == '1'){
						echo "<td>Approved</td>";
					}elseif($getbrow['b_status'] == '2'){
						echo "<td>Claimed</td>";
					}
		  			echo "</tr>";
		  		}
		  		
		  		?>
		  	</tbody>
		  </table>
		  </div>

		</td>
		
		<td>
			<h4>Status for Supplies Request</h4>
			<div style="overflow: scroll; height: 470px;">
			<table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>Item</th>
		  			<th>Quantity</th>
		  			<th>Status</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  		$getsupp = mysqli_query($conn, "SELECT * FROM dept_request WHERE r_status = '0'");
		  		while($getsupprow = mysqli_fetch_array($getsupp)){
		  			echo "<tr>";
		  			echo "<td>".$getsupprow['name_desc']."</td>";
		  			echo "<td>".$getsupprow['quantity']."</td>";
		  			if($getsupprow['r_status'] == '0'){
		  				echo "<td>Pending</td>";
		  			}else{
		  				echo "<td>Approved</td>";
		  			}
		  			echo "</tr>";	
		  			}
		  		?>
		  	</tbody>
		  </table>
		  </div>

		</td>
		
	</tr>
</table>


</div>
</body>
</html>