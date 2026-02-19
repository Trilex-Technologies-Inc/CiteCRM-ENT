<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_workorder_status.php<br>
* Purpose:  Search Workorder Status<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/workorder_status.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

// Paginate
SmartyPaginate::connect();
SmartyPaginate::setLimit(50);
SmartyPaginate::setUrl('/?page=workorder_status:search_workorder_status');

$workorder_status = new workorder_status();
$workorder_statusArray = $workorder_status->search_workorder_status();
$smarty->assign('workorder_statusArray', $workorder_statusArray);
SmartyPaginate::assign($smarty);
$smarty->display('workorder_status/search_workorder_status.tpl');

?>