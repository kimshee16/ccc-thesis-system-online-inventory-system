<?php include 'header2.php'; ?>
<br>
<?php 
	$done = $_GET['done'];

	if($done == '1'){
		echo "<script>alert('Equipment request successfully sent!');</script>";
	}elseif($done == '2'){
		echo "<script>alert('Supplies request successfully sent!');</script>";
	}else{
		echo "<script>alert('Done!');</script>";
	}
?>

<div class="container">
<table width="100%">
	<tr>
		<td>
		  <h3>Equipment Borrow Request</h3>
		  <div style="overflow: scroll; height: 470px;">
		  <table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>ID Number</th>
		  			<th>Item Code</th>
		  			<th>Name</th>
		  			<th>Quantity</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  		
		  		$getb = mysqli_query($conn, "SELECT * FROM fixedassets WHERE location = 'VPA' AND permissioncode = '1'");
		  		while($getbrow = mysqli_fetch_array($getb)){
		  			echo "<tr>";
		  			echo "<td>".$getbrow['id']."</td>";
		  			echo "<td>".$getbrow['barcode']."</td>";
		  			echo "<td>".$getbrow['itemname']."</td>";
		  			echo "<td>".$getbrow['quantity']."</td>";

		  			$name = $_SESSION['name'];
		  			$item = $getbrow['itemname'];

		  			$getborrow = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge = '$name' AND (b_status='0' OR b_status='1' OR b_status='2')");
		  			$getborrowrow = mysqli_fetch_array($getborrow);

		  			if($getborrowrow['personincharge'] == ""){
		  				$getborrow2 = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed = '$item' AND (b_status='0' OR b_status='1' OR b_status='2')");
		  				$getborrowrow2 = mysqli_fetch_array($getborrow2);
		  				if($getborrowrow2['itemborrowed'] == ""){
		  					echo "<td><a href='sendborrowitem.php?id=".$getbrow['id']."&q=".$getbrow['quantity']."&item=".$getbrow['itemname']."' class='btn btn-primary btn-sm'>Request</a></td>";
		  					}else{
		  						echo "<td><a href='' class='btn btn-primary disabled btn-sm'>Item Unavailable</a></td>";
		  					}

		  				}else {
		  					echo "<td><a href='' class='btn btn-primary disabled btn-sm'>Already Requested 1</a></td>";
		  				}
		  			

		  					  			
		  			echo "</tr>";
		  		}
		  		
		  		?>
		  	</tbody>
		  </table>
		  </div>

		</td>

		<td>
			<h3>Fixed Assets Transfer Request</h3>
			<div style="overflow: scroll; height: 470px;">
			<table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>Item list</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  		$getfixed = mysqli_query($conn, "SELECT DISTINCT itemname FROM fixedassets");
		  		while($getfixedrow = mysqli_fetch_array($getfixed)){
		  			echo "<tr>";
		  			echo "<td>".$getfixedrow['itemname']."</td>";
		  			echo "<td><a href='senddirreq.php?item=".$getfixedrow['itemname']."' class='btn btn-primary btn-sm'>Request</a></td>";
		  			echo "</tr>";	
		  			}
		  		?>
		  	</tbody>
		  </table>

			</div>
		</td>
		
		<td>
			<h3>Supplies Request</h3>
			<div style="overflow: scroll; height: 470px;">
			<table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>Item list</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		  		<?php
		  		$getsupp = mysqli_query($conn, "SELECT DISTINCT name_desc FROM supplies");
		  		while($getsupprow = mysqli_fetch_array($getsupp)){
		  			echo "<tr>";
		  			echo "<td>".$getsupprow['name_desc']."</td>";
		  			echo "<td><a href='senddeptsuppreq.php?item=".$getsupprow['name_desc']."' class='btn btn-primary btn-sm'>Request</a></td>";
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