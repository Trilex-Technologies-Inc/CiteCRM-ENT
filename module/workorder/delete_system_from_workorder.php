<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     delete_system_from_workorder.php<br>
 * Purpose:  Removes system from workorder<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_CREATE);

$system_id			= $_POST['system_id'];

$workorder_id		= $_POST['workorder_id'];


require_once(CLASS_PATH . "/core/system_to_workorder.class.php");

$system_to_workorder = new system_to_workorder();

// clean up products
$system_to_workorderArray = $system_to_workorder->load_product_by_system_workorder($system_id,$workorder_id);

foreach($system_to_workorderArray as $system){
	$system_to_workorder->remove_map($workorder_id,$system->fields['product_id']);
}


// Remove mapping
$system_to_workorder->delete_system_to_workorder($system_id,$workorder_id);




?>