<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     search_country.php<br>
* Purpose:  Search Country<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/country.class.php');

require(SMARTY_PATH.'/SmartyPaginate.class.php');

// Paginate
SmartyPaginate::connect();
SmartyPaginate::setLimit(50);
SmartyPaginate::setUrl('/?page=country:search_country');

$country = new country();
$countryArray = $country->search_country();
$smarty->assign('countryArray', $countryArray);
SmartyPaginate::assign($smarty);
$smarty->display('country/search_country.tpl');

?>