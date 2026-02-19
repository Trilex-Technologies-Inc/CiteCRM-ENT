<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

if(isset($_POST['submit'])){
	require_once(CLASS_PATH."/core/user.class.php");
	$userObj = new user();
	$code = $_POST['code'];
	$userObj->load_reset_code($code);


		if($userObj->fields['activation_code_expire'] < time()){
			$smarty->assign('errorMsg','The Reset Code has expired.');
			$smarty->display('user/reset_password.tpl');
			} else {
			if($userObj->fields['user_id'] < 1){
				$smarty->assign('errorMsg','The Reset Code is invalid.');
				$smarty->display('user/reset_password.tpl');
			} else {
				if(isset($_POST['password'])){
				    if($_POST['password'] == $_POST['verify_password']){
                            $userObj->reset_password($userObj->fields['user_id'],md5($_POST['password']));
                            $smarty->assign('complete',true);
                            $smarty->display('user/reset_password.tpl');
                    } else {
                        $smarty->assign('errorMsg','The passwords do not match.');
                        $smarty->assign('sucess',true);
                        $smarty->display('user/reset_password.tpl');
                    }
                

				} else {
					$smarty->assign('sucess',true);
					$smarty->display('user/reset_password.tpl');
					
				}
				
								
			}
		}
		

	
	
	
	
} else {
	$code = $_GET['code'];
	$smarty->assign('code',$code);
	$smarty->display('user/reset_password.tpl');
	
}


?>