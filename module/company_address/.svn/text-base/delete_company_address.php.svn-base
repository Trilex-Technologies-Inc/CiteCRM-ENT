<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     delete_company_address.php<br>
 * Purpose:  delete a Single Company Address row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

	require(CLASS_PATH.'/core/company_address.class.php');

	$core->verifyAdmin();

	$company_address = new company_address();

	$company_address->delete_company_address($_REQUEST['company_address_id']);

	$_SESSION['CLEAR_CACHE'] = true;

	$core->force_page("index.php?page=company:view_company&company_id=".$_REQUEST['company_id']);

?>