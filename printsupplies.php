<?php
	ob_start();
	session_start();
	
	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
		
	$year = date('Y');

		$getsupplies = mysqli_query($conn, "SELECT * FROM supplies");
			
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
						$pdf->Cell(189,5,"LIST OF CONSUMABLE ITEMS - {$year}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',10);
						$pdf->Cell(5,5,"#",1,0,'C');
						$pdf->Cell(15,5,"Batch #",1,0,'C');
						$pdf->Cell(105,5,"Name",1,0,'C');
						$pdf->Cell(35,5,"Department",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(15,5,"Unit",1,1,'C');
						$x=1;
						while($rowsup = mysqli_fetch_array($getsupplies)){
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(5,5,"{$x}",1,0,'C');
							$pdf->Cell(15,5,"{$rowsup['batchnumber']}",1,0,'C');
							$pdf->Cell(105,5,"{$rowsup['name_desc']}",1,0,'C');
							$pdf->Cell(35,5,"{$rowsup['location']}",1,0,'C');
							$pdf->Cell(15,5,"{$rowsup['quantity']}",1,0,'C');
							$pdf->Cell(15,5,"{$rowsup['unit']}",1,1,'C');
							$x++;
							}
						$pdf->output();
?>
