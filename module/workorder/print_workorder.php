<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     print_workorder.php<br>
 * Purpose:  print Work Order<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_PRINT);

// Load Requires
require(CLASS_PATH."/core/workorder.class.php");
require(CLASS_PATH."/core/workorder_note.class.php");
require(CLASS_PATH."/core/company.class.php");
require(CLASS_PATH."/core/company_address.class.php");
require(CLASS_PATH."/core/company_contact.class.php");
require(CLASS_PATH."/core/system.class.php");
require(CLASS_PATH."/core/product.class.php");
require(CLASS_PATH.'/core/workorder_time.class.php');
require(CLASS_PATH.'/core/bar_code.class.php');
require(ROOT_PATH.'/custom/wo_disclaimer.php');


// Your PDF CLASS that extends FPDF. For personalised and custom workorder PDF's contact Cite CRM for more details. We can custom make any layout you whish.
require_once(CLASS_PATH."/core/pdf.class.php");

$workorder 				= new workorder();	
$workorder_note 		= new workorder_note();
$company				= new company();
$company_address		= new company_address();
$company_contact		= new company_contact();
$system 				= new System();
$product				= new Product();
$workorder_time			= new workorder_time();
$barcode				= new Barcode();
	
$workorder_id   = $_REQUEST['workorder_id'];
$company_id     = $_REQUEST['company_id'];


$workorder->view_workorder($workorder_id);

$company->view_company($company_id);

if(DISPLAY_COMPANY_LOGO == 1) {
    $display_logo = true;
} else {
    $display_logo = false;
}

if(PDF_PRINTING == '1'){	
	$pdfObj = new workorder_pdf('P','mm','A4');
	$pdfObj->AliasNbPages();
	$pdfObj->AddPage();
	$pdfObj->load_info($company,$workorder,$company_address,$company_contact,$workorder_time,$product,$system,$workorder_note,$barcode,$display_logo);		
	$pdfObj->Output();
} else {
	print "No HTML Print Yet";
	
}




?>