<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder.class.php<br>
 * Purpose:  For all workorder methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/workorder_getter.class.php');

class workorder extends workorder_getter {

	var $fields;

function add_workorder($workorder_open_date,$workorder_assigned_to,$company_id,$user_id,$system_id,$workorder_scope,$workorder_desription){
    global $db;
	global $error;

	require_once(CLASS_PATH."/core/company_to_workorder.class.php");
	require_once(CLASS_PATH."/core/system_to_workorder.class.php");
	require_once(CLASS_PATH."/core/user_to_workorder.class.php");
	
	if($workorder_assigned_to > 0) {
	   $workorder_status = 2;
    } else {
        $workorder_status = 1;
        $workorder_assigned_to = 0;
    }

	$workorder_create_by = $_SESSION['SESSION_USER_ID'];

	$q = "INSERT INTO  workorder SET
		workorder_open_date					= " . $db->qstr($workorder_open_date) .",
		workorder_status					= " . $db->qstr($workorder_status) . ",
		workorder_active					= '1',
		workorder_create_by					= " . $db->qstr($workorder_create_by) . ",
		workorder_assigned_to				= " . $db->qstr($workorder_assigned_to) .",
		workorder_scope						= " . $db->qstr($workorder_scope) .",
		workorder_desription				= " . $db->qstr($workorder_desription) .",
		workorder_close_date				= " . $db->qstr(0) .",
		workorder_close_by					= " . $db->qstr(0) .",
		workorder_resolution				= ''";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorder_id = $db->Insert_ID();

	// create company Mapping
	if(!empty($company_id)) {			
		$company_to_workorder = new company_to_workorder();	
		$company_to_workorder->add_company_to_workorder($workorder_id,$company_id);
	}

	// Create User Mapping
	if(!empty($user_id)) {		
		$user_to_workorder = new user_to_workorder();		
		$user_to_workorder->add_user_to_workorder($workorder_id,$user_id);	
	}

	// Map system
	if(!empty($system_id)) {	
		$system_to_workorder = new system_to_workorder();		
		$system_to_workorder->add_system_to_workorder($workorder_id,$system_id);		
	}

		
	return $workorder_id;
	
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder<br>
* Purpose:  Loads A single workorder row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_id String The workorder ID
* @access Public
* @return workorder Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder($workorder_id){
	global $db;
	global $error;

	$q = "SELECT *
		FROM workorder
	WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_workorder_info($workorder_id) {
	global $db;
	global $error;

	$q = "SELECT workorder_id, workorder_open_date,workorder_status,workorder_active,workorder_create_by,workorder_assigned_to,workorder_close_date,workorder_close_by
		FROM workorder
	WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_company_by_workorder($workorder_id) {
    global $db;
	global $error;

    $q="SELECT company_to_workorder.*, company.*
        FROM company_to_workorder
        LEFT JOIN company ON company_to_workorder.company_id = company.company_id
        WHERE company_to_workorder.workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_user_by_workorder($workorder_id) {
    global $db;
	global $error;

    $q = "SELECT user_to_workorder.*, user.*
        FROM user_to_workorder
        LEFT JOIN user ON user_to_workorder.user_id = user.user_id
        WHERE user_to_workorder.workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0]; 

}

function load_scope($workorder_id) {
	global $db;
	global $error;

	$q = "SELECT workorder_scope FROM  workorder
	WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}	

function load_description($workorder_id) {
	global $db;
	global $error;

	$q = "SELECT workorder_desription FROM  workorder
	WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}

function update_description($workorder_id,$workorder_desription) {
	global $db;
	global $error;

	$q = "UPDATE workorder SET workorder_desription = " . $db->qstr($workorder_desription) . " WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}

function update_scope($workorder_id,$workorder_scope) {
	global $db;
	global $error;

	$q = "UPDATE workorder SET workorder_scope = " . $db->qstr($workorder_scope) . " WHERE workorder_id = ". $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder<br>
* Purpose:  Loads All workorder rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorderArray Array  The paginated result set  of workorders
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder($field,$sort,$and,$start=0, $limit=50, &$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM workorder 
			WHERE 1
			$and
			ORDER BY $field $sort LIMIT $start,$limit";

	

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = ($rs->fields['FOUND_ROWS()']);

	return $workorderArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_company_id<br>
* Purpose:  Loads All workorder rows by company id<br>
*
* @author Cite CMS Module Developer
* @param String $company_id The company ID
* @access Public
* @return $workorderArray Array  of work Order Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function load_by_company_id($company_id,$field='workorder_id',$sort='ASC',$start=0,$limit=5,&$total) {

	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS company_to_workorder.*, workorder.*
			FROM company_to_workorder, workorder
			WHERE company_to_workorder.company_id = " . $db->qstr( $company_id ) ."
			AND company_to_workorder.workorder_id = workorder.workorder_id
			ORDER BY workorder.$field $sort LIMIT $start, $limit";


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $workorderArray;

}

function load_by_user_id($user_id,$field,$sort,$and,$start,$limit,&$total) {
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS  workorder.* 
			FROM  workorder
			WHERE  workorder_assigned_to  = " . $db->qstr($user_id)."
            ORDER BY workorder.$field $sort LIMIT $start, $limit";
	
    
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

    $q = "SELECT FOUND_ROWS()";
    if(!$rs = $db->Execute($q)) {
        $error->dbError($db->ErrorMsg(), $q);
    }

    $total = $rs->fields['FOUND_ROWS()'];

	return $workorderArray;
}

function load_completed_by_user_id($user_id) {
	global $db;
	global $error;
	
	$q = "SELECT user_to_workorder.*, workorder.* 
			FROM user_to_workorder, workorder
			WHERE  user_to_workorder.user_id = " . $db->qstr($user_id) . "
			AND  user_to_workorder.workorder_id = workorder.workorder_id
			AND workorder.workorder_status = '7'";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $workorderArray;
}

function load_by_employee($employee_id) {
	global $db;
	global $error;
	
	$q = "SELECT * 
			FROM workorder
			WHERE  workorder_assigned_to  = " . $db->qstr($employee_id) . "
			AND workorder_status != '7'";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $workorderArray;

}

function load_completed_by_employee($employee_id) {

	global $db;
	global $error;
	
	$q = "SELECT * 
			FROM workorder
			WHERE  workorder_assigned_to  = " . $db->qstr($employee_id) . "
			AND workorder_status = '7'";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $workorderArray;
}

function load_assigned_systems($workorder_id) {
    global $db;
    global $error;

    $q = "SELECT system_to_workorder.*, system.system_name
        FROM system_to_workorder 
        LEFT JOIN system on system_to_workorder.system_id = system.system_id
        WHERE workorder_id = " . $db->qstr($workorder_id);
    if(!$rs = $db->Execute($q)) {
        $error->dbError($db->ErrorMsg(), $q);
    }
    
    $workorderArray = array();

    $counter = 0;

    $tempArray = $rs->GetArray();

    while($counter < count($tempArray)) {
        $workorderArray[$counter] = new workorder();
        $workorderArray[$counter]->fields = $tempArray[$counter];
        $counter++;
    }

    return $workorderArray;
}

function load_by_system($system_id,$field,$sort,$start=0,$limit=SMALLPAGINATION,&$total){

	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS system_to_workorder.*, workorder.*
			FROM system_to_workorder
			LEFT JOIN workorder ON (system_to_workorder.workorder_id = workorder.workorder_id)
			WHERE system_to_workorder.system_id = " . $db->qstr($system_id) . "
			ORDER BY $field $sort LIMIT $start,$limit";		
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $workorderArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder<br>
* Purpose:  Updates A single workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE workorder SET
		workorder_status				=". $db->qstr($_REQUEST['workorder_status']) ."	,
		workorder_active				=". $db->qstr($_REQUEST['workorder_active']) ."	,
		workorder_assigned_to			=". $db->qstr($_REQUEST['workorder_assigned_to']) ."	,
		workorder_scope					=". $db->qstr($_REQUEST['workorder_scope']) ."	,
		workorder_desription			=". $db->qstr($_REQUEST['workorder_desription']) ."	,
		workorder_close_date			=". $db->qstr($_REQUEST['workorder_close_date']) ."	,
		workorder_close_by				=". $db->qstr($_REQUEST['workorder_close_by']) ."	,
		workorder_resolution			=". $db->qstr($_REQUEST['workorder_resolution']) ."
		WHERE workorder_id 				= " . $db->qstr($_REQUEST['workorder_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $_REQUEST['workorder_id'];

	$this->_save_history("Work Order Updated");

	return true;
}

function assign($workorder_assigned_to, $workorder_id) {
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_assigned_to	= " . $db->qstr($workorder_assigned_to) . ",
			workorder_status		= '2'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}



}

function set_new($workorder_id) {
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_status		= '1'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $workorder_id;		
	
	$this->_save_history("Workorder Set to New");
}

function set_waiting_for_parts($workorder_id) {
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_status		= '3'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $workorder_id;		
	
	$this->_save_history("Workorder Set to Awaiting Parts");
}

function set_waiting_for_payment($workorder_id) {
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_status		= '5'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $workorder_id;		
	
	$this->_save_history("Workorder Set to Awaiting Payment");
}
	

function set_on_hold($workorder_id) {

	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_status		= '4'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['workorder_id'] = $workorder_id;		
	
	$this->_save_history("Workorder Set to On Hold");
	
}

function set_suspended($workorder_id,$workorder_note_text) {
       global $db;
	   global $error;

       $q = "UPDATE workorder SET
             workorder_status       = '6',
             workorder_active       = '0',
             workorder_close_date   = " . $db->qstr(time()) . ",
             workorder_close_by     = " . $db->qstr($_SESSION['SESSION_USER_ID']) . ",
             workorder_resolution   = 'Workorder Suspended'
            WHERE workorder_id		= " . $db->qstr($workorder_id);

       if(!$rs = $db->Execute($q)) {
	       $error->dbError($db->ErrorMsg(), $q);
	   }

		$note = "<b>Workorder Suspended</b> Note: " . $workorder_note_text;
        // Save Note
        $this->add_workorder_note($workorder_id,$note,$no_update=1);

        // Update History
        $this->fields['workorder_id'] = $workorder_id;		
	
	    $this->_save_history("Workorder Set to Suspended");


}


    function set_completed($workorder_id,$workorder_close_date,$workorder_close_by,$workorder_resolution){
       global $db;
	   global $error;

       $q = "UPDATE workorder SET
            workorder_close_date    = " . $db->qstr($workorder_close_date) . ",
            workorder_close_by      = " . $db->qstr($workorder_close_by) . ",
            workorder_resolution    = " . $db->qstr($workorder_resolution) . ",
			workorder_status		= '7',
            workorder_active        = '0'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        

    }

	function set_waiting_for_customer_aprov($workorder_id){
		global $db;
	   global $error;

       $q = "UPDATE workorder SET
			workorder_status		= '8'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        $this->fields['workorder_id'] = $workorder_id;		
        
        $this->_save_history("Workorder Set to Waiting For Customer Aproval");

	}

    function close($workorder_id) {
       global $db;
	   global $error;

       $q = "UPDATE workorder SET
			workorder_status		= '7',
            workorder_active        = '0'
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        $this->fields['workorder_id'] = $workorder_id;		
        
        //$this->_save_history("Workorder Closed");

    }


function add_workorder_note($workorder_id,$workorder_note_text,$workorder_subject,$no_update=0){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_note SET
		workorder_id					=". $db->qstr($workorder_id) .",
		workorder_note_create_by		=". $db->qstr($_SESSION['SESSION_USER_ID']) .",
		workorder_note_text				=". $db->qstr($workorder_note_text) .",
        workorder_subject               = " . $db->qstr($workorder_subject) . ",
        workorder_active                = '1',
		workorder_note_no_update		=". $db->qstr($no_update);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}



 return $db->Insert_ID();
}





function set_schedual($workorder_start_time,$workorder_end_time,$workorder_id){
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET
			workorder_start_time	= " . $db->qstr($workorder_start_time) .",
			workorder_end_time	= " . $db->qstr($workorder_end_time) ."
			WHERE workorder_id 	= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}


function set_resolution($workorder_id,$workorder_close_date,$workorder_close_by,$workorder_resolution) {
	global $db;
	global $error;
	
	$q = "UPDATE workorder SET 
			workorder_close_date		= " . $db->qstr($workorder_close_date) . ",
			workorder_close_by		= " . $db->qstr($workorder_close_by) . ",	
			workorder_resolution		= " . $db->qstr($workorder_resolution) . "
			WHERE workorder_id		= " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
}

function add_product_to_workorder($product_id,$workorder_id,$product_to_workorder_description,$qty,$product_to_workorder_amount,$product_to_workorder_sub_total) {

	global $db;
	global $error;
	
	$q = "INSERT INTO product_to_workorder SET
			product_id						= " . $db->qstr($product_id) . ",
			workorder_id					= " . $db->qstr($workorder_id) . ",
            product_to_workorder_description = " . $db->qstr($product_to_workorder_description) . ",
			product_to_workorder_qty	    = " . $db->qstr($qty) . ",
            product_to_workorder_amount     = " . $db->qstr($product_to_workorder_amount) . ",
            product_to_workorder_sub_total  = " . $db->qstr($product_to_workorder_sub_total) . ",
			last_modified	= NOW()";
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_product_from_workorder<br>
* Purpose:  Deletes a product from the workorder<br>
*
* @author Cite CMS Module Developer
* @param String $product_id The product ID
* @param String $workorder_id The workorder ID
* @access Public
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/

function delete_product_from_workorder($product_id,$workorder_id){

	global $db;
	global $error;
	
	$q = "DELETE FROM product_to_workorder 
				WHERE product_id = " . $db->qstr($product_id) ."
				AND workorder_id = " . $db->qstr($workorder_id);
				
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}



function delete_product_from_system($product_id,$workorder_id) {

	global $db;
	global $error;
	
	$q = "DELETE FROM product_to_system
			WHERE product_id	= " . $db->qstr($product_id) . "
			AND workorder_id = " . $db->qstr($workorder_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
}

function sum_labor($workorder_id) {
    global $db;
	global $error;

    $q = "SELECT SUM(workorder_time_amount) AS sum FROM workorder_time WHERE workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    return $rs->fields['sum'];

}

function sum_service($workorder_id){
	global $db;
	global $error;
	
	$q = "SELECT SUM(workorder_service_total) AS sum FROM workorder_service WHERE  workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    return $rs->fields['sum'];
	
}

function load_labor_by_workorder($workorder_id) {
    global $db;
	global $error;

    $q = "SELECT * FROM workorder_time WHERE workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

    return $workorderArray;

}

function sum_parts($workorder_id) {
    global $db;
	global $error;

    $q = "SELECT SUM(product_to_workorder_sub_total) AS sum FROM product_to_workorder WHERE workorder_id = " . $db->qstr($workorder_id);

     if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    return $rs->fields['sum'];
}

function load_parts_by_workorder($workorder_id) {
    global $db;
	global $error;

    $q = "SELECT * FROM product_to_workorder WHERE workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$workorderArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorderArray[$counter] = new workorder();
		$workorderArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

    return $workorderArray;

}

function is_active($workorder_id) {
    global $db;
    global $error;  

    $q = "SELECT workorder_active FROM workorder WHERE workorder_id = " . $db->qstr($workorder_id);

    if(!$rs = $db->Execute($q)) {
        $error->dbError($db->ErrorMsg(), $q);
    }

    if($rs->fields['workorder_active'] == 1 ) {
        return true;
    } else {
        return false;
    }
    
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder<br>
* Purpose:  Deletes A single workorder row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder($workorder_id){

	require_once(CLASS_PATH."/core/workorder_comment.class.php");
	require_once(CLASS_PATH."/core/workorder_note.class.php");
	require_once(CLASS_PATH."/core/workorder_history.class.php");
	require_once(CLASS_PATH."/core/company_to_workorder.class.php");
	require_once(CLASS_PATH."/core/system_to_workorder.class.php");
	require_once(CLASS_PATH."/core/user_to_workorder.class.php");

	global $db;
	global $error;

	$q = "DELETE FROM workorder
	WHERE workorder_id = " . $db->qstr($workorder_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	// remove all comments
	$workorder_comment = new workorder_comment();
	$workorder_comment->delete_by_workorder($workorder_id);
	
	// remove all notes
	$workorder_note = new workorder_note();
	$workorder_note->delete_by_workorder($workorder_id);
	
	// Remove History
	$workorder_history = new workorder_history();
	$workorder_history->delete_by_workorder($workorder_id);
	
	// clear Company to work order
	$company_to_workorder = new company_to_workorder();
	$company_to_workorder->delete_by_workorder($workorder_id);
	
	// Clear system to work order mapping
	$system_to_workorder = new system_to_workorder();
	$system_to_workorder->delete_by_workorder($workorder_id);
	
	// clear user to work order mapping
	$user_to_workorder = new user_to_workorder();
	$user_to_workorder->delete_by_workorder($workorder_id);
	
	// remove Invoice
	
	// remove schedule
	
	return true;
}



/**
*
* Type:     Cite CMS Private Methods<br>
* Name:     _save_history<br>
* Purpose:  Updates Work order History<br>
*
* @author Cite CMS Module Developer
* @param String $history_msg The history Message
* @access Private
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function _save_history($history_msg) {

	require(CLASS_PATH."/core/workorder_history.class.php");
	
	$workorder_history = new workorder_history($history_msg);
	
	$workorder_history->fields['workorder_id'] 							= $this->fields['workorder_id'];
	$workorder_history->fields['user_id'] 								= $_SESSION['SESSION_USER_ID'];
	$workorder_history->fields['workorder_history_text']		 	= $history_msg;
	$workorder_history->fields['workorder_history_create_date']	= time();
	
	$workorder_history->add_workorder_history($workorder_history);

}

}
?>