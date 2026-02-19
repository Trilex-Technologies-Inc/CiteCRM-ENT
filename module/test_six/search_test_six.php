<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_test_six.php<br>
	* Purpose:  Search Test Six<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/test_six.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('test_six/search_test_six.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('test_six/search_test_six.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=test_six:search_test_six');
	
	$test_six = new test_six();
	$test_sixArray = $test_six->search_test_six();
	$smarty->assign('test_sixArray', $test_sixArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('test_six/search_test_six.tpl');

?>