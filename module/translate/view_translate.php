<?php
/**  
 *
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_translate.php<br>
 * Purpose:  Displays a single Users Details<br>
 * 
 * @author jaimie@citesoftware.com
 * @access Public
 * @version 1.0
*/

	$core->verifyAdmin();

	$my_cache_id = $_REQUEST['module_id'];
	
	// If the session is set to clear cache rebuild the cached page
	if($_SESSION['CLEAR_CACHE'] == true) {	

		print "Cache file rebuilt";
	
		$smarty->clear_cache('translate/view_translate.tpl', $my_cache_id);
	
		$_SESSION['CLEAR_CACHE'] = false;
	
	}

	$smarty->caching = true;

	$smarty->clear_cache('translate/view_translate.tpl', $my_cache_id);

	// If we do not have a cached file build the page
	if(!$smarty->is_cached('translate/view_translate.tpl', $my_cache_id)) {
	
		require_once(CLASS_PATH."/core/translate.class.php");
	
		$translate = new Translate();
	
		$translate_array = $translate->load_translate_by_module($_REQUEST['module_id']);
	
		$smarty->assign('translate_array',$translate_array);
	
	}
	
	$smarty->display('translate/view_translate.tpl', $my_cache_id);

?>