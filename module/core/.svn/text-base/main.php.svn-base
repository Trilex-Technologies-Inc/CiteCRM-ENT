<?php
/** main.php */
session_destroy();
$_SESSION = array();
setcookie(session_name(), '', time()-42000, '/');


$core->force_page(ROOT_URL."/index.php?page=user:login_user");

//$smarty->display('core/main.tpl');



?>