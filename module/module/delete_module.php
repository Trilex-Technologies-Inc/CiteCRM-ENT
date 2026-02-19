<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     search_module.php<br>
 * Purpose:  Search Module<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin(SUPER_USER);
	
$module = new module();
	
$module->delete_module($_REQUEST['module_id']);
	
$core->force_page('?page=module:search_module');

?>