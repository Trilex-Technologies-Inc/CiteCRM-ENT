<?php
$core->verifyAdmin(SUPER_USER);
if(isset($_POST['submit'])) {
    require_once(CLASS_PATH."/core/service.class.php");
    $serviceObj = new service();
    $service_name   = $_POST['service_name'];
    $service_amount = $_POST['service_amount'];
    $service_active = $_POST['service_active'];
    $serviceObj->add_service($service_name,$service_amount,$service_active);
} else {
    $smarty->display('service/ajax_add_service_frm.tpl');
}
?>