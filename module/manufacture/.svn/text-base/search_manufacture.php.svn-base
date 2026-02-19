<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_manufacture.php<br>
* Purpose:  Search Manufacture<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/manufacture.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('manufacture/search_manufacture.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('manufacture/search_manufacture.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=manufacture:search_manufacture');
	
	$manufacture = new manufacture();
	$manufactureArray = $manufacture->search_manufacture();
	$smarty->assign('manufactureArray', $manufactureArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('manufacture/search_manufacture.tpl');

?>