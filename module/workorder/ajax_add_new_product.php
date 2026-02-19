<?php
$core->verifyAdmin(CAN_CREATE);


require_once(CLASS_PATH."/core/workorder.class.php");
require_once(CLASS_PATH."/core/product.class.php");
require_once(CLASS_PATH."/core/system.class.php");


$workorderObj = new workorder();
$productObj = new product();
$systemObj = new system();


$workorder_id = $_POST['workorder_id'];

$workorderObj->view_workorder($workorder_id);

$systemArray = $workorderObj->load_assigned_systems($workorder_id);


if(isset($_POST['submit'])) {


    $workorder_id                   = $_POST['workorder_id'];
    $upcCode                        = $_POST['upcCode'];
    $category_id                    = $_POST['category_id'];
    $product_sku                    = $_POST['product_sku'];
    $manufacturer_id                = $_POST['manufacture_id'];
    $product_model                  = $_POST['product_model'];
    $product_name                   = $_POST['product_name'];
    $product_status                 = $_POST['product_status'];
    $product_description            = $core->prepare_post($_POST['product_description']);
    $product_is_call                = $_POST['product_is_call'];
    $product_price                  = $_POST['product_price'];
    $product_markup                 = $_POST['product_markup'];
    $product_priced_by_attribute    = $_POST['product_priced_by_attribute'];
    $product_quantity               = $_POST['product_quantity'];
    $product_quantity_order_min     = $_POST['product_quantity_order_min'];
    $product_quantity_order_max     = $_POST['product_quantity_order_max'];
    $product_virtual                = $_POST['product_virtual'];
    $product_ordered                = $_POST['product_ordered'];
    $product_quantity_order_units   = $_POST['product_quantity_order_units'];
    $product_is_always_free_shipping= $_POST['product_is_always_free_shipping'];
    $product_weight                 = $_POST['product_weight'];
    $product_date_added             = $_POST['product_date_added'];
    $product_date_available         = $_POST['product_date_available'];
    $product_url                    = $_POST['product_url'];
    
  

    // Add New Product
    $product_id = $productObj->add_product($product_sku,$product_upc,$product_type,$product_quantity,$product_model,$_FILES,$product_price,$product_markup,$product_virtual,$product_date_added,$product_date_available,$product_weight,$product_status,$tax_class_id,$manufacturer_id,$product_ordered,$product_quantity_order_min,$product_quantity_order_units,$product_priced_by_attribute,$product_is_free,$product_is_call,$product_is_always_free_shipping,$product_quantity_order_max,$product_name,$product_description,$product_url,$category_id);

    // Add Product TO work Order
    $product_to_workorder_description = $product_description;
    $qty = $_POST['qty'];
    $product_to_workorder_amount = $product_price + $product_markup;
    $product_to_workorder_sub_total = $product_to_workorder_amount * $qty;
    
    
    $workorderObj->add_product_to_workorder($product_id,$workorder_id,$product_to_workorder_description,$qty,$product_to_workorder_amount,$product_to_workorder_sub_total);
    
    
    //Map Product to System
    $system_id = $_POST['system_id'];
    if($system_id > 0) {
        $systemObj->map_product_to_system($system_id,$product_id,$qty,$workorder_id);
    }

    $core->force_page('index.php?page=workorder:view_workorder&workorder_id='.$workorder_id);

} else {
    $smarty->assign('workorder_id',$workorder_id);

    $smarty->assign('systemArray',$systemArray);

    $smarty->display('workorder/ajax_add_new_product.tpl');
}
?>