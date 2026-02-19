<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_system_manufacture.php<br>
* Purpose:  delete a Single System Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/system_manufacture.class.php');

$system_manufacture = new system_manufacture();

$system_manufacture->delete_system_manufacture($_REQUEST['system_manufacture_id']);

$smarty->display('system_manufacture/delete_system_manufacture.tpl')

?>