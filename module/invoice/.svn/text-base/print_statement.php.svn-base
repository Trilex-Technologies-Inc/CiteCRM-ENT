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

require_once(CLASS_PATH."/core/pdf.class.php");

require_once(CLASS_PATH."/core/invoice.class.php");


$pdfObj = new statement_pdf('P','mm','A4');

$invoiceObj = new invoice();

$account_type = "company_id";

$account_type_id = $_GET['company_id'];

$statementArray = $invoiceObj->load_invoice_items($account_type,$account_type_id);


if(PDF_PRINTING == '1'){
	$pdfObj->AliasNbPages();
	$pdfObj->AddPage();
	$pdfObj->print_statement($statementArray,$account_type,$account_type_id);
	$pdfObj->Output();
} else {
	print "No HTML Print Yet";	
}
?>