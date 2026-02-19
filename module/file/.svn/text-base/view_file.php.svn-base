<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_file.php<br>
	* Purpose:  View a Single Files row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/file.class.php');

	$core->verifyAdmin();
// Set Cache ID
$my_cache_id = $_REQUEST['file_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('file/view_file.tpl',$my_cache_id);
$smarty->clear_cache('file/search_file.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('file/view_file.tpl',$my_cache_id)) {
		$file = new file();

	$file->view_file($_REQUEST['file_id']);

	$smarty->assign('file', $file);

}
$smarty->display('file/view_file.tpl',$my_cache_id);

?>