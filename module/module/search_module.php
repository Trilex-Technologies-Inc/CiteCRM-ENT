<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_module.php<br>
 * Purpose:  Search Module<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);
	
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$module = new module();

// Paginate
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("module");
}

SmartyPaginate::connect("module");
		
SmartyPaginate::setLimit(50,"module");

$start	= SmartyPaginate::getCurrentIndex("module");

$limit	= SmartyPaginate::getLimit("module");

		
SmartyPaginate::setUrl('/?page=module:search_module',"module");
	
$moduleArray = $module->search_module($start,$limit,&$total);
		
SmartyPaginate::setTotal($total,"module");		

$smarty->assign('moduleArray', $moduleArray);
		
SmartyPaginate::assign($smarty,"paginate","module");
		
$smarty->display('module/search_module.tpl');

?>