<?php
	/*
	$personincharge = $_SESSION['name'];
	$itemborrowed = $_POST['itemborrowed'];
	$itemcode = "0";
	$quantity = $_POST['quantity'];
	$reason = $_POST['reason'];
	$idnum = "0";
	$daterequested = date("Y-m-d h:i:sa");
	$dateapproved = "0000-00-00";
	$dateclaimed = "0000-00-00";
	$datereturned = "0000-00-00";
	$status = "0";
	$approvedby = "none";

	if($quantity > 1){
		header("Location: requesterboard.php?reqerr=Only one item at a time. More than 1 item is prohibited!");
	}else{
		//Check if the user has a current requested/approved/claimed item.
		$checkuser = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge='$personincharge' AND (b_status='0' OR b_status='1' OR b_status='2')");
		$checkuserrow = mysqli_fetch_array($checkuser);

		if(!$checkuserrow['personincharge'] == ""){
			header("Location: requesterboard.php?reqerr=You have a current item request. Only one item at a time.");
		}else{
			//Check if the item requesting had currently requested by other user.
			$checkitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND (b_status='0' OR b_status='1' OR b_status='2')");
			$checkitemrow = mysqli_fetch_array($checkitem);

			if(!$checkitemrow['itemborrowed'] == ""){
				header("Location: requesterboard.php?reqerr=The item you requesting is already requested by other account. Sorry.");
			}else{
				$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
									
				mysqli_close($conn);
				header("Location: requesterboard.php");
			}

		}
	

	}
	*/















	/*
	if(!$checkemptyrow['personincharge'] == ""){

		//Check kung may nirequest na yung tao.
		$check0 = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND b_status='0'");
		$check0row = mysqli_fetch_array($check0);

		if (!$check0row['personincharge']){
			header("Location: requesterboard.php?reqerr=The item is already requested!");
		}else{
			//Check kung may approved item yung tao.
			$check1 = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND b_status='1'");
			$check1row = mysqli_fetch_array($check1);

			if(!$check1row['personincharge']){
				header("Location: requesterboard.php?reqerr=The item is already requested!");
			}else{
				//Check kung may claimed item yung tao.
				$check2 = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND b_status='2'");
				$check2row = mysqli_fetch_array($check2);

				if(!$check2row['personincharge']){
					header("Location: requesterboard.php?reqerr=Please wait until the specific item is returned!");
				}else{
					//Check kung may binalik nang item yung tao. Dun lang papasok ang request nung account person.
					$check3 = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND b_status='3'");
					$check3row = mysqli_fetch_array($check3);

					if(!$check3row['personincharge']){
						if($quantity > 1){
							header("Location: requesterboard.php?reqerr2=More than 1 item is prohibited. Sorry.");
						}else{
							$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
								
							mysqli_close($conn);
							header("Location: requesterboard.php");
						}
					}else{
						header("Location: requesterboard.php?reqerr=The item is already requested!");
					}

				}
			}
		}

		

	}else{
		if($quantity > 1){
			header("Location: requesterboard.php?reqerr2=More than 1 item is prohibited. Sorry.");
		}else{
			$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
								
			mysqli_close($conn);
			header("Location: requesterboard.php");
		}
	}

	*/



	/*
	$personincharge = $_SESSION['name'];

	$checkempty = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge='$personincharge'");
	$checkrow = mysqli_fetch_array($checkempty);

	if(!$checkrow['personincharge'] == ""){
			
			if($checkrow['b_status'] == '0'){
				mysqli_close($conn);
				header("Location: requesterboard.php?reqerr=Requesting more than 1 item is prohibited!");		
			}elseif($checkrow['b_status'] == '1'){
				mysqli_close($conn);
				header("Location: requesterboard.php?reqerr=Requesting more than 1 item is prohibited!");
			}elseif($checkrow['b_status'] == '2'){
				mysqli_close($conn);
				header("Location: requesterboard.php?reqerr=Please return the current borrowed item before request other item!");
			}elseif($checkrow['b_status'] == '3'){
				$itemborrowed = $_POST['itemborrowed'];
				$itemcode = "0";
				$quantity = $_POST['quantity'];
				$reason = $_POST['reason'];
				$idnum = "0";
				$daterequested = date("Y-m-d h:i:sa");
				$dateapproved = "0000-00-00";
				$dateclaimed = "0000-00-00";
				$datereturned = "0000-00-00";
				$status = "0";
				$approvedby = "none";
				
				if($quantity > 1){
					header("Location: requesterboard.php?reqerr2=More than 1 item is prohibited. Sorry.");
				}else{
					$checkspecitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed = '$itemborrowed' AND b_status = '3'");
					$checkspecitemrow = mysqli_fetch_array($checkspecitem);
					
					if(!$checkspecitemrow['itemborrowed'] == ""){
						$checkifborrow = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed = '$itemborrowed' AND b_status = '0'");	

						while($checkifborrowrow = mysqli_fetch_array($checkifborrow)){
							if($checkifborrowrow['b_status'] == '0'){
								echo "Bwisit!<br>";	
							}else{echo "Kim";}
							
							elseif($checkifborrowrow['b_status'] == '1'){
								echo "Bwisit ka din!<br>";
							}elseif($checkifborrowrow['b_status'] == '2'){
								echo "Bwisit ka din talaga!<br>";
							}elseif($checkifborrowrow['b_status'] == '3'){
							
								}
						}

						
						
							$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
							mysqli_close($conn);
							header("Location: requesterboard.php");
							
							
					}else{
						mysqli_close($conn);
						header("Location: requesterboard.php?reqerr2=The specific item to be borrowed is already reserved. Sorry.");
						}
				}
			}

		}else{
				$itemborrowed = $_POST['itemborrowed'];
				$itemcode = "0";
				$quantity = $_POST['quantity'];
				$reason = $_POST['reason'];
				$idnum = "0";
				$daterequested = date("Y-m-d h:i:sa");
				$dateapproved = "0000-00-00";
				$dateclaimed = "0000-00-00";
				$datereturned = "0000-00-00";
				$status = "0";
				$approvedby = "none";
				
				$checkspecitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed = '$itemborrowed'");

				$checkspecitemrow = mysqli_fetch_array($checkspecitem);

				if($checkspecitemrow['itemborrowed'] == ""){
					
					$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
					mysqli_close($conn);
					header("Location: requesterboard.php");
					
					}else{
						
						mysqli_close($conn);
						header("Location: requesterboard.php?reqerr2=The specific item to be borrowed is already reserved. Sorry.");
					}
					
				
			}			
	
*/

