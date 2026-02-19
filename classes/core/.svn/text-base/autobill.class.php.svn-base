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

require(CLASS_PATH.'/getter/autobill_getter.class.php');

class autobill extends autobill_getter {


	function add_autobill($invoice_id,$autobill_amount,$autobill_create_date,$autobill_start_date,$autobill_due_date,$autobill_status) {
		global $db;
		global $error;

		$q = "INSERT INTO autobill SET
				invoice_id				= " . $db->qstr($invoice_id) . ",
				autobill_amount			= " . $db->qstr($autobill_amount) . ",
				autobill_create_date	= " . $db->qstr($autobill_create_date) . ",
				autobill_start_date		= " . $db->qstr($autobill_start_date) . ",
				autobill_due_date		= " . $db->qstr($autobill_due_date) . ",
				autobill_status			= " . $db->qstr($autobill_status);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		return $db->Insert_ID();

	}



    function load_next_bill_date($company_id) {
        global $db;
		global $error;

        $q = "SELECT MAX(autobill.autobill_due_date) AS autobill_due_date
                FROM company_to_autobill
                LEFT JOIN autobill ON company_to_autobill.autobill_id = autobill.autobill_id
                WHERE company_to_autobill.company_id = " . $db->qstr($company_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}



        $tempArray = $rs->GetArray();

	    $this->fields = $tempArray[0];
 
    }

   


}


?>