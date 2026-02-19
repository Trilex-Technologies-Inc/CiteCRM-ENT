<?php
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH."/core/user.class.php");
     
// Check LIC
require_once(SOAP_PATH.'/nusoap.php');
$company_dir = array_reverse( explode('/',getcwd()) );
$company_dir = $company_dir[0];

$params['customer'] = $company_dir;

$client  = new soapclient('http://www.citecrm.com/help/emp_lic.php');

$result = $client->call('view', array('params' => $params));


if ($client->getError()) {
	print $client->getError();
	if($debug == true) {
        print_r($result);
	} 	
	die;
} else {
	$userObj = new user();
	$num_user = $userObj->load_num_emps();
    $num_emps = $result['num_emps'];
    
    if($num_user >= $num_emps) {
    	$smarty->assign('lic_user',$num_emps);
    	$smarty->assign('num_user',$num_user);
		$smarty->display('user/lic_exceded.tpl');
		die;
	}
    	
}



     // If form Submission
if(isset($_REQUEST['submit']) ) {

	// Conect to smarty validator
	SmartyValidate::connect($smarty);

	// If valid Post Disconect and add new company
	if(SmartyValidate::is_valid($_POST)) {

		SmartyValidate::disconnect();
  
  		require_once(CLASS_PATH."/core/user.class.php");
  		require_once(CLASS_PATH."/core/user_address.class.php");
  		require_once(CLASS_PATH."/core/user_contact.class.php");
  		
  		$userObj 	= new user();
  		$addressObj = new user_address();
  		$contactObj = new user_contact();
  		
  		$first_name				= $_POST['first_name'];
  		$last_name				= $_POST['last_name'];
  		$email					= $_POST['email'];
  		$password				= $_POST['password'];
  		
  		$address_type			= 'Home';
  		$address_street			= $_POST['address_street'];
  		$address_street_2		= $_POST['address_street_2'];
  		$address_city			= $_POST['address_city'];
  		$address_state			= $_POST['address_state'];
  		$address_postal_code	= $_POST['address_postal_code'];
  		$address_country		= COMPANY_COUNTRY;
  		$address_date_create	= time();
  		
  		$phone = $_POST['primary_phone'];
		$secondary_phone = $_POST['secondary_phone'];
		$mobile_phone = $_POST['mobile_phone'];
		$fax = $_POST['fax'];
		$extension = $_POST['extension'];
		
		// Perms
		$perms = 0;
		if($_POST['CAN_READ'] == '1') {
			$perms = $perms + 1;
		}
		if($_POST['CAN_PRINT'] == '2') {
				$perms = $perms +  2;
			}
		if($_POST['CAN_CREATE'] == '4') {
			$perms =  $perms + 4;
		}
		if($_POST['CAN_EDIT'] == '8') {
			$perms =  $perms + 8;
		}
		if($_POST['CAN_DELETE'] == '16') {
			$perms =  $perms + 16;
		}
		if($_POST['CAN_READ_OTHERS'] == '32') {
			$perms =  $perms + 32;
		}
		if($_POST['CAN_EDIT_OTHER'] == '64') {
			$perms =  $perms + 64;
		}
		if($_POST['SUPER_USER'] == '128') {
			$perms = $perms + 128;
		}
		
		
	
		// Save user
		$user_id = $userObj->save_employee($perms,$password,$first_name,$last_name,$email);
		
		// Save Address
		$addressObj->new_address($address_type,$user_id,$address_street,$address_street_2,$address_city,$address_state,$address_postal_code,$address_country,$address_date_create);
	
		// Save Phone
		if( !empty($phone) ) {
			$contactObj->createNewContact($user_id,'Primary Phone',$phone);
		}
		if(!empty($secondary_phone)){
			$contactObj->createNewContact($user_id,'Secondary Phone',$secondary_phone);
		}
		if(!empty($mobile_phone)){
			$contactObj->createNewContact($user_id,'Mobile Phone',$mobile_phone);
		}
		if(!empty($fax)){
			$contactObj->createNewContact($user_id,'FAX',$fax);
		}
		if(!empty($extension)) {
			$contactObj->createNewContact($user_id,'Extension',$extension);
		}
	
		$core->force_page(ROOT_URL.'/index.php?page=user:view_employee&user_id='.$user_id);
	
     }else{

         // error, redraw the form
         $smarty->assign($_POST);
         $smarty->assign('isError','true');
         $smarty->display('user/add_employee.tpl');


     }
     
 } else {

     // Display the Form
	SmartyValidate::connect($smarty, true);

	$smarty->display('user/add_employee.tpl');
}
 
?>
