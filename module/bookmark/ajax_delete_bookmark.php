<?php

require_once(CLASS_PATH."/core/bookmark.class.php");

$bookmarkObj = new bookmark();

$user_id = $_POST['user_id'];

$bookmark_id = $_POST['bookmark_id'];


if($user_id == $_SESSION['SESSION_USER_ID']) {
    $bookmarkObj->delete_bookmark($bookmark_id);
}


?>