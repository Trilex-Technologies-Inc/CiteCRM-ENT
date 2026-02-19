<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_system.php<br>
 * Purpose:  Search System<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require(CLASS_PATH.'/core/system.class.php');

$system = new system();

$smarty->display('system/search_system.tpl');

?>