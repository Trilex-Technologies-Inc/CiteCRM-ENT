<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_module.php<br>
 * Purpose:  Update a Single Module  row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

// Verify Admin account
$core->verifyAdmin(SUPER_USER);

require_once(CLASS_PATH."/core/module_method.class.php");

$module_method = new module_method();

$module = new module();

// If form Submission
if(isset($_REQUEST['submit']) ) {

		
	$module->update_module($_REQUEST);
	
	$core->force_page("index.php?page=module:update_module&module_id=".$_REQUEST['module_id']);

} else {

	
	$module->view_module($_REQUEST['module_id']);
	
	$smarty->assign('module',$module);
	
	$smarty->assign('module_method',$module_method);
	
	$smarty->display("module/update_module_frm.tpl");
	
}

?>