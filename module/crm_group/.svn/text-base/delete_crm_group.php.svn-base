<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_crm_group.php<br>
	* Purpose:  delete a Single Group row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/crm_group.class.php');

	$core->verifyAdmin();

$crm_group = new crm_group();

$crm_group->delete_crm_group($_REQUEST['crm_group_id']);

$smarty->display('crm_group/delete_crm_group.tpl')

?>