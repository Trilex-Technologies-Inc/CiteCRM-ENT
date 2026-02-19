<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     delete_product_from_workorder.php<br>
 * Purpose:  Removes a product from a workorder<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_CREATE);

require_once(CLASS_PATH . "/core/workorder.class.php");


$product_id 	= $_POST['product_id'];

$workorder_id 	= $_POST['workorder_id'];


$workorderObj = new Workorder();

$workorderObj->delete_product_from_workorder($product_id,$workorder_id);

$workorderObj->delete_product_from_system($product_id,$workorder_id);

?>