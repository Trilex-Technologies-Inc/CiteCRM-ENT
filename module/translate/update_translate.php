<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     update_translate.php<br>
 * Purpose:  Displays a single Users Details<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin();
		
require_once(CLASS_PATH."/core/translate.class.php");
	
$translate = new Translate();
	
$translate_array = $translate->load_translate_by_module($_REQUEST['module_id']);
	
$smarty->assign('translate_array',$translate_array);
	
	
	if(isset($_REQUEST['submit']) ) {
	
	
			$translate->update_translate($_REQUEST);
			
			$core->force_page("index.php?page=translate:view_translate&module_id=" . $_REQUEST['module_id']);
			
	
	
	} else {
	
	
		SmartyValidate::connect($smarty, true);
		
		SmartyValidate::register_form('update_translate');
	
		$smarty->display('translate/update_translate.tpl');
		
	}

	
	

?>