<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_part_by_upc.php<br>
 * Purpose:  Add New Work Order<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_CREATE);

$workorder_id	= $_REQUEST['workorder_id'];
$system_id		= $_REQUEST['system_id'];
$product_upc	= $_REQUEST['product_upc'];
$qty				= $_REQUEST['qty'];

require(CLASS_PATH.'/core/workorder.class.php');

require(CLASS_PATH.'/core/product.class.php');

$workorder = new workorder();
	
$product = new Product();

$product->load_by_upc($product_upc);



if($product->fields['product_id'] > 0 ) {

	$product_id = $product->get_product_id();

	$workorder->add_product_to_workorder($product_id,$workorder_id,$qty);
	
	if($system_id > 0) {
		require_once(CLASS_PATH . "/core/system.class.php");
			
		$systemObj = new System();
		
		$systemObj->map_product_to_system($system_id,$product_id,$qty,$workorder_id);
	} 

	$core->force_page('/index.php?page=workorder:view_workorder&workorder_id='.$workorder_id);
	
} else {
	$core->force_page('/index.php?page=workorder:view_workorder&workorder_id='.$workorder_id.'&errorMsg=No product was found for UPC '.$product_upc);
}
?>