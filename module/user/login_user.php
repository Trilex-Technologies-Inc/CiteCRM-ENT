<?php
require(CLASS_PATH."/core/user.class.php");
$company_dir = array_reverse( explode('/',getcwd()) );

$company_dir = $company_dir[0];

$smarty->assign('company_dir',$company_dir);

$user = new User();

$from = $_GET['from'];

$smarty->assign('from',$from);

if(isset($_REQUEST['submit'])) {

	$auth = &new Auth($db, '', 'secret');
	
	if($_SESSION['SESSION_ADMIN'] == 1) {
		if(!empty($from)) {
			$core->force_page(ROOT_URL.$from);
		} else {
			$core->force_page(ROOT_URL.'/index.php?page=user:my_home');
		}
	} else {
		if(!empty($from)) {
			$core->force_page(ROOT_URL.$from);
		} else {
			$core->force_page(ROOT_URL.'/index.php?page=user:home');
		}
	}

    $core->log_action($_SESSION['SESSION_USER_ID'],'Log In','User Loged In');
	
} else {
	if($_SESSION['SESSION_USER_ID'] > 0 ) {
		$core->force_page('/index.php');
	} else {
		$smarty->display('user/login_user_frm.tpl');
	}
}


?>