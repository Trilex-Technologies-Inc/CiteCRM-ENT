<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     workorder_time.class.php<br>
 * Purpose:  For all workorder_time methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/workorder_time_getter.class.php');

class workorder_time extends workorder_time_getter {


function workorder_time(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("workorder_time");
	if(!empty($translate_array)) {
		foreach($translate_array as $translate){
			$tans = "translate_".strtolower($translate['name']);
			$val = $translate['content'];
			$smarty->assign($tans,$val);
		}
	}
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     add_workorder_time<br>
* Purpose:  Adds A single workorder_time row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return workorder_time Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_workorder_time($workorder_id,$user_id,$workorder_time_start,$workorder_time_end,$workorder_time_total,$workorder_time_rate,$workorder_time_labor_type,$workorder_time_amount,$workorder_time_description){
	global $db;
	global $error;

	$q = "INSERT INTO  workorder_time SET
		workorder_id					= " . $db->qstr($workorder_id) .",
		user_id							= " . $db->qstr($user_id) .",
		workorder_time_start			= " . $db->qstr($workorder_time_start) .",
		workorder_time_end			    = " . $db->qstr($workorder_time_end) . ",
		workorder_time_total			= " . $db->qstr($workorder_time_total) . ",
        workorder_time_rate             = " . $db->qstr($workorder_time_rate) . ",
        workorder_time_labor_type       = " . $db->qstr($workorder_time_labor_type) . ",
        workorder_time_description      = " . $db->qstr($workorder_time_description) . ",
        workorder_time_amount           = " . $db->qstr($workorder_time_amount);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_workorder_time<br>
* Purpose:  Loads A single workorder_time row<br>
*
* @author Cite CMS Module Developer
* @param $workorder_time_id String The workorder_time ID
* @access Public
* @return workorder_time Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_workorder_time($workorder_time_id){
	global $db;
	global $error;

	$q = "SELECT * FROM workorder_time
	WHERE workorder_time_id = ". $db->qstr($workorder_time_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_by_workorder<br>
* Purpose:  Loads all workorder_time by workorder id<br>
*
* @author Cite CMS Module Developer
* @param String $workorder_id String The workorder_time ID
* @access Public
* @return workorder_time Array of Objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_by_workorder($workorder_id,$field='workorder_time_start',$sort='ASC',$start=0,$limit=5,&$total){
	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS * FROM workorder_time
			WHERE workorder_id = ". $db->qstr($workorder_id) . "
			ORDER BY $field $sort";

	if($limit > 0) {
	 	$q .=" LIMIT $start,$limit";
	}

			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}		
	
	
	$workorder_timeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_timeArray[$counter] = new workorder_time();
		$workorder_timeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $workorder_timeArray;
	
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_workorder_time<br>
* Purpose:  Loads All workorder_time rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $workorder_timeArray Array  The paginated result set  of workorder_times
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_workorder_time(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM workorder_time LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$workorder_timeArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$workorder_timeArray[$counter] = new workorder_time();
		$workorder_timeArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $workorder_timeArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_workorder_time<br>
* Purpose:  Updates A single workorder_time row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_workorder_time($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE workorder_time SET
		workorder_id					=". $db->qstr($_REQUEST['workorder_id']) ."	,
		user_id					=". $db->qstr($_REQUEST['user_id']) ."	,
		workorder_time_start					=". $db->qstr($_REQUEST['workorder_time_start']) ."	,
		workorder_time_end					=". $db->qstr($_REQUEST['workorder_time_end']) ."
	WHERE workorder_time_id = " . $db->qstr($_REQUEST['workorder_time_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_workorder_time<br>
* Purpose:  Deletes A single workorder_time row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_workorder_time($workorder_time_id){
	global $db;
	global $error;

	$q = "DELETE FROM workorder_time
	WHERE workorder_time_id = " . $db->qstr($workorder_time_id);

    print $q;

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	return true;
}


}
?>