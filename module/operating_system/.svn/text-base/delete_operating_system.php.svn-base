<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_operating_system.php<br>
* Purpose:  delete a Single Operating System row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system.class.php');


$operating_system = new operating_system();

$operating_system->delete_operating_system($_REQUEST['operating_system_id']);

$smarty->display('operating_system/delete_operating_system.tpl')

?>