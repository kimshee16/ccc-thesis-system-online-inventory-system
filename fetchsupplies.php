<?php
	$connect = mysqli_connect("localhost", "root", "", "ccc_inventorysystem");
	$output = '';
	$output2 = '';
	$sql = "SELECT * FROM supplies WHERE name_desc LIKE '%".$_POST['search']."%'";
	$result = mysqli_query($connect, $sql);
	if(mysqli_num_rows($result) > 0)
	{
	
		while($row = mysqli_fetch_array($result))
		{
			if($row['quantity'] <= 5){
					$output .= "
						<tr style='background-color: orange;'>
						<td>".$row['name_desc']."</td>
						<td>".$row['classification']."</td>
						<td>".$row['quantity']."</td>
						<td>".$row['unit']."</td>
						<td>".$row['location']."</td>
						<td>".$row['receivingperson']."</td>
						<td>".$row['itemcode']."</td>
						<td>".$row['batchnumber']."</td>
						<td>".$row['receivingdate']."</td>
						";
						if($row['location'] == 'VPA'){
							$output .= "
							<td><a href='transfersupp.php?id=".$row['id']."&name=".$row['name_desc']."&unit=".$row['unit']."&bn=".$row['batchnumber']."&ic=".$row['itemcode']."' class='btn btn-primary btn-xs'>M.O.</a> <a href='consumed.php?id=".$row['id']."' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}else{
							$output .= "
							<td><a href='transfersupp.php?id=".$row['id']."&name=".$row['name_desc']."&unit=".$row['unit']."&bn=".$row['batchnumber']."&ic=".$row['itemcode']."' class='btn btn-primary btn-xs disabled'>M.O.</a> <a href='consumed.php?id=".$row['id']."' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}

						$output .= "
						</tr>";

					}else{
						$output .= "
						<tr>
						<td>".$row['name_desc']."</td>
						<td>".$row['classification']."</td>
						<td>".$row['quantity']."</td>
						<td>".$row['unit']."</td>
						<td>".$row['location']."</td>
						<td>".$row['receivingperson']."</td>
						<td>".$row['itemcode']."</td>
						<td>".$row['batchnumber']."</td>
						<td>".$row['receivingdate']."</td>
						";
						if($row['location'] == 'VPA'){
							$output .= "
							<td><a href='transfersupp.php?id=".$row['id']."&name=".$row['name_desc']."&unit=".$row['unit']."&bn=".$row['batchnumber']."&ic=".$row['itemcode']."' class='btn btn-primary btn-xs'>M.O.</a> <a href='consumed.php?id=".$row['id']."' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}else{
							$output .= "
							<td><a href='transfersupp.php?id=".$row['id']."&name=".$row['name_desc']."&unit=".$row['unit']."&bn=".$row['batchnumber']."&ic=".$row['itemcode']."' class='btn btn-primary btn-xs disabled'>M.O.</a> <a href='consumed.php?id=".$row['id']."' class='btn btn-danger btn-xs'>Consumed</a></td>";
						}
						$output .= "
						</tr>";
						}
		}
		echo $output;
	
	}else
	{
		echo "No data found.";
		/*
		$sql2 = "SELECT * FROM supplies";
		$result2 = mysqli_query($connect, $sql2);
		while($row2 = mysqli_fetch_array($result2))
		{
			$output2 .= "
				<tr>
					<td>".$row2['name_desc']."</td>
					<td>".$row2['quantity']."</td>
					<td>".$row2['unit']."</td>
					<td>".$row2['location']."</td>
					<td>".$row2['receivingperson']."</td>
					<td>".$row2['itemcode']."</td>
					<td>".$row2['batchnumber']."</td>
					<td>".$row2['receivingdate']."</td>
				</tr>
			";
		}
		echo $output2;
		*/
	}
?>