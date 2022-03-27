<?php
	ob_start();
	session_start();
	
	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

	$dept = $_POST['dept'];
		$year = $_POST['year'];
		$sem = $_POST['sem'];
		$begin = $year."-01-01";
		$end = $year."-12-31";

		$getcons = mysqli_query($conn, "SELECT * FROM suppliesconsumption WHERE location = '$dept' AND sem = '$sem' AND (issuingdate BETWEEN '$begin' AND '$end')");

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
						$pdf->Cell(189,5,"CONSUMPTION OF OFFICE SUPPLIES {$year}",0,1,'C');
						$pdf->Cell(189,5,"{$dept}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',10);
						$pdf->Cell(55,5,"Name",1,0,'C');
						$pdf->Cell(45,5,"Quantity",1,0,'C');
						$pdf->Cell(45,5,"Date Issued",1,0,'C');
						$pdf->Cell(45,5,"Receiving Person",1,1,'C');
						$x=1;
						while($rowsup = mysqli_fetch_array($getcons)){
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(55,5,"{$rowsup['name_desc']}",1,0,'C');
							$pdf->Cell(45,5,"{$rowsup['quantity']}",1,0,'C');
							$pdf->Cell(45,5,"{$rowsup['issuingdate']}",1,0,'C');
							$pdf->Cell(45,5,"{$rowsup['personincharge']}",1,1,'C');
							$x++;
							}
						$pdf->output();
?>