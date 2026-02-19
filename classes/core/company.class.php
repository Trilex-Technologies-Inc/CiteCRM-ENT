<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     company.class.php<br>
 * Purpose:  For all company methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/company_getter.class.php');

class company extends company_getter {

	function company() {
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("company");


		if(!empty($translate_array)) {		
			foreach($translate_array as $translate){				
				$trans = "translate_".strtolower($translate['name']);				
				$val = $translate['content'];								
				$smarty->assign($trans,$val);
			}
		}

	}


	function add_company($company_name,$company_website,$company_active,$company_assgned_to,$company_type){
		global $db;
		global $error;
	

		$q = "INSERT INTO  company SET
			company_name						=". $db->qstr($company_name) .",
			company_website						=". $db->qstr($company_website) .",
			company_create_date					=". $db->qstr(time()) .",
			company_active						=". $db->qstr($company_active) . ",
			company_assgned_to					=". $db->qstr($company_assgned_to) .",		
			company_type						=". $db->qstr($company_type);


		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		
		return $db->Insert_ID();
	}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_company<br>
* Purpose:  Loads A single company row<br>
*
* @author Cite CMS Module Developer
* @param $company_id String The company ID
* @access Public
* @return company Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_company($company_id){
	global $db;
	global $error;

	$q = "SELECT * FROM company
	WHERE company_id = ". $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_company<br>
* Purpose:  Loads All company rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $companyArray Array  The paginated result set  of companys
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_company($field,$sort,$and,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM company 
			WHERE company_type != 'Lead'
			$and
			ORDER BY $field  $sort LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$companyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$companyArray[$counter] = new company();
		$companyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $companyArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     load_all<br>
* Purpose:  Loads All company rows <br>
*
* @author Cite CMS Module Developer
* @access Public
* @return $companyArray Array of company objects
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function load_all() {
	global $db;
	global $error;
	
	$q = "SELECT * FROM company WHERE company_active = '1'";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$companyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$companyArray[$counter] = new company();
		$companyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $companyArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_company<br>
* Purpose:  Updates A single company row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_company($company_id,$company_name,$company_website,$company_assgned_to,$company_active){
	global $db;
	global $error;

	$q = "UPDATE company SET
		company_name				=". $db->qstr($company_name) ."	,
		company_website				=". $db->qstr($company_website) ."	,
		company_assgned_to			=". $db->qstr($company_assgned_to) .",
		company_active				=". $db->qstr($company_active) ."
		WHERE company_id 			= " . $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_company<br>
* Purpose:  Deletes A single company row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_company($company_id){
	global $db;
	global $error;

	$q = "DELETE FROM company
	WHERE company_id = " . $db->qstr($company_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	return true;
}

function load_company_by_workorder($workorder_id) {

	global $db;
	global $error;
	
	$q = "SELECT company_to_workorder.company_id, company.*
			FROM company_to_workorder, company
			WHERE company_to_workorder.workorder_id = " . $db->qstr($workorder_id) . "
			AND company_to_workorder.company_id = company.company_id";
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


function system_to_company($system_id) {

	global $db;
	global $error;
	
	$q = "SELECT company_to_system.*, company.*
			FROM company_to_system
			LEFT JOIN company ON (company_to_system.company_id = company.company_id)
			WHERE  company_to_system.system_id = " . $db->qstr($system_id);
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_company_by_user_id($user_id){
	global $db;
	global $error;
	
	$q = "SELECT user_to_company.*, company.*, company_address.*
			FROM  user_to_company
			LEFT JOIN company ON (user_to_company.company_id = company.company_id)
			LEFT JOIN company_address ON (user_to_company.company_id = company_address.company_id AND company_address.company_address_type = 'Billing')
			WHERE user_to_company.user_id = " . $db->qstr($user_id);
		
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$companyArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$companyArray[$counter] = new company();
		$companyArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $companyArray;
	
}


	function load_primary_contact($company_id) {
		global $db;
		global $error;

		$q = "SELECT user_to_company.*, user.*
				FROM user_to_company
			LEFT JOIN user ON user_to_company.user_id = user.user_id
			WHERE user_to_company.company_id = " . $db->qstr($company_id) . "
			AND user_to_company.user_to_company_primary = '1'";

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];

	}
	
	
	function load_by_assigned($user_id,$field,$sort,$start=0,$limit=20,&$total) {
		global $db;
		global $error;
	
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM company	WHERE company_assgned_to = " . $db->qstr($user_id);
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		$companyArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();

		while($counter < count($tempArray)) {
			$companyArray[$counter] = new company();
			$companyArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}

		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$total = $rs->fields['FOUND_ROWS()'];

		return $companyArray;
		
		
	}

    function load_name_by_invoice($invoice_id) {
        global $db;
        global $error;

        $q = "SELECT company.company_name, company.company_id
                FROM invoice_to_company
                LEFT JOIN company on invoice_to_company.company_id = company.company_id
                WHERE invoice_to_company.invoice_id = " . $db->qstr($invoice_id);
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
        
        $tempArray = $rs->GetArray();

        $this->fields = $tempArray[0];

    }

}
?>