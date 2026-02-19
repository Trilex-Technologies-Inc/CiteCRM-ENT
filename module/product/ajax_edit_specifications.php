<?php
$core->verifyAdmin(CAN_EDIT);
require_once(CLASS_PATH."/core/product.class.php");

$productObj = new product();

if(isset($_POST['submit'])) {

} else {

    $product_id = $_GET['product_id'];

    $productObj->view_product($product_id);

    $smarty->assign('productObj', $productObj);

    $smarty->display('product/ajax_edit_specifications.tpl');
}
?>