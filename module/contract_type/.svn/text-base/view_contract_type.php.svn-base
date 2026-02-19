<?php
/**
* Type:     Cite CMS PHP Page<br>
	* Name:     view_contract_type.php<br>
	* Purpose:  View a Single Contract Type row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/contract_type.class.php');

	
// Set Cache ID
$my_cache_id = $_REQUEST['contract_type_id'];
// If the session is set to clear cache rebuild the cached page
if($_SESSION['CLEAR_CACHE'] == true) {
	print "Cache file rebuilt";
$smarty->clear_cache('contract_type/view_contract_type.tpl',$my_cache_id);
$smarty->clear_cache('contract_type/search_contract_type.tpl');
	$_SESSION['CLEAR_CACHE'] = false;
}
$smarty->caching = true;
// If we do not have a cached file build the page
if(!$smarty->is_cached('contract_type/view_contract_type.tpl',$my_cache_id)) {
		$contract_type = new contract_type();

	$contract_type->view_contract_type($_REQUEST['contract_type_id']);

	$smarty->assign('contract_type', $contract_type);

}
$smarty->display('contract_type/view_contract_type.tpl',$my_cache_id);

?>