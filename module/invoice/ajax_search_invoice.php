<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_invoice.php<br>
* Purpose:  Search Invoice<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/invoice.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$invoiceObj = new invoice();

$field		= $_POST['field'];
$sort		= $_POST['sort'];
$next 		= $_REQUEST['next'];


// AND
if(!empty($_POST['invoice_id'])) {$and .= " AND invoice_id = " . $db->qstr($_POST['invoice_id']);}
if($_POST['invoice_create_by'] > 0) {$and .= " AND invoice_create_by = " . $db->qstr($_POST['invoice_create_by']);}
if($_POST['invoice_payment_enter_by'] > 0) {$and .= " AND invoice_payment_enter_by = " . $db->qstr($_POST['invoice_payment_enter_by']);}
if(!empty($_POST['invoice_status'])) {$and .= " AND invoice_status = " . $db->qstr($_POST['invoice_status']);}
if(!empty($_POST['invoice_payment_type'])) {$and .= " AND invoice_payment_type = " . $db->qstr($_POST['invoice_payment_type']);}

if($_POST['invoice_create_date'] > 0) {	
	$_os = strtotime($_POST['invoice_create_date']);
	$_oc = strtotime($_POST['invoice_create_date_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));
	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND invoice_create_date >= " . $db->qstr($openStart);
	$and .= " AND invoice_create_date <= " . $db->qstr($openEnd);
}

if($_POST['invoice_due_date'] > 0) {
	$_os = strtotime($_POST['invoice_due_date']);
	$_oc = strtotime($_POST['invoice_due_date_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));
	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND invoice_due_date >= " . $db->qstr($openStart);
	$and .= " AND invoice_due_date <= " . $db->qstr($openEnd);	
}

if($_POST['invoice_paid_date'] > 0) {
	$_os = strtotime($_POST['invoice_paid_date']);
	$_oc = strtotime($_POST['invoice_paid_date_c']);

	$openStart = mktime(0,0,0,date("m",$_os),date("d",$_os),date("Y",$_os));
	$openEnd = mktime(23,59,59,date("m",$_oc),date("d",$_oc),date("Y",$_oc));

	$and .= " AND invoice_paid_date >= " . $db->qstr($openStart);
	$and .= " AND invoice_paid_date <= " . $db->qstr($openEnd);
}


if(empty($field)){$field='lead_id';}
if(empty($sort)){$sort='DESC';}

$_GET['next'] = $next;


// Clear Pagination
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("leads");
}

// Paginate
SmartyPaginate::connect("invoices");

SmartyPaginate::setLimit(15,"invoices");

$start	= SmartyPaginate::getCurrentIndex("invoices");

$limit	= SmartyPaginate::getLimit("invoices");


SmartyPaginate::setUrl('',"invoices",true);

$invoiceArray = $invoiceObj->search_invoice($field,$sort,$and,$start,$limit,&$total);

$smarty->assign('total',$total);


SmartyPaginate::setTotal($total,"invoices"); 

SmartyPaginate::assign($smarty,"paginate","invoices");


$smarty->assign('startItem', SmartyPaginate::getCurrentItem("invoices"));

if(SmartyPaginate::getCurrentItem("invoices") + $limit < $total) {
	$smarty->assign('endItem', SmartyPaginate::getCurrentItem("invoices") + $limit);

} else {
	$smarty->assign('endItem',$total);
}


$smarty->assign('field',$field);

$smarty->assign('sort',$sort);

$smarty->assign('next', $next);




$smarty->assign('invoiceArray', $invoiceArray);

$smarty->display('invoice/ajax_search_invoice.tpl');
?>