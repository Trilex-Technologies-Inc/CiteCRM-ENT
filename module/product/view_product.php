<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_product.php<br>
* Purpose:  View a Single Products row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

require(CLASS_PATH.'/core/product.class.php');

$product = new product();

$product->view_product($_REQUEST['product_id']);

$smarty->assign('product', $product);

$smarty->assign('parent_id',$_GET['parent_id']);

$smarty->assign('product_id',$_REQUEST['product_id']);

$smarty->assign('category_id',$_REQUEST['category_id']);

$smarty->display('product/view_product.tpl');

?>