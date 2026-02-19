<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_manufacture.php<br>
* Purpose:  delete a Single Manufacture row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(SUPER_USER);

require(CLASS_PATH.'/core/manufacture.class.php');

$manufacture = new manufacture();

$manufacture->delete_manufacture($_REQUEST['manufacture_id']);

$smarty->display('manufacture/delete_manufacture.tpl')

?>