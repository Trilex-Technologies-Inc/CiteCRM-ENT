<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_country.php<br>
* Purpose:  View a Single Country row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/country.class.php');

$country = new country();

$country->view_country($_REQUEST['country_id']);

$smarty->assign('country', $country);

$smarty->display('country/view_country.tpl');

?>