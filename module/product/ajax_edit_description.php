<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/product_description.class.php");

$product_descriptionObj = new product_description();

if(isset($_POST['submit'])) {

    $product_name           = $_POST['product_name'];
    $product_description    = $_POST['product_description'];
    $product_url            = $_POST['product_url'];
    $product_description_id = $_POST['product_description_id'];

    $product_descriptionObj->update_product_description($product_description_id,$product_url,$product_description,$product_name);

    $core->log_action($_SESSION['SESSION_USER_ID'],'Edit','Edit Product Description #'.$product_description_id);

} else {


    $product_id = $_GET['product_id'];

    $product_descriptionObj->load_by_product_id($product_id);

    $smarty->assign('product_descriptionObj',$product_descriptionObj);

    $smarty->display('product/ajax_edit_description.tpl');
}

?>