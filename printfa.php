<?php
	ob_start();
	session_start();
	
	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	
	$year = date("Y");
	$location = $_POST['dept'];
	$typeass = $_POST['typeass'];

	$getfa = mysqli_query($conn, "SELECT * FROM fixedassets WHERE location = '$location' AND description = '$typeass'");
			
		require("fpdf/fpdf.php");
		class PDF extends FPDF {
				function Header(){
					$this->Cell(12);
					$this->Image('assetpics/template.png',10,10,191);
					$this->Cell(12);
					}
				}

						$pdf = new PDF();
						
						$pdf->AddPage();
						
						$pdf->SetFont('Arial','B',14);
						//for header

						/*
						$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						$pdf->SetFont('Arial','B',10);
						$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						*/
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						if($typeass == "equipment"){
							$pdf->Cell(189,5,"LIST OF EQUIPMENTS - {$year}",0,1,'C');
							}else{
								$pdf->Cell(189,5,"LIST OF FURNITURE AND FIXTURES - {$year}",0,1,'C');
							}
						$pdf->Cell(189,5,"{$location}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',10);
						if($typeass == "equipment"){
							$pdf->Cell(95,5,"Equipment",1,0,'C');
							}else{
								$pdf->Cell(95,5,"Furniture and Fixtures",1,0,'C');
							}
						$pdf->Cell(20,5,"Quantity",1,0,'C');
						$pdf->Cell(75,5,"Office / Person",1,1,'C');
						$x=1;
						while($rowfa = mysqli_fetch_array($getfa)){
							$str = $rowfa['location']." - ".$rowfa['personincharge'];
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(95,5,"{$rowfa['itemname']}",1,0,'C');
							$pdf->Cell(20,5,"{$rowfa['quantity']}",1,0,'C');
							$pdf->Cell(75,5,"{$str}",1,1,'C');
							$x++;
							}
						$pdf->output();
?>
