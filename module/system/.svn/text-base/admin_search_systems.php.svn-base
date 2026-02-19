<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     admin_search_system.php<br>
 * Purpose:  Search System<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

require(CLASS_PATH.'/core/system.class.php');
require(SMARTY_PATH.'/SmartyPaginate.class.php');

$core->verifyAdmin();

$system = new system();

$system_id = substr($_REQUEST['upcCode'], 3);

$smarty->assign('upcCode',$_REQUEST['upcCode']);

// Paginate
if(!isset($_REQUEST["next"])) {
	SmartyPaginate::disconnect("system");
}

SmartyPaginate::connect("system");

SmartyPaginate::setLimit(50,"system");

SmartyPaginate::setUrl('/?page=system:search_system',"system");

$start	= SmartyPaginate::getCurrentIndex("system");

$limit	= SmartyPaginate::getLimit("system");


$systemArray = $system->admin_search_system($system_id,$start,$limit,&$total);

$smarty->assign('systemArray', $systemArray);

SmartyPaginate::setTotal($total,"system"); 

SmartyPaginate::assign($smarty,"paginate","system");


$smarty->display('system/search_system.tpl');

?>



?>