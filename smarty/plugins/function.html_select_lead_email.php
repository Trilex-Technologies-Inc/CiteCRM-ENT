<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_function_html_select_lead_email($params, &$smarty) {
	require_once(CLASS_PATH."/core/lead.class.php");
    require_once(CLASS_PATH."/core/user.class.php");

	$leadObj = new lead();

    $userObj = new user();
	
	$lead_id = $params['lead_id'];
	
	$emailArray = $leadObj->load_lead_email_address($lead_id);

    $userEmailArray = $userObj->load_by_company_id($lead_id,'user_id','ASC',$start=0,$limit=0,&$total);
	
	$html ="<select name=\"email_address\" id=\"email_address\">\n";
	
	foreach($emailArray as $email){
		if($email['email_address'] != '' && $email['email_name'] !=''){
			$html .="<option value=\"".$email['email_address']."\">".$email['email_name']." [".$email['email_address']."]</option>";
		}		
	}

    foreach($userEmailArray as $userEmail){
        $html .="<option value=\"".$userEmail->getUserEmail()."\">".$userEmail->getUserFirstName()." " . $userEmail->getUserLastName()." [".$userEmail->getUserEmail()."]</option>";
    }
	
	$html .= "</select>";
	
	return $html;
	
}

?>