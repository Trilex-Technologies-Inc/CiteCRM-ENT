<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_manufacture.php<br>
* Purpose:  View a Single Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/manufacture.class.php');

$manufacture = new manufacture();

$manufacture->view_manufacture($_REQUEST['manufacture_id']);

$smarty->assign('manufacture', $manufacture);

$smarty->display('manufacture/view_manufacture.tpl');

?>