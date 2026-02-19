<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_system_manufacture.php<br>
* Purpose:  View a Single System Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/system_manufacture.class.php');

$system_manufacture = new system_manufacture();

$system_manufacture->view_system_manufacture($_REQUEST['system_manufacture_id']);

$smarty->assign('system_manufacture', $system_manufacture);

$smarty->display('system_manufacture/view_system_manufacture.tpl');

?>