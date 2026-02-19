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

//$core->verifyAdmin(CAN_PRINT);

require_once(CLASS_PATH."/core/pdf.class.php");

require_once(CLASS_PATH."/core/invoice.class.php");

require_once(CLASS_PATH."/core/company.class.php");


$pdfObj = new invoice_pdf('P','mm','A4');

$invoiceObj = new invoice();

$invoice_id = $_GET['invoice_id'];

$invoiceObj->view_invoice($invoice_id);

$invoiceObj->load_company_by_invoice($invoice_id);


$company_id = $invoiceObj->fields['company_id'];

$companyObj = new company();

$companyObj->view_company($company_id);
    

$invoiceObj->view_invoice($invoice_id);


if(PDF_PRINTING == '1'){
	$pdfObj->AliasNbPages();
	$pdfObj->AddPage();
	$pdfObj->print_invoice($invoiceObj,$companyObj);
	$pdfObj->Output();
} else {
	print "No HTML Print Yet";	
}
?>