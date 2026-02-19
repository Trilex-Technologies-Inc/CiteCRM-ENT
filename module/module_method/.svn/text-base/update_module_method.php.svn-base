<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_module_method.php<br>
 * Purpose:  Update a Single Module Method row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);
	
// Load Classes
require(CLASS_PATH.'/core/module_method.class.php');

require(CLASS_PATH."/core/page_setup.class.php");

// If form Submission
if(isset($_REQUEST['submit']) ) {

	
		
		$module_method = new module_method();
		
		$module_method->update_module_method($_REQUEST);
		
		$core->force_page("index.php?page=module_method:update_module_method&module_method_id=".$_REQUEST['module_method_id']);
		
	
	// Display the Form
} else {
		
	// Istantiate Classes
	$module_method	= new module_method();
	
	$page_setup		= new page_setup();
	
	// Load Module Method
	$module_method->view_module_method($_REQUEST['module_method_id']);
	
	// Load Page Setup
	$page_setup->view_page_setup_by_name($module_method->get_module_method_name());
	

	// Smarty Asignment
	$smarty->assign('module_method', $module_method);
	
	$smarty->assign('page_setup',$page_setup);
	
	// Display the Form Page
	$smarty->display('module_method/update_module_method_frm.tpl');
}
?>