<?php
/**
 * @author 
 * @copyright 2007
*/
$core->verifyAdmin(CAN_CREATE);
$system_id = $_POST['system_id'];

if(isset($_POST['submit'])){

    $error = false;

    if($_FILES['audit_file']['name'] == "") {
        $error = true;
        $errorMsg = "You must provide the XML file from Win Audit";
    }
    if($_FILES['audit_file']['type'] != 'text/xml') {
        $error = true;
        $errorMsg = "The file must be an XML";
    }
    
    if($error) {

        $smarty->assign('system_id', $system_id);
        $smarty->assign('error','true');
        $smarty->assign('errorMsg',$errorMsg);
        $smarty->display('system/ajax_add_system_audit.tpl');
    } else {
        $uploadfile =  ROOT_PATH."/system_audit/".$system_id.".xml";
        if(!move_uploaded_file($_FILES['audit_file']['tmp_name'], $uploadfile)) {           
            $error = true;
            $errorMsg = "There was a problem saving the file";
            $smarty->assign('system_id', $system_id);
            $smarty->assign('error','true');
            $smarty->assign('errorMsg',$errorMsg);
            $smarty->display('system/ajax_add_system_audit.tpl');          
         } else {
            $core->force_page(ROOT_URL.'/index.php?page=system:view_system&system_id='.$system_id);
         }   
    }

} else {	
	$smarty->assign('system_id', $system_id);
	$smarty->display('system/ajax_add_system_audit.tpl');	
}
?>