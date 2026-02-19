<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     invoice.class.php<br>
 * Purpose:  For all invoice methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/company_to_autobill_getter.class.php');

class company_to_autobill extends company_to_autobill_getter {



	function map_company($autobill_id,$contract_to_company_id,$company_id,$company_to_autobill_active) {
		global $db;
		global $error;

		$q = "INSERT INTO company_to_autobill SET 
				autobill_id					= " . $db->qstr($autobill_id) . ",
				contract_to_company_id		= " . $db->qstr($contract_to_company_id) . ",
				company_id					= " . $db->qstr($company_id) . ",
				company_to_autobill_active	= " . $db->qstr($company_to_autobill_active);


		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		return $db->Insert_ID();
		

	}


    function clear_active($company_id) {
        global $db;
		global $error;

        $q = "UPDATE company_to_autobill SET company_to_autobill_active = '0' WHERE company_id = " . $db->qstr($company_id);

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

    }


    function load_active_autobill() {
        global $db;
		global $error;

        $q = "SELECT * FROM company_to_autobill WHERE company_to_autobill_active = '1'";

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $autobillArray = array();

        $counter = 0;
    
        $tempArray = $rs->GetArray();
    
        while($counter < count($tempArray)) {
            $autobillArray[$counter] = new invoice();
            $autobillArray[$counter]->fields = $tempArray[$counter];
            $counter++;
        }

        return $autobillArray;

    }

}
?>