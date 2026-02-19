<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_company.php<br>
 * Purpose:  View a Single Company row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_READ);

require(INCLUDE_PATH."/company.conf.php");
require_once(CLASS_PATH.'/core/company.class.php');
		
$company = new company();	
	
$company->view_company($_REQUEST['company_id']);
	
if(isset($_GET['onload'])) {
	$smarty->assign('onload', $_GET['onload']);	
}		
	
// Assign Smarty
$smarty->assign('company', $company);
	
// Display Page
$smarty->display('company/view_company.tpl',$my_cache_id);

$core->log_action($_SESSION['SESSION_USER_ID'],'View','View Company ID #'.$_REQUEST['company_id']);
?>