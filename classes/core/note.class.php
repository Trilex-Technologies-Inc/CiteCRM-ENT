<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     note.class.php<br>
 * Purpose:  For all note methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/note_getter.class.php');

class note extends note_getter {


function note(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("note");
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
* Name:     add_note<br>
* Purpose:  Adds A single note row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return note Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_note($note_type,$note_type_id,$note_subject,$note_text,$note_enter_by,$note_create_date,$note_active){
	global $db;
	global $error;

	$q = "INSERT INTO  note SET
		note_text					=". $db->qstr($note_text) .",
		note_type					=". $db->qstr($note_type) .",
        note_subject                =". $db->qstr($note_subject).",
		note_type_id				=". $db->qstr($note_type_id) .",
		note_enter_by				=". $db->qstr($note_enter_by) .",
		note_create_date			=". $db->qstr($note_create_date) .",
		note_active					=". $db->qstr($note_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


 	return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_note<br>
* Purpose:  Loads A single note row<br>
*
* @author Cite CMS Module Developer
* @param $note_id String The note ID
* @access Public
* @return note Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_note($note_id){
	global $db;
	global $error;

	$q = "SELECT * FROM note
	WHERE note_id = ". $db->qstr($note_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_note<br>
* Purpose:  Loads All note rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $noteArray Array  The paginated result set  of notes
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_note(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM note LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$noteArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$noteArray[$counter] = new note();
		$noteArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $noteArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_note<br>
* Purpose:  Updates A single note row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_note($note_id,$note_active,$note_subject,$note_text,$note_type,$note_type_id,$note_enter_by,$note_create_date){
	global $db;
	global $error;

	$q = "UPDATE note SET
		note_text					= " . $db->qstr($note_text) . ",
        note_subject                = " . $db->qstr($note_subject) . ",
		note_type					= " . $db->qstr($note_type) . ",
		note_type_id				= " . $db->qstr($note_type_id) . ",
		note_enter_by				= " . $db->qstr($note_enter_by) . ",
		note_create_date			= " . $db->qstr($note_create_date) . ",
		note_active					= " . $db->qstr($note_active) . "
	WHERE note_id                   = " . $db->qstr($note_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_note<br>
* Purpose:  Deletes A single note row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_note($note_id){
	global $db;
	global $error;

	$q = "DELETE FROM note
	WHERE note_id = " . $db->qstr($note_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


function load_by_type($note_type,$note_type_id,$field='note_id',$sort='ASC',$start=0,$limit=5,&$total){
	global $db;
	global $error;


	$q= "SELECT SQL_CALC_FOUND_ROWS *
		FROM note
		WHERE note_type 	= ".$db->qstr($note_type)."
		AND note_type_id 	= ".$db->qstr($note_type_id)."
		AND note_active =1
		ORDER BY note.$field $sort
		LIMIT $start , $limit";

	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}


	$noteArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$noteArray[$counter] = new note();
		$noteArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}


	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $noteArray;

}

}
?>