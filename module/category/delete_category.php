<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_category.php<br>
	* Purpose:  delete a Single Category row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/category.class.php');

	$core->verifyAdmin();

$category = new category();

$category->delete_category($_REQUEST['category_id']);

$smarty->display('category/delete_category.tpl')

?>