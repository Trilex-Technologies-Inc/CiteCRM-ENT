<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     search_note.php<br>
	* Purpose:  Search Notes<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/note.class.php');

require(SMARTY_PATH.'/SmartyPaginate.class.php');

// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
	$smarty->clear_cache('note/search_note.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('note/search_note.tpl')) {
		// Paginate
		SmartyPaginate::connect();
		SmartyPaginate::setLimit(50);
		SmartyPaginate::setUrl('/?page=note:search_note');
	
	$note = new note();
	$noteArray = $note->search_note();
	$smarty->assign('noteArray', $noteArray);
	SmartyPaginate::assign($smarty);
}
	$smarty->display('note/search_note.tpl');

?>