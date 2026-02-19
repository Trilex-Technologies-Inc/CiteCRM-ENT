<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_system_model.php<br>
	* Purpose:  View a Single System Module row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/system_model.class.php');

	$core->verifyAdmin();
	$system_model = new system_model();

$system_model->view_system_model($_REQUEST['system_model_id']);

$smarty->assign('system_model', $system_model);

$smarty->display('system_model/view_system_model.tpl');

?>