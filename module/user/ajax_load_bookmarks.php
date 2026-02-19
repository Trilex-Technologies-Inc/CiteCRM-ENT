<?php
$core->verifyAdmin(CAN_READ);

require_once(CLASS_PATH."/core/bookmark.class.php");
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$bookmarkObj = new bookmark();

	print "ajax_load_bookmarks";
?>