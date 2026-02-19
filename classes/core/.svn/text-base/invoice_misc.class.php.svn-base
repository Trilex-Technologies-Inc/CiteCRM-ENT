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

require(CLASS_PATH.'/getter/invoice_misc_getter.class.php');

class invoice_misc extends invoice_misc_getter {



	function add_invoice_item($invoice_id,$invoice_misc_description,$invoice_misc_qty,$invoice_misc_amount,$invoice_misc_subtotal) {
		global $db;
		global $error;

		$q = "INSERT INTO invoice_misc SET
				invoice_id					= " . $db->qstr($invoice_id) . ",
				invoice_misc_description	= " . $db->qstr($invoice_misc_description) . ",
				invoice_misc_qty			= " . $db->qstr($invoice_misc_qty) . ",
				invoice_misc_amount			= " . $db->qstr($invoice_misc_amount) . ",
				invoice_misc_subtotal		= " . $db->qstr($invoice_misc_subtotal);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		return $db->Insert_ID();
	}

	
	function load_by_invoice_id($invoice_id) {
		global $db;
		global $error;

		$q = "SELECT * FROM invoice_misc WHERE invoice_id = " . $db->qstr($invoice_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$invoice_miscArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$invoice_miscArray[$counter] = new invoice_misc();
			$invoice_miscArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
		
		return $invoice_miscArray;

	}


}


?>