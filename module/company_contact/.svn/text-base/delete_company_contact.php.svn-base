<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_company_contact.php<br>
	* Purpose:  delete a Single Company Contact row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/company_contact.class.php');

	$core->verifyAdmin();

$company_contact = new company_contact();

$company_contact->delete_company_contact($_REQUEST['company_contact_id']);

$smarty->display('company_contact/delete_company_contact.tpl')

?>