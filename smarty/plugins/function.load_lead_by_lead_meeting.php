<?php

/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */
function smarty_function_load_lead_by_lead_meeting($params, &$smarty) {

    require_once(CLASS_PATH."/core/lead_meeting.class.php");

    $lead_meetingObj = new lead_meeting();
        

    $lead_meetingObj->load_lead_by_lead_meeting($params['lead_meeting_id']);

    $smarty->assign('lead_meetingObj',$lead_meetingObj);
   
   

}
?>