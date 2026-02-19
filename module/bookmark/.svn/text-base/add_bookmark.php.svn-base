<?php
$core->verifyAdmin(CAN_CREATE);

require_once(CLASS_PATH."/core/bookmark.class.php");

$bookmarkObj = new bookmark();

$user_id                = $_POST['user_id'];
$bookmark_type          = $_POST['bookmark_type'];
$bookmark_description   = $_POST['bookmark_description'];
$bookmark_type_id       = $_POST['bookmark_type_id'];

$bookmarkObj->add_bookmark($user_id,$bookmark_type,$bookmark_description,$bookmark_type_id);

?>