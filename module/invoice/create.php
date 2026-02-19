<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/


require_once(CLASS_PATH."/core/invoice.class.php");
require_once(CLASS_PATH."/core/invoice_labor.class.php");
require_once(CLASS_PATH."/core/invoice_part.class.php");
require_once(CLASS_PATH."/core/workorder.class.php");

$labor_total 	= 0;
$product_total	= 0;
$invoice_total  = 0;

$workorder_id	= $_REQUEST['workorder_id'];
$invoice_id		= $_REQUEST['invoice_id'];
$company_id		= $_REQUEST['company_id'];

$pices = explode('-',$_POST['invoice_due_date']);

$due_date = mktime(0,0,0,$pices[0],$pices[1],$pices[2]);

$invoice = new invoice();

	// Create Invoice
	$invoice_create_date		= time();
	$invoice_create_by			= $_SESSION['SESSION_USER_ID'];
	$invoice_due_date			= $due_date;
	$invoice_amount				= '0.00';
	$invoice_discount_amount	= $_REQUEST['invoice_discount_amount'];
	$invoice_total_amount		= '0.00';
	$invoice_status				= 'Un-Paid';
	$invoice_paid_date			= '0';
	$invoice_paid_amount		= '0.00';
	$invoice_payment_type		= '0';
	$invoice_barcode			= '';
	$invoice_payment_enter_by	= '0';
	$invoice_memo				= $_REQUEST['invoice_memo'];
	
$invoice_id = $invoice->add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);

// Map to workorder
$invoice->map_workorder($invoice_id,$workorder_id);
	
// Map Company
if($company_id > 0 ) {
	$invoice->map_company($invoice_id,$company_id);
}

if($user_id > 0 ) {
	$invoice->map_user($invoice_id,$user_id);
}

	// Labor
	$count = 0;
	if(!empty($_REQUEST['labor_hours'])) {
		foreach ($_REQUEST['labor_hours'] as $labor_hours) {
		
			$invoice_labor = new invoice_labor();
		
			$sub_total = $labor_hours * $_REQUEST['billing_rate'][$count];
		
			// Add Labor
			$invoice_labor_hours			= $labor_hours;
			$invoice_labor_rate				= $_REQUEST['billing_rate'][$count];
			$invoice_labor_description	    = $_REQUEST['labor_description'][$count];
			$invoice_labor_sub_total		= $sub_total;
		
			$invoice_labor->add_invoice_labor($invoice_id,$invoice_labor_hours,$invoice_labor_rate,$invoice_labor_description,$invoice_labor_sub_total);
		
			// Calc total	
			$labor_total = $labor_total + $sub_total;
			
			$count++;
		}
	}
	
	// Parts
	$count = 0;
	if(!empty($_REQUEST['product_id'])) {
		foreach ($_REQUEST['product_id'] as $product_id) {
			
			$invoice_part = new invoice_part();
			
			$sub_total = $_REQUEST['product_amount'][$count] * $_REQUEST['product_qty'][$count];
			
			// Add Parts
			$product_id					= $_REQUEST['product_id'][$count];
			$invoice_part_qty			= $_REQUEST['product_qty'][$count];
			$invoice_part_amount	    = $_REQUEST['product_amount'][$count];
			$invoice_part_sub_total	    = $sub_total;
			
			$invoice_part->add_invoice_part($invoice_id,$product_id,$invoice_part_qty,$invoice_part_amount,$invoice_part_sub_total);
			
			// Calc Product total
			$product_total = $product_total + $sub_total;
			
			
			$count++;
		}
	}
	
	// Generate Barcode
	//$img = $barcode->draw("INV".$invoice_id, 'Code39', 'png');
	
	// Invoice Calcs and re save

	$invoice_subtotal = $labor_total + $product_total;

	$invoice_shipping_amount = $_POST['invoice_shipping_amount'];

	$invoice_discount_amount =  $core->n_round($_POST['invoice_discount_amount'] * .01, 2);

	$invoice_total = $invoice_subtotal + $invoice_shipping_amount;
	
	$discount = $invoice_total * $invoice_discount_amount;
	
	$invoice_total_amount = $invoice_total - $discount;	
	
	// Tax Rates	

	$invoice_create_date		= time();
	$invoice_create_by			= $_SESSION['SESSION_USER_ID'];
	$invoice_due_date			= $due_date;
	$invoice_amount				= $invoice_subtotal;
	$invoice_discount_amount	= $discount;
	$invoice_status				= 'Un-Paid';
	$invoice_paid_date			= '0';
	$invoice_paid_amount		= '0.00';
	$invoice_payment_type		= '0';
	$invoice_barcode			= '';
	$invoice_payment_enter_by	= '0';
	$invoice_memo				= $_REQUEST['invoice_memo'];
	
	$invoice->update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo);
	
	
	
	// Set work order to awaiting Payment
	$workorder = new workorder();
	$workorder->set_waiting_for_payment($workorder_id);
	
	// Add Resolution
	if(!empty($_REQUEST['workorder_close_by'])) {
		$workorder_close_date	= mktime(0,0,0,$_REQUEST['closeDateMonth'],$_REQUEST['closeDateDay'],$_REQUEST['closeDateYear']);
		$workorder_close_by		= $_REQUEST['workorder_close_by'];
		$workorder_resolution	= $_REQUEST['workorder_resolution'];
		
		$workorder->set_resolution($workorder_id,$workorder_close_date,$workorder_close_by,$workorder_resolution);
	}

    $core->force_page('/index.php?page=invoice:view_invoice&invoice_id='.$invoice_id);


//print $invoice_sub_total;

?>