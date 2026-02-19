<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     view_operating_system_manufacture.php<br>
 * Purpose:  View a Single Operating System Manufacture row<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/operating_system_manufacture.class.php');

require(CLASS_PATH.'/core/operating_system.class.php');

	
$operating_system_manufacture 	= new operating_system_manufacture();

$operating_system 					= new operating_system();


$operating_system_manufacture->view_operating_system_manufacture($_REQUEST['operating_system_manufacture_id']);

$operating_system_array = $operating_system->load_by_operating_system_manufacture_id($_REQUEST['operating_system_manufacture_id']);

$smarty->assign('operating_system_manufacture', $operating_system_manufacture);

$smarty->assign('operating_system_array', $operating_system_array);

$smarty->display('operating_system_manufacture/view_operating_system_manufacture.tpl');

?>