<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     user_view_system.php<br>
 * Purpose:  View a Single System row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');

require(CLASS_PATH.'/core/system.class.php');
require(CLASS_PATH.'/core/company.class.php');
require(CLASS_PATH.'/core/user.class.php');
require(CLASS_PATH.'/core/bar_code.class.php');
require(CLASS_PATH.'/core/workorder.class.php');
	
$system 		= new System();	
$company 	= new Company();	
$user 		= new User();	
$barcode 	= new Barcode();
$workorder	= new Workorder();
		
$system->view_system($_REQUEST['system_id']);
	
$company->system_to_company($_REQUEST['system_id']);
	
$user->system_to_user($_REQUEST['system_id']);
	
$workorder_array = $workorder->load_by_system($_REQUEST['system_id']);
		
$smarty->assign('system', $system);
	
$smarty->assign('company',$company);
	
$smarty->assign('user',$user);
	
$smarty->assign('workorder_array',$workorder_array);
	
$img = $barcode->draw("SYS".$system->get_system_id(), 'Code39', 'png');

$smarty->display('system/user_view_system.tpl');
	
	