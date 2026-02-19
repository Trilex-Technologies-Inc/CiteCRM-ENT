<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_country.php<br>
* Purpose:  delete a Single Country row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/country.class.php');

$country = new country();

$country->delete_country($_REQUEST['country_id']);

$smarty->display('country/delete_country.tpl')

?>