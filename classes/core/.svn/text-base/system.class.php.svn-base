<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     system.class.php<br>
 * Purpose:  For all system methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/system_getter.class.php');

class system extends system_getter {

function add_system($system_name,$user_id,$system_serial_num,$system_host_name,$system_ip_address,$system_manufacture_id,$system_model_id,$system_model_id,$operating_system_manufacture_id,$opreating_system_id,$system_purchase_date,$system_purchase_price,$system_waranty_text,$system_warenty_expire_date,$system_last_service,$company_id){
	global $db;
	global $error;


	$q = "INSERT INTO  system SET
		system_serial_num					=". $db->qstr($system_serial_num) .",
		system_host_name					=". $db->qstr($system_host_name) .",
		system_ip_address					=". $db->qstr($system_ip_address) .",
		operating_system_manufacture_id		=". $db->qstr($operating_system_manufacture_id) .",
		operating_system_id				    =". $db->qstr($opreating_system_id) .",
		system_purchase_date				=". $db->qstr(strtotime($system_purchase_date)) .",
		system_purchase_price				=". $db->qstr($system_purchase_price) .",
		system_waranty_text					=". $db->qstr($system_waranty_text) .",
		system_warenty_expire_date			=". $db->qstr(strtotime($system_warenty_expire_date)) .",
		system_manufacture_id				=". $db->qstr($system_manufacture_id) ."	,
		system_model_id						=". $db->qstr($system_model_id) ."	,
		system_name							=". $db->qstr($system_name) ."	,
		system_active						= '1',
		system_last_service					=". $db->qstr(strtotime($system_last_service));

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['system_id'] = $db->Insert_ID();


	if(!empty($company_id)) {
		$this->_map_company($this->fields['system_id'], $company_id);	
	}

	if(!empty($user_id)) {
		$this->_map_user($this->fields['system_id'],$user_id);
	}


 return $this->fields['system_id'];
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_system<br>
* Purpose:  Loads A single system row<br>
*
* @author Cite CMS Module Developer
* @param $system_id String The system ID
* @access Public
* @return system Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_system($system_id){
	global $db;
	global $error;

	$q = "SELECT * FROM system
	WHERE system_id = ". $db->qstr($system_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_system<br>
* Purpose:  Loads All system rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $systemArray Array  The paginated result set  of systems
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_system($field,$sort,$and,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM system 
			WHERE 1
			$and
			ORDER BY $field $sort LIMIT $start,$limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$systemArray[$counter] = new system();
		$systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $systemArray;

}


	function admin_search_system($system_id,$start,$limit,&$total) {
		global $db;
		global $error;
		
		if(!empty($system_id)) {
			$and .= " AND system_id = " . $db->qstr($system_id);
		}
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM system
				WHERE 1 =1 
				$and
				LIMIT $start,$limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$systemArray[$counter] = new system();
		$systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $systemArray;
	
	}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_company_id<br>
* Purpose:  Loads All systems by company ID<br>
*
* @author Cite CMS Module Developer
* @param String  $company_id the company ID
* @access Public
* @return $systemArray Array of system Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function load_by_company_id($company_id,$field='system_id',$sort='ASC',$start=0,$limit=5,&$total) {
	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS company_to_system.*, system.*
			from company_to_system, system
			WHERE company_to_system.company_id = " . $db->qstr($company_id) . "
			AND company_to_system.system_id = system.system_id
			AND system.system_active = '1'
			ORDER BY system.$field $sort "; 

	if($limit > 0) {
		$q .=" LIMIT $start,$limit";
	}
	
	
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$systemArray[$counter] = new system();
		$systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $systemArray;
}



function load_by_user_id($user_id,$field='system_id',$sort='ASC',$start=0,$limit=5,&$total) {

	global $db;
	global $error;

	$q = "SELECT user_to_system.*, system.*
			from user_to_system, system
			WHERE user_to_system.user_id = " . $db->qstr($user_id) . "
			AND user_to_system.system_id = system.system_id
			ORDER BY system.$field $sort "; 

	if($limit > 0) {
		$q .=" LIMIT $start,$limit";
	}

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$systemArray[$counter] = new system();
		$systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $systemArray;


}



function load_by_workorder_id($workorder_id,$field,$sort,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS system_to_workorder.*, system.*
			FROM system_to_workorder
			LEFT JOIN system ON (system_to_workorder.system_id = system.system_id)
			WHERE workorder_id = " . $db->qstr($workorder_id) . "
			ORDER BY $field $sort";

	if($limit > 0) {
		$q .= " LIMIT $start,$limit";
	}

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$systemArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$systemArray[$counter] = new system();
		$systemArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];


	return $systemArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_system<br>
* Purpose:  Updates A single system row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_system($system_id,$system_name,$system_serial_num,$system_host_name,$system_manufacture_id,$operating_system_manufacture_id,$operating_system_id,$system_ip_address,$system_ip_address,$system_model_id,$system_purchase_date,$system_purchase_price,$system_warenty_expire_date,$system_last_service,$system_active,$system_waranty_text){
	global $db;
	global $error;


	$q = "UPDATE system SET
		system_serial_num					=". $db->qstr($system_serial_num) .",
		system_host_name					=". $db->qstr($system_host_name) .",
		system_ip_address					=". $db->qstr($system_ip_address) .",
		operating_system_manufacture_id		=". $db->qstr($operating_system_manufacture_id) .",
		operating_system_id					=". $db->qstr($operating_system_id) .",
		system_purchase_date				=". $db->qstr(strtotime($system_purchase_date)) .",
		system_purchase_price				=". $db->qstr($system_purchase_price) .",
		system_waranty_text					=". $db->qstr($system_waranty_text) .",
		system_warenty_expire_date			=". $db->qstr(strtotime($system_warenty_expire_date)) .",
		system_manufacture_id				=". $db->qstr($system_manufacture_id) ."	,
		system_model_id						=". $db->qstr($system_model_id) ."	,
		system_name							=". $db->qstr($system_name) ."	,
		system_active						=". $db->qstr($system_active) ."	,
		system_last_service					=". $db->qstr(strtotime($system_last_service)) ."
	WHERE system_id = " . $db->qstr($system_id);


    

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_system<br>
* Purpose:  Deletes A single system row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_system($system_id){
	global $db;
	global $error;

	$q = "UPDATE system SET 
		system_active = '0'
	WHERE system_id = " . $db->qstr($system_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

/**
 *
 * Type:     Cite CMS Private Methods<br>
 * Name:     map_product_to_system<br>
 * Purpose:  Maps Product to System<br>
 *
 * @author Cite CMS Module Developer
 * @param String $system_id The new systems ID
 * @param String $product_id The product ID
 * @param String $qty The Quantity of Product
 * @param String $workorder_id The workorder_id the product cam from
 * @access Private
 * @return 
 * @version 1.0
 * @uses $db Datbase object, $error the Error object
*/
function map_product_to_system($system_id,$product_id,$qty,$workorder_id) {

	global $db;
	
	$q = "INSERT INTO product_to_system SET
			product_id					= " . $db->qstr($product_id) . ",
			system_id					= " . $db->qstr($system_id) . ",
			workorder_id				= " . $db->qstr($workorder_id) . ",
			product_to_system_qty	= " . $db->qstr($qty) . ",
			last_modified				= NOW()";
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
			
}

/**
 *
 * Type:     Cite CMS Private Methods<br>
 * Name:     _map_company<br>
 * Purpose:  Maps Company ID to System ID<br>
 *
 * @author Cite CMS Module Developer
 * @param String $system_id The new systems ID
 * @param String $company_id The company ID
 * @access Private
 * @return 
 * @version 1.0
 * @uses $db Datbase object, $error the Error object
*/
function _map_company($system_id, $company_id) {
	global $db;
	global $error;
	
	$q = "INSERT INTO company_to_system SET
			company_id 	= " . $db->qstr($company_id) . ",
			system_id	= " . $db->qstr($system_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;		
}

function remove_user_map($user_id, $system_id){
    global $db;
    global $error;

    $q = "DELETE FROM user_to_system WHERE user_id = " .$db->qstr($user_id) ." AND system_id = ".$db->qstr($system_id);

    if(!$rs = $db->Execute($q)) {
        $error->dbError($db->ErrorMsg(), $q);
    }

    return true;    
}

/**
 *
 * Type:     Cite CMS Private Methods<br>
 * Name:     _map_user<br>
 * Purpose:  Maps User ID to System ID<br>
 *
 * @author Cite CMS Module Developer
 * @param String $system_id The new systems ID
 * @param String $user_id The User ID
 * @access Private
 * @return 
 * @version 1.0
 * @uses $db Datbase object, $error the Error object
*/
function _map_user($system_id, $user_id) {
	global $db;
	global $error;
	
	$q = "INSERT INTO user_to_system SET
			user_id		= " . $db->qstr($user_id) . ",
			system_id	= " . $db->qstr($system_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return true;
}

function load_company_by_system($system_id){
    global $db;
    global $error;

    $q = "SELECT company_id FROM company_to_system WHERE system_id = " . $db->qstr($system_id);
    if(!$rs = $db->Execute($q)) {
        $error->dbError($db->ErrorMsg(), $q);
    }

    return $rs->fields['company_id'];
}

    function load_user_id_by_system($system_id){
        global $db;
        global $error;
        $q = "SELECT user_id FROM user_to_system WHERE system_id = " . $db->qstr($system_id);
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
        return $rs->fields['user_id'];

    }
}
?>