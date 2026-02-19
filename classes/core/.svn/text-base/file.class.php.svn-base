<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     file.class.php<br>
 * Purpose:  For all file methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/file_getter.class.php');

class file extends file_getter {


function file(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("file");
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
* Name:     add_file<br>
* Purpose:  Adds A single file row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return file Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_file($file_type,$file_type_id,$file_size,$file_name,$file_ext,$file_create_date,$file_upload_by,$file_active,$file_mime_type,$file_path){
	global $db;
	global $error;

	$q = "INSERT INTO  file SET
		file_type					=". $db->qstr($file_type) .",
		file_type_id				=". $db->qstr($file_type_id) .",
		file_size					=". $db->qstr($file_size) .",
		file_name					=". $db->qstr($file_name) .",
		file_ext					=". $db->qstr($file_ext) .",
		file_create_date			=". $db->qstr($file_create_date) .",
		file_upload_by				=". $db->qstr($file_upload_by) .",
		file_active					=". $db->qstr($file_active) .",
		file_mime_type				=". $db->qstr($file_mime_type) .",
		file_path					=". $db->qstr($file_path);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_file<br>
* Purpose:  Loads A single file row<br>
*
* @author Cite CMS Module Developer
* @param $file_id String The file ID
* @access Public
* @return file Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_file($file_id){
	global $db;
	global $error;

	$q = "SELECT * FROM file
	WHERE file_id = ". $db->qstr($file_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_file<br>
* Purpose:  Loads All file rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $fileArray Array  The paginated result set  of files
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_file(){
	global $db;
	global $error;

	$q = sprintf("SELECT SQL_CALC_FOUND_ROWS * FROM file LIMIT %d,%d",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$fileArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$fileArray[$counter] = new file();
		$fileArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	SmartyPaginate::setTotal($rs->fields['FOUND_ROWS()']);

	return $fileArray;

}


function load_by_type($file_type,$file_type_id,$field='file_id',$sort='ASC',$start=0,$limit=5,&$total) {
	global $db;
	global $error;

	
	$q= "SELECT SQL_CALC_FOUND_ROWS *
		FROM file
		WHERE file_type 	= ".$db->qstr($file_type)."
		AND file_type_id 	= ".$db->qstr($file_type_id)."
		AND file_active =1
		ORDER BY file.$field $sort
		LIMIT $start , $limit";

	

	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}

	$fileArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$fileArray[$counter] = new file();
		$fileArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];


	return $fileArray;
}

function load_employee_file($employee_id,$field='file_id',$sort='ASC',$start=0,$limit=5,&$total) {
	global $db;
	global $error;

	
	$q= "SELECT SQL_CALC_FOUND_ROWS *
		FROM file
		WHERE file_type 	= 'user_id'
		AND file_type_id 	= ".$db->qstr($employee_id)."
		AND file_active =1
		ORDER BY file.$field $sort
		LIMIT $start , $limit";

	

	if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
	}

	$fileArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$fileArray[$counter] = new file();
		$fileArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_file<br>
* Purpose:  Updates A single file row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_file($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE file SET
		file_type					=". $db->qstr($_REQUEST['file_type']) ."	,
		file_type_id					=". $db->qstr($_REQUEST['file_type_id']) ."	,
		file_size					=". $db->qstr($_REQUEST['file_size']) ."	,
		file_name					=". $db->qstr($_REQUEST['file_name']) ."	,
		file_ext					=". $db->qstr($_REQUEST['file_ext']) ."	,
		file_create_date					=". $db->qstr($_REQUEST['file_create_date']) ."	,
		file_upload_by					=". $db->qstr($_REQUEST['file_upload_by']) ."	,
		file_active					=". $db->qstr($_REQUEST['file_active']) ."	,
		file_mime_type					=". $db->qstr($_REQUEST['file_mime_type']) ."	,
		file_path					=". $db->qstr($_REQUEST['file_path']) ."
	WHERE file_id = " . $db->qstr($_REQUEST['file_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_file<br>
* Purpose:  Deletes A single file row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_file($file_id){
	global $db;
	global $error;

	$q = "DELETE FROM file
	WHERE file_id = " . $db->qstr($file_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}



function get_net_id() {
	global $db;
	global $error;

	$q = "SHOW TABLE STATUS LIKE 'file'";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return $rs->fields['Auto_increment'];

}

function get_ext($file){

	$ext = explode('.', $file);
	$extension = $ext[count($ext)-2];


	// Try and find appropriate type
	switch(strtolower($extension)) {
		case 'txt': $type = 'text/plain'; break;
		case "pdf": $type = 'application/pdf'; break;
		case "exe": $type = 'application/octet-stream'; break;
		case "zip": $type = 'application/zip'; break;
		case "doc": $type = 'application/msword'; break;
		case "xls": $type = 'application/vnd.ms-excel'; break;
		case "ppt": $type = 'application/vnd.ms-powerpoint'; break;
		case "gif": $type = 'image/gif'; break;
		case "png": $type = 'image/png'; break;
		case "jpg": $type = 'image/jpg'; break;
		case "jpeg": $type = 'image/jpg'; break;
		case "html": $type = 'text/html'; break;
		default: $type = 'application/force-download';
	}

	return $type;

}

function get_real_file_name($file) {

	// Create New File name
	$fn = explode('/', $file);
	$file_name = $fn[count($fn)-1];

	$file_name = str_replace(".php", "", $file_name);

	return $file_name;

}


function isReal_file($filepath) {


	if ($filepath != realpath($filepath)) {
		return false;
	} else {
		return true;
	}

}

function re_pack($filepath) {

	$data = file($filepath);
	array_shift($data);
	
	
	$data = implode('', $data);
	$data = base64_decode($data);

	return $data;

}

}
?>