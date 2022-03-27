<?php include 'header.php'; ?>
<?php
	$done = $_GET['done'];

	if($done == 1){
		echo "<script>alert('Done!');</script>";
	}elseif($done == 2){
		echo "<script>alert('Successfully transferred the supplies to other department!');</script>";
	}elseif($done == 10){
		echo "<script>alert('Already compared physical inventory to list!');</script>";
	}

?>
	<div id="SuppCon" class="tabcontent">
		<h3>Consumed Supplies</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Item code</th>
					<th>Name and Description</th>
					<th>Quantity & Unit</th>
					<th>From Location</th>
					<th>Person-in-charge</th>
					<th>Record Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$getsuppc = mysqli_query($conn, "SELECT * FROM supp_consumed");
				while($getsuppcrow = mysqli_fetch_array($getsuppc)){
					echo "<tr>";
					echo "<td>".$getsuppcrow['itemcode']."</td>";
					echo "<td>".$getsuppcrow['name_desc']."</td>";
					echo "<td>".$getsuppcrow['quantity_unit']."</td>";
					echo "<td>".$getsuppcrow['fromlocation']."</td>";
					echo "<td>".$getsuppcrow['fromwho']."</td>";
					echo "<td>".$getsuppcrow['datetrans']."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

	<div id="SuppConsume" class="tabcontent">
		<h3>Supplies Consumption Inventory</h3>
		<a href="printconsumption.php" class="btn btn-primary btn-xs">Print Consumption Report</a> <a href="archivesuppcon.php" class="btn btn-primary btn-xs">Archive</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name and Description</th>
					<th>Quantity</th>
					<th>Unit</th>
					<th>Location</th>
					<th>Person-in-charge</th>
					<th>Item code</th>
					<th>Batch No.</th>
					<th>Issuing Date</th>
					<th>Semester</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$getsuppcon = mysqli_query($conn, "SELECT * FROM suppliesconsumption");
				while($getsuppconrow = mysqli_fetch_array($getsuppcon)){
					echo "<tr>";
					echo "<td>".$getsuppconrow['name_desc']."</td>";
					echo "<td>".$getsuppconrow['quantity']."</td>";
					echo "<td>".$getsuppconrow['unit']."</td>";
					echo "<td>".$getsuppconrow['location']."</td>";
					echo "<td>".$getsuppconrow['personincharge']."</td>";
					echo "<td>".$getsuppconrow['itemcode']."</td>";
					echo "<td>".$getsuppconrow['batchnumber']."</td>";
					echo "<td>".$getsuppconrow['issuingdate']."</td>";
					echo "<td>".$getsuppconrow['sem']."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		
	</div>


	<div id="DirRequest" class="tabcontent">
		<h3>Director's Request for Fixed Assets Transfer</h3>
		<a href="archivedirreq.php" class="btn btn-primary btn-xs">Archive</a>
		<table class="table table-hover">
				<thead>
				<tr>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Purpose</th>
					<th>Requesting Person</th>
					<th>Department</th>
					<th>Date Requested</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$getalldirreq = mysqli_query($conn, "SELECT * FROM directorrequest ORDER BY daterequested DESC");

				while ($dirrow = mysqli_fetch_array($getalldirreq)) {
					if($dirrow['id'] == ""){
						echo "No record found.";
					}else{
						echo "<tr>";
						echo "<td>".$dirrow['item']."</td>";
						echo "<td>".$dirrow['quantity']."</td>";
						echo "<td>".$dirrow['purpose']."</td>";
						echo "<td>".$dirrow['personincharge']."</td>";
						echo "<td>".$dirrow['department']."</td>";
						echo "<td>".$dirrow['daterequested']."</td>";
						echo "</tr>";
					}
					
				}

				?>
			</tbody>
			</table>

	</div>


	<div id="Figures" class="tabcontent">
		<h3>Figures</h3>
		<br>
		<div class="frames">
			<iframe src="getdept.php" width="100%" height="500px"></iframe>
			<iframe src="indchartgetyear.php" width="100%" height="500px"></iframe>
			
			<iframe src="depthighstocks.php" width="100%" height="500px"></iframe>
			<!--
			<iframe src="deptmostrequest.php" width="100%" height="500px"></iframe>
		-->
		</div>
	
	</div>


	<div id="BorrowItem" class="tabcontent">
	<h3>Equipment Borrow Request</h3><a class="btn btn-primary btn-xs" href="printborrowform.php">Print Borrow Report</a> <a href="archiveborrow.php" class="btn btn-primary btn-xs">Archive</a>
	

	<table class="table table-hover">
	<thead>
	<tr>
		<th>Item Borrowed</th>
		<th>Item Code</th>
		<th>Quantity</th>
		<th width="10%">Purpose</th>
		<th>Person-in-charge</th>
		<th>ID No.</th>
		<th width="7%">Date Requested</th>
		<th width="7%">Date Approved</th>
		<th>Aprroved by</th>
		<th width="7%">Date to be Claim</th>
		<th width="7%">Date Claimed</th>
		<th width="7%">Date Returned</th>
		<th>Status</th>
		<th width="6%">Remaining Days (Reservation)</th>
		<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$borrow = mysqli_query($conn,"SELECT * FROM `borrowitem`");
						
			while($borrowrow = mysqli_fetch_array($borrow)) {
				echo "<tr>";
				echo "<td>".$borrowrow['itemborrowed']."</td>";
				echo "<td>".$borrowrow['itemcode']."</td>";
				echo "<td>".$borrowrow['quantity']."</td>";
				echo "<td>".$borrowrow['reason']."</td>";
				echo "<td>".$borrowrow['personincharge']."</td>";
				echo "<td>".$borrowrow['idnum']."</td>";
				echo "<td>".$borrowrow['daterequested']."</td>";
				echo "<td>".$borrowrow['dateapproved']."</td>";
				echo "<td>".$borrowrow['approvedby']."</td>";
				echo "<td>".$borrowrow['datetobeclaimed']."</td>";
				/*
				if($borrowrow['dateapproved'] !== '0000-00-00 00:00:00'){
					$dtbclaim1 = $borrowrow['dateapproved'];

					$dtbclaim2 = date_create($dtbclaim1);
					date_modify($dtbclaim2,"+3days");
					$dtbclaim3 = date_format($dtbclaim2,"Y-m-d h:i:s");

					echo "<td style='color: red;'>".$dtbclaim3."</td>";	
				}else{
					echo "<td>0000-00-00 00:00:00</td>";
				}
				*/
				echo "<td>".$borrowrow['dateclaimed']."</td>";
				echo "<td>".$borrowrow['datereturned']."</td>";
				if($borrowrow['b_status'] == 0){
					echo "<td>Pending</td>";
				}elseif($borrowrow['b_status'] == 1){
					echo "<td>Approved</td>";
				}elseif($borrowrow['b_status'] == 2){
					echo "<td>Claimed</td>";
				}elseif($borrowrow['b_status'] == 3){
					echo "<td>Returned</td>";
				}
				
				/*
				$startdate = $borrowrow['dateapproved'];
				
				$day1 = date_create($startdate);
				date_modify($day1,"+1days");
				$endday1 = date_format($day1,"Y-m-d h:i:s");								

				$day2 = date_create($startdate);
				date_modify($day2,"+2days");
				$endday2 = date_format($day2,"Y-m-d h:i:s");				

				$day3 = date_create($startdate);
				date_modify($day3,"+3days");
				$endday3 = date_format($day3,"Y-m-d h:i:s");

				if(date("Y-m-d h:i:s") <= $endday1){
					echo "<td>3 days</td>";
				}elseif(date("Y-m-d h:i:s") >= $endday1 && date("Y-m-d h:i:s") <= $endday2){
					echo "<td>2 days</td>";	
				}elseif(date("Y-m-d h:i:s") >= $endday2 && date("Y-m-d h:i:s") <= $endday3){
					echo "<td>1 days</td>";	
				}elseif(date("Y-m-d h:i:s") >= $endday3){
					echo "<td>0 days</td>";	
				}
				
				*/
				$id = $borrowrow['id'];
				$checkdatenow = date("Y-m-d");

				$getdates = mysqli_query($conn, "SELECT * FROM borrowitem WHERE id ='$id'");
				$getdatesrow = mysqli_fetch_array($getdates);

				$checkclaimed = $getdatesrow['dateclaimed'];
				$checkapproved = $getdatesrow['dateapproved'];

				if($checkapproved == "0000-00-00"){
					echo "<td>0 days</td>";
				}else{
					if($checkclaimed == "0000-00-00"){
						if($checkdatenow >= $getdatesrow['datetobeclaimed']){
							echo "<td>Ready to claim</td>";
						}else{
							$date1 = date_create($checkdatenow);
							$date2 = date_create($getdatesrow['datetobeclaimed']);
							$datediff = date_diff($date1,$date2);
							echo $datediff->format("<td>%a days</td>");
						}			
					}else{
						echo "<td>0 days</td>";
						}
				}

				?>

				<td>
				<?php
				if($borrowrow['b_status'] == 0)
				{
				?>
				<a class="btn btn-primary btn-xs" href="approverequest.php?id=<?php echo $borrowrow['id'];?>">Approve</a> <a class="btn btn-primary btn-xs" href="rejectrequest.php?id=<?php echo $borrowrow['id'];?>">Reject</a>
				<?php
				}elseif($borrowrow['b_status'] == 1)
				{
				?>
				<a class="btn btn-primary btn-xs" href="claimitem.php?id=<?php echo $borrowrow['id'];?>">Claim</a>
				<?php
				}elseif($borrowrow['b_status'] == 2)
				{
				?>
				<a class="btn btn-primary btn-xs" href="return_id_confirm.php?id=<?php echo $borrowrow['id'];?>">Return</a> <a class="btn btn-primary btn-xs" href="remindreturn.php?id=<?php echo $borrowrow['id'];?>">Remind</a> 
				<?php
				}elseif($borrowrow['b_status'] == 3){
				?>
				<a class="btn btn-primary btn-xs disabled" href="deleterequest.php?id=<?php echo $borrowrow['id'];?>">Done</a>
				<?php
				}
				?>
				
				</td>
<?php				
				echo "</tr>";
			}
				
	?>
	<tr>
		
	</tr>
	</tbody>
	</table>
	</div>

	<div id="FAList" class="tabcontent">
	<h3>Fixed Assets List</h3>

	<table>
	<tr>
	<td><a href="printfaform.php" class="btn btn-primary btn-xs">Print List</a> <a href='fabarcode.php' target="_blank" class='btn btn-primary btn-xs'>Generate Barcode</a></td>
	<td width="730px"></td> 
	<td>
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon">Search</span>
			<input type="text" name="search_text2" id="search_text2" placeholder="Search by name only" class="form-control">
			</div>
		</div>
	</td>
	<!--
	<td width="860px"></td>
	<td></td> 
	<td>
	<div class="input-group">
		<span class="input-group-addon">Search</span>
		<input type="text" class="form-control" name="searchfa" placeholder="search">
	</td>
	</tr>
	</table>
	-->
	<div class="container">
	<table class="table table-hover">
				<thead>
				<tr>
					<th>Item code</th>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Location</th>
					<th>Person-in-Charge</th>
					<th>Status</th>
					<th>Status Check</th>
				</tr>
			</thead>

			<tbody id="faresult">
				
			</tbody>
				<?php

				/*

				$getfa = mysqli_query($conn, "SELECT * FROM fixedassets WHERE (status = 'functioning' OR status = 'BORROWED') ORDER BY id DESC");
				while($fa_row = mysqli_fetch_array($getfa)){
					echo "<tr>";

					if($fa_row['barcode'] == 0){
						echo "<td><a href='assignnewinfo.php?id=".$fa_row['id']."'>Assign Info</a></td>";
					}else{
						echo "<td>".$fa_row['barcode']."</td>";
					}

					echo "<td>".$fa_row['itemname'];
					if($fa_row['location'] == 'VPA'){
						if($fa_row['permissioncode'] == '1'){
							echo " - available for borrowing";
						}elseif($fa_row['permissioncode'] == '0'){
							echo " - unavailable for borrowing";
						}
					}
					echo "</td>";
					echo "<td>".$fa_row['description']."</td>";
					echo "<td>".$fa_row['quantity']."</td>";
					echo "<td>".$fa_row['location']."</td>";
					echo "<td>".$fa_row['personincharge']."</td>";
					echo "<td>".$fa_row['status']."</td>";
					
					if($fa_row['barcode'] == 0){
						echo "<td>Assign info to empty cells.</td>";
					}else{
						echo "<td><a href='settransfer.php?id=".$fa_row['id']."' class='btn btn-primary btn-xs'>Transfer</a>&nbsp&nbsp<a href='settomalfunctioned.php?id=".$fa_row['id']."' class='btn btn-danger btn-xs'>Malfunctioning</a>&nbsp&nbsp";
						if($fa_row['location'] == 'VPA'){
							echo "<a href='setavailtoborrow.php?id=".$fa_row['id']."' class='btn btn-primary btn-xs'>Set Avail</a></td>";
						}
					}

					echo "</tr>";
				}

				*/
				?>
			</table>
		</div>
	</div>
	
	<div id="FARequest" class="tabcontent">
	<h3>Fixed Assets Request</h3>
	<a href="inputnewfareq.php" class="btn btn-primary btn-xs">Input Request</a> <a href="archivefareq.php" class="btn btn-primary btn-xs">Archive</a><br><br>
	<!--
	<form action="importfareqcsv.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file"> <input type="submit" name="submit" class="submit" value="Import File">
			</form><br>
	-->

	<table class="table table-hover">
				<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Requesting Person</th>
					<th>Request Date</th>
					<th>Status</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$getfa = mysqli_query($conn, "SELECT * FROM fixedassets_request");
				while($fa_row = mysqli_fetch_array($getfa)){
					echo "<tr>";
					echo "<td>".$fa_row['name']."</td>";
					echo "<td>".$fa_row['description']."</td>";
					echo "<td>".$fa_row['quantity']."</td>";
					echo "<td>".$fa_row['requestor_name']."</td>";
					echo "<td>".$fa_row['requesting_date']."</td>";
					echo "<td>".$fa_row['req_status']."</td>";
					echo "</tr>";
				}
				
				?>
				</tbody>
			</table>
	</div>
	
	<div id="FAReceive" class="tabcontent">
	<h3>Fixed Assets Receive</h3>
	<a href="inputnewfarec.php" class="btn btn-primary btn-xs">Input Receive from Request</a> <a href="inputnewfarecdirect.php" class="btn btn-primary btn-xs">Input Direct Receive</a> <a href="archivefarec.php" class="btn btn-primary btn-xs">Archive Receiving List</a><br><br>
	<!--
	<form action="importfareccsv.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="file"> <input type="submit" name="submit" class="submit" value="Import File">
			</form>
	-->
		<div class="container">
		<div class="row">
			<div class="receivingpanel">
				<h4>Receiving Item List</h4>
				<table class="table table-hover">
				<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Requesting Person</th>
					<th>Request Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$getfa = mysqli_query($conn, "SELECT * FROM fixedassets_receive");
				while($fa_row = mysqli_fetch_array($getfa)){
					echo "<tr>";
					echo "<td>".$fa_row['name']."</td>";
					echo "<td>".$fa_row['description']."</td>";
					echo "<td>".$fa_row['quantity']."</td>";
					echo "<td>".$fa_row['receiver_name']."</td>";
					echo "<td>".$fa_row['receiving_date']."</td>";
					echo "</tr>";
				}
				
				?>
				</tbody>
				</table>
				
			</div>
			<div class="unreceivingpanel">
				<h4>Unreceiving Item List</h4>
				<table class="table table-hover">
				<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Requesting Person</th>
					<th>Request Date</th>
					</tr>
				</thead>
				<tbody>
				<?php
				
				$getfa = mysqli_query($conn, "SELECT * FROM fixedassets_unreceive");
				while($fa_row = mysqli_fetch_array($getfa)){
					echo "<tr>";
					echo "<td>".$fa_row['name']."</td>";
					echo "<td>".$fa_row['description']."</td>";
					echo "<td>".$fa_row['quantity']."</td>";
					echo "<td>".$fa_row['person_to_receive']."</td>";
					echo "<td>".$fa_row['posting_date']."</td>";
					echo "</tr>";
				}
				?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>


	<div id="FAArchived" class="tabcontent">
	<h3>Defective Items</h3>
	<table class="table table-hover">
				<thead>
				<tr>
					<th>Barcode</th>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Location</th>
					<th>Person-in-Charge</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$getfamal = mysqli_query($conn, "SELECT * FROM fixedassets WHERE status = 'malfunctioned'");
				while($fam_row = mysqli_fetch_array($getfamal)){
					echo "<tr>";
					echo "<td>".$fam_row['barcode']."</td>";
					echo "<td>".$fam_row['itemname']."</td>";
					echo "<td>".$fam_row['description']."</td>";
					echo "<td>".$fam_row['quantity']."</td>";
					echo "<td>".$fam_row['location']."</td>";
					echo "<td>".$fam_row['personincharge']."</td>";
					echo "<td>".$fam_row['status']."</td>";
					echo "<td><a href='deletemalfunctioned.php?id=".$fam_row['id']."' class='btn btn-primary btn-sm'>Delete</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
			</table>
	</div>

	<div id="SuppList" class="tabcontent">
	
	<h3>Supplies List</h3>

	<table>
	<tr>
	
	<td><a href="printsupplies.php" class="btn btn-primary btn-xs">Print List</a></td>
	<td width="860px"></td> 
	<td>
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon">Search</span>
			<input type="text" name="search_text" id="search_text" placeholder="Search by name only" class="form-control">
			</div>
		</div>
	</td>
	
	<!--
	<td>
	<div class="input-group">
		<span class="input-group-addon">Search</span>
		<input type="text" class="form-control" name="searchsupp" placeholder="search">
	</td>
	</tr>
-->
	</table>
	<div class="container">
	<table class="table table-hover">
		<thead>
				<tr>
					<th>Name and Description</th>
					<th>Classification</th>
					<th>Quantity</th>
					<th>Unit</th>
					<th>Location</th>
					<th>Person-in-charge</th>
					<th>Item code</th>
					<th>Batch No.</th>
					<th>Receiving Date</th>
					<th>Status Check</th>
					</tr>
		</thead>
		<tbody id="suppresult">
				<div></div>

				<?php
				


				/*

				$getlistsup = mysqli_query($conn, "SELECT * FROM supplies");

				while($getlistsuprow = mysqli_fetch_array($getlistsup)){
					if($getlistsuprow['quantity'] <= 5){
						echo "<tr style='background-color: orange;'>";
						echo "<td>".$getlistsuprow['name_desc']."</td>";
						echo "<td>".$getlistsuprow['quantity']."</td>";
						echo "<td>".$getlistsuprow['unit']."</td>";
						echo "<td>".$getlistsuprow['location']."</td>";
						echo "<td>".$getlistsuprow['receivingperson']."</td>";
						echo "<td>".$getlistsuprow['itemcode']."</td>";
						echo "<td>".$getlistsuprow['batchnumber']."</td>";
						echo "<td>".$getlistsuprow['receivingdate']."</td>";

						if($getlistsuprow['location'] == "VPA"){
							echo "<td><a href='transfersupp.php?id=".$getlistsuprow['id']."&name=".$getlistsuprow['name_desc']."&unit=".$getlistsuprow['unit']."&bn=".$getlistsuprow['batchnumber']."&ic=".$getlistsuprow['itemcode']."' class='btn btn-primary btn-xs'>Transfer</a> <a href='consumed.php' class='btn btn-danger btn-xs'>Consumed</a></td>";	
						}else{
							echo "<td><a href='transfersupp.php?id=".$getlistsuprow['id']."&name=".$getlistsuprow['name_desc']."&unit=".$getlistsuprow['unit']."&bn=".$getlistsuprow['batchnumber']."&ic=".$getlistsuprow['itemcode']."' class='btn btn-primary btn-xs disabled'>Transfer</a> <a href='consumed.php' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}

						echo "</tr>";	
					}else{
						echo "<tr>";
						echo "<td>".$getlistsuprow['name_desc']."</td>";
						echo "<td>".$getlistsuprow['quantity']."</td>";
						echo "<td>".$getlistsuprow['unit']."</td>";
						echo "<td>".$getlistsuprow['location']."</td>";
						echo "<td>".$getlistsuprow['receivingperson']."</td>";
						echo "<td>".$getlistsuprow['itemcode']."</td>";
						echo "<td>".$getlistsuprow['batchnumber']."</td>";
						echo "<td>".$getlistsuprow['receivingdate']."</td>";

						if($getlistsuprow['location'] == "VPA"){
							echo "<td><a href='transfersupp.php?id=".$getlistsuprow['id']."&name=".$getlistsuprow['name_desc']."&unit=".$getlistsuprow['unit']."&bn=".$getlistsuprow['batchnumber']."&ic=".$getlistsuprow['itemcode']."' class='btn btn-primary btn-xs'>Transfer</a> <a href='consumed.php' class='btn btn-danger btn-xs'>Consumed</a></td>";	
						}else{
							echo "<td><a href='transfersupp.php?id=".$getlistsuprow['id']."&name=".$getlistsuprow['name_desc']."&unit=".$getlistsuprow['unit']."&bn=".$getlistsuprow['batchnumber']."&ic=".$getlistsuprow['itemcode']."' class='btn btn-primary btn-xs disabled'>Transfer</a> <a href='consumed.php' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}

						
						echo "</tr>";
					}
				}
				
				*/

				?>
				</tbody>
			</table>
		</div>
	


	</div>
	
	<div id="SuppRequest" class="tabcontent">
	<h3>Admin Supplies Request</h3>
	<a href="inputnewsuppreq.php" class="btn btn-primary btn-xs">Input Request</a> <a href="archivesuppreq.php" class="btn btn-primary btn-xs">Archive</a>

	<br>
	<table class="table table-hover">
		<thead>
		</style>
				<tr>
					<th>Name and Description</th>
					<th>Quantity</th>
					<th>Unit</th>
					<th>Requesting Date</th>
					<th>Requesting Person</th>
					<th>Status</th>
				</tr>
		</thead>
		<tbody>
				<?php

				$getsuppreq = mysqli_query($conn, "SELECT * FROM supplies_request");

				while($getreqrow = mysqli_fetch_array($getsuppreq)){
					echo "<tr>";
					echo "<td>".$getreqrow['name_desc']."</td>";
					echo "<td>".$getreqrow['quantity']."</td>";
					echo "<td>".$getreqrow['unit']."</td>";
					echo "<td>".$getreqrow['requesting_date']."</td>";
					echo "<td>".$getreqrow['requestor_name']."</td>";
					echo "<td>".$getreqrow['req_status']."</td>";
					echo "</tr>";
				}

				?>
		</tbody>
			</table>
	
	</div>
	
	<div id="SuppReceive" class="tabcontent">
	<h3>Supplies Receive</h3>
	<a href="inputnewsupprec.php" class="btn btn-primary btn-xs">Input Receive from Request</a> <a href="inputnewsuppdirect.php" class="btn btn-primary btn-xs">Input Direct Receive</a> <a href="archivesupprec.php" class="btn btn-primary btn-xs">Archive Receiving List</a><br><br>
	<div class="container">
	<div class="row">
			<div class="receivingpanel" style="/*background-color: #779fb1;*/">
				<h4>Receiving Item List</h4>
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Name and Description</th>
						<th>Quantity</th>
						<th>Unit</th>
						<th>Receiving Date</th>
						<th>Receiving Person</th>
						</tr>
					</thead>
					<tbody>
					<?php

					$getsupprec = mysqli_query($conn, "SELECT * FROM supplies_receive");

					while($get = mysqli_fetch_array($getsupprec)){
						echo "<tr>";
						echo "<td>".$get['name_desc']."</td>";
						echo "<td>".$get['quantity']."</td>";
						echo "<td>".$get['unit']."</td>";
						echo "<td>".$get['receiving_date']."</td>";
						echo "<td>".$get['receiver_name']."</td>";
						echo "</tr>";
					}

					?>
					</tbody>
				</table>
			</div>

			
			<div class="unreceivingpanel" style="/*background-color: #a1aaaf;*/">
				<h4>Unreceiving Item List</h4>
				<table class="table table-hover">
					<thead>
					<tr>
						<th>Name and Description</th>
						<th>Quantity</th>
						<th>Unit</th>
						<th>Posting Date</th>
						<th>Person to Receive</th>
						</tr>
					</thead>
					<tbody>
					<?php

					$getsuppunrec = mysqli_query($conn, "SELECT * FROM supplies_unreceive");

					while($getget = mysqli_fetch_array($getsuppunrec)){
						echo "<tr>";
						echo "<td>".$getget['name_desc']."</td>";
						echo "<td>".$getget['quantity']."</td>";
						echo "<td>".$getget['unit']."</td>";
						echo "<td>".$getget['posting_date']."</td>";
						echo "<td>".$getget['person_to_receive']."</td>";
						echo "</tr>";
					}

					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>

	</div>

	<div id="DeptRequest" class="tabcontent">
	
	<h3>Department Request for Supplies</h3>
	<a href="archivedeptreq.php" class="btn btn-primary btn-xs">Archive</a>
	<br>
	<table class="table table-hover">
				<thead>
				<tr>
					<th>Name and Description</th>
					<th>Quantity</th>
					<th>Unit</th>
					<th>Purpose</th>
					<th>Requesting Person</th>
					<th>Department</th>
					<th>Date Requested</th>
					<th>Status</th>
					<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$getalldeptreq = mysqli_query($conn, "SELECT * FROM dept_request");

				while ($drow = mysqli_fetch_array($getalldeptreq)) {
					if($drow['id'] == ""){
						echo "No record found.";
					}else{
						echo "<tr>";
						echo "<td>".$drow['name_desc']."</td>";
						echo "<td>".$drow['quantity']."</td>";
						echo "<td>".$drow['unit']."</td>";
						echo "<td>".$drow['purpose']."</td>";
						echo "<td>".$drow['personincharge']."</td>";
						echo "<td>".$drow['dept']."</td>";
						echo "<td>".$drow['daterequested']."</td>";
						if($drow['r_status'] == 0){
							echo "<td>Pending</td>";
							echo "<td><a class='btn btn-primary btn-xs' href='approvesuppreq.php?id=".$drow['id']."'>Approve</a> <a class='btn btn-primary btn-xs' href='rejectsuppreq.php?id=".$drow['id']."'>Reject</a></td>";
						}elseif($drow['r_status'] == 1){
							echo "<td>Approved</td>";
							echo "<td><a class='btn btn-primary btn-xs disabled' href='deletesuppreqrec.php?id=".$drow['id']."'>Done</a></td>";
						}elseif ($drow['r_status'] == 2) {
							echo "<td>Rejected</td>";
							echo "<td><a class='btn btn-primary btn-xs disabled' href='deletesuppreqrec.php?id=".$drow['id']."'>Done</a></td>";
						}
						echo "</tr>";
					}
					
				}

				?>
			</tbody>
			</table>
	</div>
	
	<div id="Excel" class="tabcontent">
	<h3>Physical Inventory</h3>
	
	<table>
	<tr>
		<td>
		<form action="importcsv.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<div class="col-sm-6">
				<input type="file" name="file"> 
			</div>
			<div class="col-sm-4">
				<input type="submit" name="submit" value="Import File" class="btn btn-primary btn-sm">
			</div>
			</div>
			</form>
		</td>
		<td width="400px"></td>
		<td>
		<a href="newinventory.php" class="btn btn-primary btn-xs">New Inventory / Archive</a> <a href="printinventoryform.php" class="btn btn-primary btn-xs">Print Inventory Report</a> <a href="compare.php" class="btn btn-danger btn-xs">Compare</a>
		</td>
	</tr>
	</table>
			<br>
			
			<table class="table table-hover">
				<tr>
					<th>Item code</th>
					<th>Name</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Location</th>
					<th>Person-in-Charge</th>
					<th>Status</th>
					<th>Inventory Date</th>
					<th>Remarks</th>
				</tr>
				<?php
					$display1 = mysqli_query($conn,"SELECT * FROM `physical_inventory`");
						
						while($drow = mysqli_fetch_array($display1)) {
							echo "<tr>";
							echo "<td>".$drow['barcode']."</td>";
							echo "<td>".$drow['name']."</td>";
							echo "<td>".$drow['description']."</td>";
							echo "<td>".$drow['quantity']."</td>";
							echo "<td>".$drow['location']."</td>";
							echo "<td>".$drow['personincharge']."</td>";
							echo "<td>".$drow['status']."</td>";	
							echo "<td>".$drow['inventorydate']."</td>";
							echo "<td>".$drow['remarks']."</td>";
							echo "</tr>";
						}
				?>
			</table>
	</div>
	
	<div id="Person" class="tabcontent">
	<h3>Manage Requesters</h3>
		<a href='personbarcode.php' class='btn btn-primary btn-xs' target="_blank">Generate Barcode</a>
		<table class="table table-hover">
		<thead>
		<tr>
			<th>ID Number</th>
			<th>Name</th>
			<th>Position</th>
			<th>Department</th>
			<th>Email Address</th>
			<th>Contact Number</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		while($picrow = mysqli_fetch_array($p_i_c)){
			echo "<tr>";
			echo "<td>".$picrow['idnum']."</td>";
			echo "<td>".$picrow['name']."</td>";
			echo "<td>".$picrow['position']."</td>";
			echo "<td>".$picrow['dept']."</td>";
			echo "<td>".$picrow['email']."</td>";
			echo "<td>".$picrow['cpnum']."</td>";
		if($picrow['idnum'] == '0'){
			echo "<td>"."<a href='assignbc.php' class='btn btn-primary btn-xs'>Assign Code</a>"."</td>";
		}else{
			echo "<td>"."<a href='deletepic.php?id=".$picrow['id']."' class='btn btn-primary btn-xs'>Remove User</a> "."<a href='editinfo.php?id=".$picrow['id']."' class='btn btn-primary btn-xs'>Show & Edit Info</a>"."</td>";
		}

			echo "</tr>";
			}
		?>
		</tbody>
		</table>
		
	</div>

<?php include 'footer.php'; ?>