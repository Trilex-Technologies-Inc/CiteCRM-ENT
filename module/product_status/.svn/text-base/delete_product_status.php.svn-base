<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_product_status.php<br>
* Purpose:  delete a Single Product Status row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/product_status.class.php');

$product_status = new product_status();

$product_status->delete_product_status($_REQUEST['product_status_id']);

$smarty->display('product_status/delete_product_status.tpl')

?>