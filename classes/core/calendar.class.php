<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     calendar.class.php<br>
 * Purpose:  For all calendar methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/calendar_getter.class.php');

class calendar extends calendar_getter {


function calendar(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("calendar");
	if(!empty($translate_array)) {
		foreach($translate_array as $translate){
			$tans = "translate_".strtolower($translate['name']);
			$val = $translate['content'];
			$smarty->assign($tans,$val);
			$this->translate[strtolower($translate['name'])] = $val;
		}
	}
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     add_calendar<br>
* Purpose:  Adds A single calendar row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return calendar Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_calendar(){
	global $db;
	global $error;

	$q = "INSERT INTO  calendar SET
		calendar_year					=". $db->qstr($_REQUEST['calendar_year']) .",
		calendar_month					=". $db->qstr($_REQUEST['calendar_month']) .",
		calendar_day					=". $db->qstr($_REQUEST['calendar_day']) .",
		calendar_hour					=". $db->qstr($_REQUEST['calendar_hour']) .",
		calendar_min					=". $db->qstr($_REQUEST['calendar_min']) .",
		calendar_type					=". $db->qstr($_REQUEST['calendar_type']) .",
		user_id					=". $db->qstr($_REQUEST['user_id']) .",
		calendar_title					=". $db->qstr($_REQUEST['calendar_title']) .",
		calendar_text					=". $db->qstr($_REQUEST['calendar_text']) .",
		calendar_avtive					=". $db->qstr($_REQUEST['calendar_avtive']) .",
		calendar_private					=". $db->qstr($_REQUEST['calendar_private']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_calendar<br>
* Purpose:  Loads A single calendar row<br>
*
* @author Cite CMS Module Developer
* @param $calendar_id String The calendar ID
* @access Public
* @return calendar Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_calendar($calendar_id){
	global $db;
	global $error;

	$q = "SELECT * FROM calendar
	WHERE calendar_id = ". $db->qstr($calendar_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_calendar<br>
* Purpose:  Loads All calendar rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $calendarArray Array  The paginated result set  of calendars
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_calendar(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM calendar LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$calendarArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$calendarArray[$counter] = new calendar();
		$calendarArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $calendarArray;

}




function update_start($calendar_id,$calendar_title,$calendar_text,$calendar_private,$startDateMonth,$startDateDay,$startDateYear,$startTimeHour,$startTimeMinute,$user_id) {
    global $db;
	global $error;

    $q = "UPDATE calendar SET
        calendar_title      = " . $db->qstr($calendar_title) . ",
        calendar_text       = " . $db->qstr($calendar_text) . ",
        calendar_private    = " . $db->qstr($calendar_private) . ",
        calendar_month      = " . $db->qstr($startDateMonth) . ",
        calendar_day        = " . $db->qstr($startDateDay) . ",
        calendar_year       = " . $db->qstr($startDateYear) . ",
        calendar_hour       = " . $db->qstr($startTimeHour) . ",
        calendar_min        = " . $db->qstr($startTimeMinute) . ",
        user_id             = " . $db->qstr($user_id) . "
    WHERE calendar_id       = " . $db->qstr($calendar_id);


    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}

function update_end($calendar_end_id,$endDateMonth,$endDateDay,$endDateYear,$endTimeHour,$endTimeMinute) {
    global $db;
	global $error;

    $q = "UPDATE calendar SET
             calendar_month     = " . $db->qstr($endDateMonth) . ",
             calendar_day       = " . $db->qstr($endDateDay) . ",
             calendar_year      = " . $db->qstr($endDateYear) . ",
             calendar_hour      = " . $db->qstr($endTimeHour) . ",
             calendar_min       = " . $db->qstr($endTimeMinute) . "   
     WHERE calendar_id          = " . $db->qstr($calendar_end_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}

function set_inactive($calendar_id) {
    global $db;
	global $error;

    $q = "UPDATE calendar SET calendar_avtive = '0' WHERE calendar_id       = " . $db->qstr($calendar_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
    
}

function set_inactive_by_type($calendar_event_type,$calendar_event_id) {
    global $db;
    global $error;
    
    $q = "UPDATE calendar SET 
            calendar_avtive = '0' 
            WHERE calendar_event_type =  " . $db->qstr($calendar_event_type) . "
            AND calendar_event_id =  " . $db->qstr($calendar_event_id);


    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_calendar<br>
* Purpose:  Deletes A single calendar row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_calendar($calendar_id){
	global $db;
	global $error;

	$q = "DELETE FROM calendar
	WHERE calendar_id = " . $db->qstr($calendar_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

function delete_calendar_end($calendar_id){
	global $db;
	global $error;

	$q = "DELETE FROM calendar
	WHERE calendar_start_id = " . $db->qstr($calendar_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
}

function load_day($day,$month,$year,$field='calendar_hour',$sort='ASC',$start=0,$limit=5,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * FROM calendar
			WHERE calendar_day	= " . $db->qstr($day) . "
			AND calendar_month	= " . $db->qstr($month) . "
			AND calendar_year	= " . $db->qstr($year) . "
			AND calendar_type	= 'start'";

	if($_SESSION['SESSION_VIEW_PRIVATE'] == 1) {
		$q .= " AND user_id = " . $db->qstr($_SESSION['SESSION_USER_ID']);
	} else {
		$q .= " AND calendar_private = '0'";
	}

	$q .= " ORDER BY calendar.$field $sort ";
	
	if($limit > 0) {
		$q .= " LIMIT $start,$limit";
	}




	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$calendarArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$calendarArray[$counter] = new calendar();
		$calendarArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$total = ($rs->fields['FOUND_ROWS()']);

	return $calendarArray;

}


function load_by_hour($user_id,$hour,$month,$day,$year) {
	global $db;
	global $error;

	$q = "SELECT calendar_id,calendar_hour,calendar_min,calendar_type, calendar_title,calendar_event_type,calendar_event_id
			FROM calendar 
			WHERE user_id		= " . $db->qstr($user_id) ."
			AND calendar_year	= " . $db->qstr($year) . "
			AND calendar_month	= " . $db->qstr($month) . "
			AND calendar_day	= " . $db->qstr($day) . "
			AND calendar_hour	= " . $db->qstr($hour);



	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$calendarArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$calendarArray[$counter] = new calendar();
		$calendarArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $calendarArray;

}

function load_calendar_end_date($calendar_id) {
	global $db;
	global $error;

	$q = "SELECT calendar_id, calendar_day, calendar_month, calendar_year,calendar_hour,calendar_min
			FROM calendar 
		WHERE calendar_start_id = " . $db->qstr($calendar_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


function load_events($month,$day,$year){
	global $db;
	global $error;

	$q = "SELECT * FROM calendar
			WHERE calendar_month = " . $db->qstr($month) . "
			AND calendar_day 	 = " . $db->qstr($day) . "
			AND calendar_year	 = " . $db->qstr($year) . "
			AND calendar_avtive  = '1'";
			

	if($_SESSION['SESSION_VIEW_PRIVATE'] == 1) {
		$q .= " AND user_id = " . $db->qstr($_SESSION['SESSION_USER_ID']);
		//$q .= " AND calendar_private = '1'";
	} else {
		$q .= " AND calendar_private = '0'";
	}
		


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$calendarArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$calendarArray[$counter] = new calendar();
		$calendarArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $calendarArray;

}


function load_event_by_id($calendar_id){
	global $db;
	global $error;

	$q = "SELECT * FROM calendar WHERE calendar_id = " . $db->qstr($calendar_id);

	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];


}



function set_event($calendar_hour,$calendar_min,$calendar_month,$calendar_day,$calendar_year,$calendar_type,$user_id,$calendar_title,$calendar_text,$calendar_avtive,$calendar_private,$calendar_event_type,$calendar_event_id,$calendar_start_id) {
	global $db;
	global $error;

	$q = "INSERT INTO calendar SET
			calendar_year			= " . $db->qstr($calendar_year) . ",
			calendar_month			= " . $db->qstr($calendar_month) . ",
			calendar_day			= " . $db->qstr($calendar_day) . ",
			calendar_hour			= " . $db->qstr($calendar_hour) . ",
			calendar_min			= " . $db->qstr($calendar_min) . ",
			calendar_type			= " . $db->qstr($calendar_type) . ",
			user_id					= " . $db->qstr($user_id) . ",
			calendar_title			= " . $db->qstr($calendar_title) . ",
			calendar_text			= " . $db->qstr($calendar_text) . ",
			calendar_avtive			= " . $db->qstr($calendar_avtive) . ",
			calendar_private		= " . $db->qstr($calendar_private) . ",
			calendar_event_type		= " . $db->qstr($calendar_event_type) . ",
			calendar_event_id		= " . $db->qstr($calendar_event_id) .",
			calendar_start_id		= " . $db->qstr($calendar_start_id);



	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return $db->Insert_ID();

}

	function remove_workorder_schedual($workorder_id) {
		global $db;
		global $error;
	
			$q = "DELETE FROM calendar
			WHERE calendar_event_type = 'workorder'
			AND calendar_event_id = " . $db->qstr($workorder_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

	}


	function load_by_type($calendar_event_type,$calendar_event_id){
		global $db;
		global $error;

		$q = "SELECT * FROM calendar
			WHERE calendar_event_type 	= " . $db->qstr($calendar_event_type) . "
			AND calendar_event_id		= " . $db->qstr($calendar_event_id) . "
			AND calendar_type			= 'start'";

		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
			

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];

	}
	
	function delete_by_type($calendar_event_type,$calendar_event_id){
		global $db;
		global $error;
		
		$q = "DELETE FROM calendar
			WHERE calendar_event_type 	= " . $db->qstr($calendar_event_type) . "
			AND calendar_event_id		= " . $db->qstr($calendar_event_id);
			
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	}

	function update_use($user_id,$calendar_id) {
		global $db;
		global $error;
			
		$q = "UPDATE calendar SET user_id 	= " . $db->qstr($user_id) . "
				WHERE calendar_id 			=  " . $db->qstr($calendar_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		

	}
	
	function load_calendar_by_user($user_id,$and){
		global $db;
		global $error;
		
		$q ="SELECT * FROM calendar 
			WHERE user_id = " . $db->qstr($user_id) ."
			AND calendar_type = 'start' 
			$and 
			ORDER BY `calendar`.`calendar_hour` ASC ";

			
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		$calendarArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$calendarArray[$counter] = new calendar();
			$calendarArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		
	
		return $calendarArray;
		
	}
	
	function load_users_by_day($day){
		global $db;
		global $error;
		$q = "SELECT calendar.user_id, user.user_first_name, user.user_last_name
			FROM calendar 
			LEFT JOIN user on calendar.user_id = user.user_id
			WHERE calendar_day = " . $db->qstr($day) . " GROUP BY user_id ";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$calendarArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {
			$calendarArray[$counter] = new calendar();
			$calendarArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}

		return $calendarArray;
		
	}

}
?>