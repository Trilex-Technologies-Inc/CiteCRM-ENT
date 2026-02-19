<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_workorder.php<br>
* Purpose:  Search Work Order<br>
* 
* @Author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/workorder.class.php');

$workorderObj = new workorder();

$smarty->display('workorder/search_workorder.tpl');

?>