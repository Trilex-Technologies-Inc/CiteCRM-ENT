<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_file.php<br>
	* Purpose:  Search Files<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/file.class.php');
	require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('file/search_file.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('file/search_file.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl(ROOT_URL.'/index.php?page=file:search_file');
	
	$file = new file();
	$fileArray = $file->search_file();
	$smarty->assign('fileArray', $fileArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('file/search_file.tpl');

?>