<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_system.php<br>
 * Purpose:  View a Single System row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/system.class.php');

require(CLASS_PATH.'/core/company.class.php');

require(CLASS_PATH.'/core/user.class.php');
	
$system 	= new System();	

$company 	= new company();
	
$user 		= new User();	

$system->view_system($_REQUEST['system_id']);
	
$company->system_to_company($_REQUEST['system_id']);
	
$user->system_to_user($_REQUEST['system_id']);

$smarty->assign('system', $system);
	
$smarty->assign('company',$company);
	
$smarty->assign('company_id', $company->get_company_id());

$smarty->assign('user',$user);
	


$smarty->display('system/view_system.tpl');
?>