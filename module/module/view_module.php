<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_module.php<br>
 * Purpose:  View a Single Module Row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);
	
	// Set Cache ID
	$my_cache_id = $_REQUEST['module_id'];

	// If the session is set to clear cache rebuild the cached page
	if($_SESSION['CLEAR_CACHE'] == true) {	

		print "Cache file rebuilt";
	
		$smarty->clear_cache('module/view_module.tpl',$my_cache_id);
	
		$_SESSION['CLEAR_CACHE'] = false;
	
	}

	$smarty->caching = true;

	if(!$smarty->is_cached('user/view_user.tpl',$my_cache_id)) {

		// Load classes
		require_once(CLASS_PATH."/core/module_method.class.php");
		
		require_once(CLASS_PATH."/core/page_setup.class.php");	
		
		
		
		// Istantiate Classes
		$module 				= new module();
	
		$module_method 	= new module_method();
	
		$page_setup 		= new page_setup();
	
		// Load the Module
		$module->view_module($_REQUEST['module_id']);
	
		// Assign Smarty	
		$smarty->assign('page_setup',$page_setup);
		
		$smarty->assign('module_method',$module_method);
	
		$smarty->assign('module', $module);

	}
	
	// Display Page
	$smarty->display('module/view_module.tpl',$my_cache_id);

?>