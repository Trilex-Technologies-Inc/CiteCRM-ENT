<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_operating_system_manufacture.php<br>
* Purpose:  delete a Single Operating System Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system_manufacture.class.php');

$operating_system_manufacture = new operating_system_manufacture();

$operating_system_manufacture->delete_operating_system_manufacture($_REQUEST['operating_system_manufacture_id']);

$smarty->display('operating_system_manufacture/delete_operating_system_manufacture.tpl')

?>