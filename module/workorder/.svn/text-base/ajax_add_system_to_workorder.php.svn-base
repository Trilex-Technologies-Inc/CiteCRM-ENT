<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     add_system_to_workorder.php<br>
 * Purpose:  Add New System To Workorder<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/

$core->verifyAdmin(CAN_CREATE);


if(isset($_POST['submit'])) {

	$workorder_id	= $_POST['workorder_id'];
	$system_id		= $_POST['system_id'];
	

	if($system_id > 0 && $workorder_id > 0) {
			

		require_once(CLASS_PATH . "/core/system.class.php");
				
		$systemObj = new System();
				
		$systemArray = $systemObj->load_by_workorder_id($workorder_id,'system.system_id','ASC',0,0,&$total);
			
		// Check if we already have system mapped.
		foreach($systemArray as $system) {	
			if($system->get_system_id() == $system_id ) {		
				$map_error = true;
			} else {
				$map_error == false;
			}
				
		}
			
		
		// No error map system
		if($map_error == false) {

			require_once(CLASS_PATH . "/core/system_to_workorder.class.php");
				
			$system_to_workorder =  new system_to_workorder();
			
			$system_to_workorder_id = $system_to_workorder->add_system_to_workorder($workorder_id,$system_id);
		}
				
	}

} else {

	

	$smarty->display('workorder/ajax_add_system_to_workorder.tpl');
}


?>