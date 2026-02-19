<?php
$core->verifyAdmin(CAN_CREATE);

require(CLASS_PATH.'/core/alert.class.php');
require(CLASS_PATH."/core/user.class.php");

$userObj    = new user();
$alertObj   = new alert();

if(isset($_POST['submit'])) { 

    $alert_start_date   = mktime(0,0,0,$_POST['start_dateMonth'], $_POST['start_dateDay'],$_POST['start_dateYear']);
    $alert_end_date     = mktime(23,59,59,$_POST['end_dateMonth'], $_POST['end_dateDay'],$_POST['end_dateYear']);

    $alert_subject      = $core->prepare_post($_POST['alert_subject']);
    $alert_text         = $core->prepare_post($_POST['alert_text']);
    $alert_active       = '1';

    $alert_id = $alertObj->save_new_alert($alert_start_date,$alert_end_date,$alert_subject,$alert_text,$alert_active);

    // All employees
    if(isset($_POST[all_employees])) {
        $employee_array = $userObj->load_employees('user_last_name','ASC',"AND user_status='Active'",0, 0, &$total);

        foreach($employee_array as $employee) {
            $alertObj->map_alert_to_user($alert_id,$employee->getUserID(),0,0);
        }

    } else {
        // Tag selected employees
        foreach($_POST['employees'] as $user_id) {
            $alertObj->map_alert_to_user($alert_id,$user_id,0,0);
        }
    }

    $smarty->assign($_POST);
    
    $smarty->display('alert/alert_added.tpl');
    
	$core->force_page(ROOT_URL."/index.php?page=user:my_home");

} else {

    $employee_array = $userObj->load_employees('user_last_name','ASC',"AND user_status='Active'",0, 0, &$total);

    $smarty->assign('employee_array',$employee_array);

    $smarty->display('alert/create_new.tpl');
}

?>