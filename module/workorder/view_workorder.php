<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_workorder.php<br>
 * Purpose:  View a Single Work Order row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(CAN_READ);

	// Vars
	$workorder_id 			= $_REQUEST['workorder_id'];
	$company_address_type	= "BILLING";
	$user_address_type		= "Home";
	$bar_code_type			= "Code39";
	$bar_code_img_type		= "png";


	// Load Requires
	require(CLASS_PATH.'/core/workorder.class.php');
	require(CLASS_PATH."/core/company.class.php");
	require(CLASS_PATH."/core/company_address.class.php");
	require(CLASS_PATH."/core/user.class.php");
	require(CLASS_PATH."/core/user_address.class.php");
	require(CLASS_PATH.'/core/bar_code.class.php');
	
	
	$workorder 				= new workorder();	
	$barcode 				= new Barcode();


	$workorder->view_workorder($workorder_id);

	// Set Edit Status
	if($workorder->get_workorder_status() != 5 
			&& $workorder->get_workorder_status() != 6 
			&& $workorder->get_workorder_status() != 7) {
    	$smarty->assign('edit',1);
	}else{
		$smarty->assign('edit',0);
	}


	

	// Company	
	$company = new company();
	$company_address = new Company_Address();

	$company->load_company_by_workorder($workorder_id);	

	$company_address->load_by_company_id_and_type($company->get_company_id(),'Service');
	$smarty->assign('company', 	$company);
	$smarty->assign('company_address', 	$company_address);
	$smarty->assign('company_id',$company->get_company_id());	

	// User
	$user = new user();
	$user_address = new user_address();
	$user->load_user_by_workorder($workorder_id);
	
	if($user->getUserID() > 0 ) {
		$user_address->loadByAddressType($user_address_type,$accountID,$user->getUserID());
		$smarty->assign('user',$user);
		$smarty->assign('user_address',$user_address);
		$smarty->assign('user_id',$user-> getUserID());
	} 
	
	
	
	// Load Arrays for smarty
	$img = $barcode->draw("WRD".$workorder_id, $bar_code_type, $bar_code_img_type);
	

	// Assign to smarty
	$smarty->assign('workorder',$workorder);
	

	// Display The page
	$smarty->display('workorder/view_workorder.tpl');

?>