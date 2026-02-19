<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     campaign.class.php<br>
 * Purpose:  For all campaign methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/campaign_getter.class.php');

class campaign extends campaign_getter {


function campaign(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("campaign");
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
* Name:     add_campaign<br>
* Purpose:  Adds A single campaign row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return campaign Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_campaign($campaign_type_id,$campaign_name,$campaign_start_date,$campaign_end_date,$campaign_cost,$campaign_description,$campaign_active){
	global $db;
	global $error;

	$q = "INSERT INTO  campaign SET
		campaign_type_id				= ". $db->qstr($campaign_type_id) .",
		campaign_name					= ". $db->qstr($campaign_name) .",
		campaign_start_date				= ". $db->qstr($campaign_start_date) .",
		campaign_end_date				= ". $db->qstr($campaign_end_date) .",
		campaign_cost					= ". $db->qstr($campaign_cost) .",
		campaign_description			= ". $db->qstr($campaign_description) .",
		campaign_active					= ". $db->qstr($campaign_active);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

 return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_campaign<br>
* Purpose:  Loads A single campaign row<br>
*
* @author Cite CMS Module Developer
* @param $campaign_id String The campaign ID
* @access Public
* @return campaign Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_campaign($campaign_id){
	global $db;
	global $error;

	$q = "SELECT * FROM campaign
	WHERE campaign_id = ". $db->qstr($campaign_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_campaign<br>
* Purpose:  Loads All campaign rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $campaignArray Array  The paginated result set  of campaigns
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_campaign(){
	global $db;
	global $error;

	$q = "SELECT * FROM campaign";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$campaignArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaignArray[$counter] = new campaign();
		$campaignArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $campaignArray;

}


function load_all() {
	global $db;
	global $error;

	$q = "SELECT * FROM campaign WHERE campaign_active='1'";
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$campaignArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$campaignArray[$counter] = new campaign();
		$campaignArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	return $campaignArray;

}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_campaign<br>
* Purpose:  Updates A single campaign row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_campaign($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE campaign SET
		campaign_type_id					=". $db->qstr($_REQUEST['campaign_type_id']) ."	,
		campaign_name					=". $db->qstr($_REQUEST['campaign_name']) ."	,
		campaign_start_date					=". $db->qstr($_REQUEST['campaign_start_date']) ."	,
		campaign_end_date					=". $db->qstr($_REQUEST['campaign_end_date']) ."	,
		campaign_cost					=". $db->qstr($_REQUEST['campaign_cost']) ."	,
		campaign_active					=". $db->qstr($_REQUEST['campaign_active']) ."
	WHERE campaign_id = " . $db->qstr($_REQUEST['campaign_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_campaign<br>
* Purpose:  Deletes A single campaign row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_campaign($campaign_id){
	global $db;
	global $error;

	$q = "DELETE FROM campaign
	WHERE campaign_id = " . $db->qstr($campaign_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}

function get_campaign_total_count($campaign_id){
	global $db;
	global $error;
	
	$q = "SELECT count(lead_id) as count from lead WHERE lead_campaign = " . $db->qstr($campaign_id);
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return $rs->fields['count'];	
}

function get_campaign_total_conversions($campaign_id) {
	global $db;
	global $error;
	
	$q = "SELECT count(lead_id) as count from lead WHERE lead_campaign = " . $db->qstr($campaign_id) . " AND lead_status_id ='4'";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	return $rs->fields['count'];
}

function load_invoice_totals_by_conversion($campaign_id){
	global $db;
	global $error;
	
	$total = 0;
	$workorder_count = 0;
	
	$q ="SELECT company_id FROM lead WHERE lead_campaign = " . $db->qstr($campaign_id) . " AND lead_status_id = '4'";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	while(!$rs->EOF){ //lead Loop
		
		//print "<b>Company ID " . $rs->fields['company_id'] . "</b><br>";
		
		$q = "SELECT workorder_id FROM company_to_workorder WHERE company_id = " . $db->qstr($rs->fields['company_id']);
		if(!$result = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		 
		// Loop through workorders and grab invoice items and total them
		while(!$result->EOF){
			$workorder_count++;
			//print "&nbsp;&nbsp;WO ID " .$result->fields['workorder_id'] . "<br>";
			
			$q = "SELECT invoice_item_to_workorder.invoice_item_id,invoice_item.invoice_item_subtotal 
					FROM invoice_item_to_workorder
					LEFT JOIN invoice_item ON invoice_item.invoice_item_id = invoice_item_to_workorder.invoice_item_id
					WHERE invoice_item_to_workorder.workorder_id = " . $db->qstr($result->fields['workorder_id']);									
			if(!$wo_rs = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}		
			
			while(!$wo_rs->EOF){ // LOOP totals
				//print "&nbsp;&nbsp;&nbspInvoice Item $".$wo_rs->fields['invoice_item_subtotal']."<br>";
			
				$total = $total + $wo_rs->fields['invoice_item_subtotal'];
				$wo_rs->MoveNext();		
			}// END LOOP totals
				
						 
			$result->MoveNext();	
		}// END workorders Loop		
		
		$rs->MoveNext();
		
	}//END lead Loop
	
	$array = array('total'=>$total,'workorder_count'=>$workorder_count);
	return $array;
	
}// END Function	


}
?>