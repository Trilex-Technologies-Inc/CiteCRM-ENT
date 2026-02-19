<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_user_to_company.php<br>
	* Purpose:  Add New User To Company<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/user_to_company.class.php');
require(CLASS_PATH.'/core/user.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$core->verifyAdmin();

$smarty->caching=false;

// If form Submission
if(isset($_REQUEST['submit']) ) {
   	
        $user_id = $_REQUEST['user_id'];
        
        $company_id = $_REQUEST['company_id'];
        
        $user_to_company = new user_to_company();
        	   
    
        // Validate User        
        if(!$user_to_company->validate_user_to_company($user_id,$company_id)) {

            $core->force_page("index.php?page=user_to_company:add_user_to_company&company_id=$company_id&errorOccurred=true&errorMSG=User Already Assigned to this Company!","user");

        } else {

            $user_to_company_id = $user_to_company->add_user_to_company($user_id,$company_id);
        
        
            $core->force_page("index.php?page=company:view_company&company_id=".$company_id);
        }
 

} else {

	$user = new User();
	
	// Paginate
    if(!isset($_REQUEST["next"])) {
        SmartyPaginate::disconnect("user");
    }

	SmartyPaginate::connect("user");

    SmartyPaginate::setLimit(50,"user");


	SmartyPaginate::setUrl('index.php?page=user_to_company:add_user_to_company&company_id='.$_REQUEST['company_id'],"user");


    $start	= SmartyPaginate::getCurrentIndex("user");

    $limit	= SmartyPaginate::getLimit("user");


	$userArray = $user->loadAllUsers($start,$limit,&$total);

	$smarty->assign('userArray', $userArray);

	SmartyPaginate::assign($smarty,"paginate","user");

    SmartyPaginate::setTotal($total,"user"); 

	
	
	$smarty->display('user_to_company/add_user_to_company_frm.tpl');
}
?>