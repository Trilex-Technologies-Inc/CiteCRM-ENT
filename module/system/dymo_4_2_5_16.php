<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH.'/core/system.class.php');
require_once(CLASS_PATH."/core/fpdf.class.php");
require_once(CLASS_PATH.'/core/bar_code.class.php');
define('FPDF_FONTPATH', ROOT_PATH.'/include/font/'); 

$systemObj 	= new System();	

$barCodeObj = new Barcode();

$pdfObj = new FPDF('P','mm','A4');

$system_id = $_REQUEST['system_id'];

$systemObj->view_system($system_id);

$img = ROOT_PATH."/images/barcode/SYS".$systemObj->get_system_id().".png";



$pdfObj->AddPage();
$pdfObj->SetAutoPageBreak('on');
$pdfObj->SetTopMargin(0);
$pdfObj->SetLeftMargin(0);

$pdfObj->SetFont('Times');
$pdfObj->rect(2,2,112,66);
$pdfObj->SetXY(3,7);
$pdfObj->Cell(112,0,SITE_NAME,0,0,'C',0,0);
$pdfObj->SetXY(3,15);
$pdfObj->Cell(112,0,COMPANY_STREET_1,0,0,'C',0,0);
$pdfObj->SetXY(3,23);
$pdfObj->Cell(112,0,COMPANY_CITY ." ".COMPANY_STATE.", ".COMPANY_POSTAL_CODE,0,0,'C',0,0);
$pdfObj->SetXY(3,31);
$pdfObj->Cell(112,0,"For Service and Repair Call ". COMPANY_PHONE,0,0,'C',0,0);

$pdfObj->Image($img,42,40,0);
$pdfObj->SetXY(3,62);
$pdfObj->SetFont('Times','',8);
$pdfObj->Cell(112,0,"(C) 2007 Cite CRM www.citecrm.com ",0,0,'C',0,0);

$pdfObj->Output();



?>