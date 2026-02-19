<?php



require(CLASS_PATH.'/core/category.class.php');

$category = new category();
	
$smarty->caching = false;

$parentID = $_REQUEST['parent_id'];

$categoryArray = $category->loadParent($parentID, $total);

$smarty->assign('categoryArray', $categoryArray);

$smarty->display('category/loadAjaxSubCategory.tpl');

?>