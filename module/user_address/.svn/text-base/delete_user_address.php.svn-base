<?php
$auth = &new Auth($db, '/index.php?page=user:login_user', 'secret');

require(CLASS_PATH."/core/user_address.class.php");

$address = new user_address();

$address->delete_user_address($_REQUEST);

$core->force_page('/index.php?page=user:view_user');

?>