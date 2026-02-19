<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_lead_type.php<br>
* Purpose:  View a Single Lead Types row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/lead_type.class.php');

$lead_type = new lead_type();

$lead_type->view_lead_type($_REQUEST['lead_type_id']);

$smarty->assign('lead_type', $lead_type);

$smarty->display('lead_type/view_lead_type.tpl',$my_cache_id);
?>