include 'header2.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$personincharge = $_SESSION['name'];
	$itemborrowed = $_POST['item'];
	$itemcode = "0";
	$quantity = $_POST['quantity'];
	$reason = $_POST['reason'];
	$idnum = "0";
	$daterequested = date("Y-m-d h:i:sa");
	$dateapproved = "0000-00-00";
	$dateclaimed = "0000-00-00";
	$datereturned = "0000-00-00";
	$status = "0";
	$approvedby = "none";
	$dateneeded = $_POST['dateneeded'];


	mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateneeded, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateneeded', '$dateapproved', 'none', '$dateclaimed', '$datereturned', '0')");
	mysqli_close($conn);
	header("Location: requesterboard.php?done=1");



	/*
	if($quantity > 1){
		header("Location: requesterboard.php?reqerr=Only one item at a time. More than 1 item is prohibited!");
	}else{
		//Check if the user has a current requested/approved/claimed item.
		$checkuser = mysqli_query($conn, "SELECT * FROM borrowitem WHERE personincharge='$personincharge' AND (b_status='0' OR b_status='1' OR b_status='2')");
		$checkuserrow = mysqli_fetch_array($checkuser);

		if(!$checkuserrow['personincharge'] == ""){
			header("Location: requesterboard.php?reqerr=You have a current item request. Only one item at a time.");
		}else{
			//Check if the item requesting had currently requested by other user.
			$checkitem = mysqli_query($conn, "SELECT * FROM borrowitem WHERE itemborrowed='$itemborrowed' AND (b_status='0' OR b_status='1' OR b_status='2')");
			$checkitemrow = mysqli_fetch_array($checkitem);

			if(!$checkitemrow['itemborrowed'] == ""){
				header("Location: requesterboard.php?reqerr=The item you requesting is already requested by other account. Sorry.");
			}else{
				$sendrequest = mysqli_query($conn, "INSERT INTO borrowitem (itemborrowed, itemcode, quantity, reason, personincharge, idnum, daterequested, dateapproved, approvedby, dateclaimed, datereturned, b_status) VALUES ('$itemborrowed', '$itemcode', '$quantity', '$reason', '$personincharge', '$idnum', '$daterequested', '$dateapproved', '$approvedby', '$dateclaimed', '$datereturned', '$status')");
									
				mysqli_close($conn);
				header("Location: requesterboard.php");
			}

		}
	

	}
	*/

}

?>
<br>
<div class="container">
	<h3>Equipment Borrow Request</h3><br>
</div>
<div class="container">

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
	<input type="hidden" name="item" value="<?php echo $_GET['item']; ?>">
	<input type="hidden" name="quantity" value="<?php echo $_GET['q']; ?>">
	<div class="form-group">
	<div class="col-sm-6"> 
	<label for="date" class="control-label col-sm-4">Date needed:</label>
	<input class="form-control" type="date" name="dateneeded"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<label for="date" class="control-label col-sm-8">Reason (write it eligibly):</label>
	<input class="form-control" type="text" name="reason"><br><br>
	</div>
	</div>

	<div class="form-group">
	<div class="col-sm-6">
	<input type="submit" value="Submit" class="btn btn-primary">
	</div>
	</div>

</form>	


</div>
</body>
</html>	
