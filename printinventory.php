<?php
	ob_start();
	session_start();
	
	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}
	
	$span = $_POST['span'];

	$type = $_POST['type'];
	if($_POST['month'] == "January"){
		$month = 1;
	}elseif($_POST['month'] == "February"){
		$month = 2;
	}elseif($_POST['month'] == "March"){
		$month = 3;
	}elseif($_POST['month'] == "April"){
		$month = 4;
	}elseif($_POST['month'] == "May"){
		$month = 5;
	}elseif($_POST['month'] == "June"){
		$month = 6;
	}elseif($_POST['month'] == "July"){
		$month = 7;
	}elseif($_POST['month'] == "August"){
		$month = 8;
	}elseif($_POST['month'] == "September"){
		$month = 9;
	}elseif($_POST['month'] == "October"){
		$month = 10;
	}elseif($_POST['month'] == "November"){
		$month = 11;
	}elseif($_POST['month'] == "December"){
		$month = 12;
	}else{
		$month = "none";
	}

	$year = $_POST['year'];

	if($type == "Annual"){
		$firstmonth = 1;
		$firstday = 1;
		$initialtime = "00:00:00";
		$dateset = date($year."-".$firstmonth."-".$firstday);

		$datefortest = date_create($dateset);
		date_modify($datefortest, "+364days");
		$firstdayget = date_format($datefortest, "d");

		if($firstdayget == 31){
			$dateleap = date_create($dateset);
			date_modify($dateleap, "+364days");
			$leapyear = date_format($dateleap, "Y-m-d");
			
			$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$dateset' AND '$leapyear'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' ANNUAL INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$dateset} to {$leapyear}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

		}else{
			$dateleap = date_create($dateset);
			date_modify($dateleap, "+365days");
			$leapyear = date_format($dateleap, "Y-m-d");
			
			$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$dateset' AND '$leapyear'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' ANNUAL INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$dateset} to {$leapyear}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();
					}
				}elseif($type == "Monthly") {
				$day = 1;
				$initialtime = "00:00:00";
				$monthlydateset = date($year."-".$month."-".$day);
				
				if($month == 1){
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif($month == 2){
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+28days");
					$lytest = date_format($firstday, "d");

					if($lytest == 29){
						$firstday = date_create($monthlydateset);
						date_modify($firstday, "+28days");
						$enddate = date_format($firstday, "Y-m-d");

						$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();


					}else{
						$firstday = date_create($monthlydateset);
						date_modify($firstday, "+27days");
						$enddate = date_format($firstday, "Y-m-d");

						$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
						require("fpdf/fpdf.php");
		
						$pdf = new FPDF();
						
						class PDF extends FPDF {
				function Header(){
					$this->Cell(12);
					$this->Image('assetpics/template.png',10,10,191);
					$this->Cell(12);
					}
				}
		
						$pdf = new PDF();
						
						$pdf->AddPage();

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();
					}
				}elseif($month == 3){
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();
						
				}elseif ($month == 4) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+29days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 5) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 6) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+29days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 7) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 8) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 9) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+29days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 10) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 11) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+29days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();

				}elseif ($month == 12) {
					$firstday = date_create($monthlydateset);
					date_modify($firstday, "+30days");
					$enddate = date_format($firstday, "Y-m-d");

					$getphysical = mysqli_query($conn, "SELECT * FROM physical_inventory WHERE inventorydate BETWEEN '$monthlydateset' AND '$enddate'");
			
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

						//$pdf->Image('watermarkCCC.png',10,10,189);
						
						$pdf->SetFont('Arial','B',14);
						//for header
						//$pdf->Cell(189,5,'CITY COLLEGE OF CALAMBA',0,1,'C');
						//$pdf->SetFont('Arial','B',10);
						//$pdf->Cell(189,5,'Old Municipal Hall, Poblacion, Calamba City, Laguna 4027',0,1,'C');
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',12);
						$pdf->Cell(189,5,' MONTHLY INVENTORY REPORT',0,1,'C');
						$pdf->Cell(189,5," As of {$monthlydateset} to {$enddate}",0,1,'C');
						//for spacer
						
						$pdf->Cell(59,5,'',0,1);
						$pdf->Cell(59,5,'',0,1);
						$pdf->SetFont('Arial','B',9);
						$pdf->Cell(20,5,"Item Code",1,0,'C');
						$pdf->Cell(60,5,"Name",1,0,'C');
						$pdf->Cell(15,5,"Quantity",1,0,'C');
						$pdf->Cell(25,5,"Room",1,0,'C');
						$pdf->Cell(35,5,"In-charge",1,0,'C');
						$pdf->Cell(20,5,"Status",1,0,'C');
						$pdf->Cell(17,5,"Date",1,1,'C');
						while($rowphy = mysqli_fetch_array($getphysical)){
							$ndstring = $rowphy['name']."-".$rowphy['description'];

							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['barcode']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(60,5,"{$ndstring}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(15,5,"{$rowphy['quantity']}",1,0,'C');
							$pdf->SetFont('Arial','',6);
							$pdf->Cell(25,5,"{$rowphy['location']}",1,0,'C');
							$pdf->SetFont('Arial','',7);
							$pdf->Cell(35,5,"{$rowphy['personincharge']}",1,0,'C');
							$pdf->SetFont('Arial','',8);
							$pdf->Cell(20,5,"{$rowphy['status']}",1,0,'C');
							$pdf->Cell(17,5,"{$rowphy['inventorydate']}",1,1,'C');
						}
						$pdf->output();
				}
			
			} elseif ($type == "Semi-annual") {

				echo "Waaaaaahhhhhh";
			}
?>
