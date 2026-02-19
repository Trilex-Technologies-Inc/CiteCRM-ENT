<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_product.php<br>
 * Purpose:  Add New Products<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/product.class.php');
$product = new product();

$core->verifyAdmin(CAN_CREATE);

// If form Submission
if(isset($_REQUEST['submit']) ) {

		
		$product_sku								= $_REQUEST['product_sku'];
		$product_upc								= $_REQUEST['upcCode'];
		$product_type								= $_REQUEST['product_type'];
		$product_quantity							= $_REQUEST['product_quantity'];
		$product_model								= $_REQUEST['product_model'];
		$product_image								= $_FILES['product_image'];
		$product_price 							= $_REQUEST['product_price'];
		$product_markup							= $_REQUEST['product_markup'];
		$product_virtual 							= $_REQUEST['product_virtual'];
		$product_date_added 						= $_REQUEST['product_date_added'];
		$product_date_available 				= $_REQUEST['product_date_available'];
		$product_weight							= $_REQUEST['product_weight'];
		$product_status							= $_REQUEST['product_status'];
		$tax_class_id								= $_REQUEST['tax_class_id'];
		$manufacture_id							= $_REQUEST['manufacture_id'];
		$product_ordered							= $_REQUEST['product_ordered'];
		$product_quantity_order_min			= $_REQUEST['product_quantity_order_min'];
		$product_quantity_order_units		= $_REQUEST['product_quantity_order_units'];
		$product_priced_by_attribute			= $_REQUEST['product_priced_by_attribute'];
		$product_is_free							= $_REQUEST['product_is_free'];
		$product_is_call							= $_REQUEST['product_is_call'];
		$product_is_always_free_shipping	= $_REQUEST['product_is_always_free_shipping'];
		$product_quantity_order_max			= $_REQUEST['product_quantity_order_max'];
		$product_name								= $_REQUEST['product_name'];
		$product_description					= $_REQUEST['product_description'];
		$product_url								= $_REQUEST['product_url'];
		$category_id								= $_REQUEST['category_id'];

		
		$product_id = $product->add_product($product_sku,$product_upc,$product_type,$product_quantity,$product_model,$product_image,$product_price,$product_markup,$product_virtual,$product_date_added,$product_date_available,$product_weight,$product_status,$tax_class_id,$manufacture_id,$product_ordered,$product_quantity_order_min,$product_quantity_order_units,$product_priced_by_attribute,$product_is_free,$product_is_call,$product_is_always_free_shipping,$product_quantity_order_max,$product_name,$product_description,$product_url,$category_id);
		
		$core->force_page("index.php?page=product:view_product&product_id=".$product_id);
		
		
} else {

	$smarty->display('product/add_product_frm.tpl');
	
}
?>