<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_test_six.php<br>
	* Purpose:  View a Single Test Six row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
	
	print_r($_REQUEST);

	require(CLASS_PATH.'/core/test_six.class.php');

	$core->verifyAdmin();
	
	// Set Cache ID
	$my_cache_id = $_REQUEST['test_six_id'];
	
	// If the session is set to clear cache rebuild the cached page
	if($_SESSION['CLEAR_CACHE'] == true) {
		print "Cache file rebuilt";
		$smarty->clear_cache('test_six/view_test_six.tpl',$my_cache_id);
		$_SESSION['CLEAR_CACHE'] = false;
	}
	
	$smarty->caching = true;
	
	// If we do not have a cached file build the page
	if(!$smarty->is_cached('test_six/view_test_six.tpl',$my_cache_id)) {
		$test_six = new test_six();

		$test_six->view_test_six($_REQUEST['test_six_id']);

		$smarty->assign('test_six', $test_six);

	}
	
	$smarty->display('test_six/view_test_six.tpl',$my_cache_id);

?>