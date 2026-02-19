<?php



if(isset($_POST['Submit'])) {

	require_once(CLASS_PATH."/core/lead.class.php");

	$leadObj 			= new lead();

	$lead_id				= $_POST['lead_id'];

	$leadObj->load_by_id($lead_id);

	$company_id				= $leadObj->get_company_id();

	$company_type		= 'Non-Contract';

	$leadObj->convert($company_id,$company_type);

	$leadObj->convert_lead($lead_id);

} else {


	$smarty->display('leads/convert.tpl');

}




?>