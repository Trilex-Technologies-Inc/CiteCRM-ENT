<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_note.php<br>
* Purpose:  View a Single Notes row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/note.class.php');

// Set Cache ID
$my_cache_id = $_REQUEST['note_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('note/view_note.tpl',$my_cache_id);
$smarty->clear_cache('note/search_note.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('note/view_note.tpl',$my_cache_id)) {
		$note = new note();

	$note->view_note($_REQUEST['note_id']);

	$smarty->assign('note', $note);

}
$smarty->display('note/view_note.tpl',$my_cache_id);

?>