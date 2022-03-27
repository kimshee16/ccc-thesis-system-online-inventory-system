<?php
	$connect = mysqli_connect("localhost", "root", "", "ccc_inventorysystem");
	$output = '';
	$sql = "SELECT * FROM fixedassets ORDER BY id DESC";
	$result = mysqli_query($connect, $sql);
	
	while($row = mysqli_fetch_array($result))
		{
			
				$output .= "<tr>";

					if($row['barcode'] == 0){
						$output .= "<td><a href='assignnewinfo.php?id=".$row['id']."'>Assign Info</a></td>";
					}else{
						$output .= "<td>".$row['barcode']."</td>";
					}

					$output .= "<td>".$row['itemname'];
					if($row['location'] == 'VPA'){
						if($row['permissioncode'] == '1'){
							$output .= " - available for borrowing";
						}elseif($row['permissioncode'] == '0'){
							$output .= " - unavailable for borrowing";
						}
					}
					$output .= "</td>";
					$output .= "<td>".$row['description']."</td>";
					$output .= "<td>".$row['quantity']."</td>";
					$output .= "<td>".$row['location']."</td>";
					$output .= "<td>".$row['personincharge']."</td>";
					$output .= "<td>".$row['status']."</td>";
					
					if($row['barcode'] == 0){
						$output .= "<td>Assign info to empty cells.</td>";
					}else{
						$output .= "<td><a href='settransfer.php?id=".$row['id']."' class='btn btn-primary btn-xs'>M.O.</a>&nbsp&nbsp<a href='settomalfunctioned.php?id=".$row['id']."' class='btn btn-danger btn-xs'>Defective</a>&nbsp&nbsp";
						if($row['location'] == 'VPA'){
							$output .= "<a href='setavailtoborrow.php?id=".$row['id']."' class='btn btn-primary btn-xs'>Set Avail</a></td>";
						}
					}

					$output .= "</tr>";

	}
		echo $output;
	
	
?>