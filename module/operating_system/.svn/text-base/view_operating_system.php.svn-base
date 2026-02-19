<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     view_operating_system.php<br>
* Purpose:  View a Single Operating System row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system.class.php');

$operating_system = new operating_system();

$operating_system->view_operating_system($_REQUEST['operating_system_id']);

$smarty->assign('operating_system', $operating_system);

$smarty->display('operating_system/view_operating_system.tpl');

?>