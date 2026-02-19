<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_lead_type.php<br>
* Purpose:  delete a Single Lead Types row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/lead_type.class.php');

$lead_type = new lead_type();

$lead_type->delete_lead_type($_POST['lead_type_id']);

?>