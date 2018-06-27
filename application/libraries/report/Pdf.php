<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2010-08-08
//
// Description : Example 011 for TCPDF class
//               Colored Table
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */
if ( ! defined('IN_CDT')) exit('No direct script access allowed');
require_once('eng.php');
require_once('tcpdf.php');

// extend TCPF with custom functions
class PDF extends TCPDF {

 	public function export($title, $data, $fileName, $arrayWidth, $isDownload = true){
 		// create new PDF document
		$pdf = new self(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		
		// set document information
		$pdf->SetFont("dejavusans", "", 9);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
				
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 
	
		$pdf->setLanguageArray($l);
		
		// ---------------------------------------------------------
		$pdf->AddPage();
				
		// print colored table
		$pdf->ColoredTable($data, $arrayWidth);
		
		// ---------------------------------------------------------
		
		//Close and output PDF document
		$pdf->Output($fileName, 'D');
		
		//============================================================+
		// END OF FILE                                                
		//============================================================+
 	}
    // Colored table
    public function ColoredTable($data, $arrayWidth) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        
        $header = $data[1];
        $num_headers = count($header);
        for($i = 1; $i <= $num_headers; ++$i) {
            $this->Cell($arrayWidth[$i], 8, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        unset($data[1]);
        foreach($data as $row) {
        	$k = 1; 
        	foreach ($row as $value){
        		$w = $arrayWidth[$k];
	            $this->Cell($w, 6, $value, 'LR', 0, 'L', $fill);
	            $totalW += $w;       
	            $k++;
        	} 
        	$this->Ln();
	        $fill=!$fill;   
        }
        $this->Cell($totalW, 0, '', 'T');
    }
}


