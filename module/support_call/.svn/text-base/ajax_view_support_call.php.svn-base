<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(CAN_READ);
require_once(CLASS_PATH."/core/support_call.class.php");

$support_callObj = new support_call();

$support_call_id = $_POST['support_call_id'];

$support_callObj->load_support_call_by_id($support_call_id);

$smarty->assign('support_callObj',$support_callObj);

$smarty->display('support_call/ajax_view_support_call.tpl');

?>