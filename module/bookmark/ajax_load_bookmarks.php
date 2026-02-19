<?php
//print_r($_POST);
require_once(CLASS_PATH."/core/bookmark.class.php");

$bookmarkObj = new bookmark();

$user_id        = $_POST['user_id'];

$bookmark_type = $_POST['bookmark_type'];

$bookmark_array = $bookmarkObj->load_active_by_user($user_id,$bookmark_type);


$smarty->assign('bookmark_array',$bookmark_array);

$smarty->display('bookmark/ajax_view_bookmarks.tpl');

?>