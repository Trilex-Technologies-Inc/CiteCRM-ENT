<?php
$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH."/core/bookmark.class.php");

$bookmarkObj = new bookmark();

$smarty->display('bookmark/load_bookmark_toc.tpl');
?>