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

require(CLASS_PATH.'/getter/invoice_getter.class.php');

class invoice extends invoice_getter {


function invoice(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("invoice");
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
* Name:     add_invoice<br>
* Purpose:  Adds A single invoice row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return invoice Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_invoice($invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo){
	global $db;
	global $error;

	$q = "INSERT INTO  invoice SET
		invoice_create_date			=". $db->qstr($invoice_create_date) .",
		invoice_create_by			=". $db->qstr($invoice_create_by) .",
		invoice_due_date			=". $db->qstr($invoice_due_date) .",
		invoice_amount				=". $db->qstr($invoice_amount) .",
		invoice_discount_amount		=". $db->qstr($invoice_discount_amount) .",
		invoice_total_amount		=". $db->qstr($invoice_total_amount) .",
		invoice_status				=". $db->qstr($invoice_status) .",
		invoice_paid_date			=". $db->qstr($invoice_paid_date) .",
		invoice_paid_amount			=". $db->qstr($invoice_paid_amount) .",
		invoice_payment_type		=". $db->qstr($invoice_payment_type) .",
		invoice_barcode				=". $db->qstr($invoice_barcode) .",
		invoice_payment_enter_by	=". $db->qstr($invoice_payment_enter_by) .",
		invoice_memo				=". $db->qstr($invoice_memo);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    return $db->Insert_ID();
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_invoice<br>
* Purpose:  Loads A single invoice row<br>
*
* @author Cite CMS Module Developer
* @param $invoice_id String The invoice ID
* @access Public
* @return invoice Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_invoice($invoice_id){
	global $db;
	global $error;

	$q = "SELECT * FROM invoice
	WHERE invoice_id = ". $db->qstr($invoice_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_invoice<br>
* Purpose:  Loads All invoice rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $invoiceArray Array  The paginated result set  of invoices
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_invoice($field,$sort,$and,$start,$limit,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM invoice 
			WHERE 1
			$and
			ORDER BY $field $sort LIMIT $start, $limit";


	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$invoiceArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$invoiceArray[$counter] = new invoice();
		$invoiceArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $invoiceArray;

}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_invoice<br>
* Purpose:  Updates A single invoice row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_invoice($invoice_id,$invoice_create_date,$invoice_create_by,$invoice_due_date,$invoice_amount,$invoice_shipping_amount,$invoice_discount_amount,$invoice_total_amount,$invoice_status,$invoice_paid_date,$invoice_paid_amount,$invoice_payment_type,$invoice_barcode,$invoice_payment_enter_by,$invoice_memo){
	global $db;
	global $error;

	$q = "UPDATE invoice SET
		invoice_create_date			=". $db->qstr($invoice_create_date) .",
		invoice_create_by			=". $db->qstr($invoice_create_by) .",
		invoice_due_date			=". $db->qstr($invoice_due_date) .",
		invoice_amount				=". $db->qstr($invoice_amount) .",
		invoice_shipping_amount		=". $db->qstr($invoice_shipping_amount) .",
		invoice_discount_amount		=". $db->qstr($invoice_discount_amount) .",
		invoice_total_amount		=". $db->qstr($invoice_total_amount) .",
		invoice_status				=". $db->qstr($invoice_status) .",
		invoice_paid_date			=". $db->qstr($invoice_paid_date) .",
		invoice_paid_amount			=". $db->qstr($invoice_paid_amount) .",
		invoice_payment_type		=". $db->qstr($invoice_payment_type) .",
		invoice_barcode				=". $db->qstr($invoice_barcode) .",
		invoice_payment_enter_by	=". $db->qstr($invoice_payment_enter_by) .",
		invoice_memo				=". $db->qstr($invoice_memo) . "
	WHERE invoice_id 				= " . $db->qstr($invoice_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}

function load_invoice_by_workorder_id($workorder_id) {

	global $db;
	global $error;
	
	$q = "SELECT * 
			FROM invocie_to_workorder 
			LEFT JOIN invoice ON invocie_to_workorder.invoice_id = invoice.invoice_id
			WHERE workorder_id = " . $db->qstr($workorder_id);
			
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}


function load_workorder_by_invoice($invoice_id){
    global $db;
	global $error;

    $q = "SELECT * FROM invocie_to_workorder WHERE invoice_id = " . $db->qstr($invoice_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}


	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];


}

function map_workorder($invoice_id,$workorder_id) {
	global $db;
	global $error;
	
	$q = "INSERT INTO invocie_to_workorder SET
			invoice_id					= " . $db->qstr($invoice_id) .",
			workorder_id				= " . $db->qstr($workorder_id) .",
			last_modified				= NOW()";
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}

function map_company($invoice_id,$company_id) {
	global $db;
	global $error;
	
	$q = "INSERT INTO invoice_to_company SET
			invoice_id				= " . $db->qstr($invoice_id) .",
			company_id				= " . $db->qstr($company_id) .",
			last_modified			= NOW()";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

}


    function map_user($invoice_id,$user_id){
    
        global $db;
        global $error;
    
        $q ="INSERT INTO invoice_to_user SET
                invoice_id              = " . $db->qstr($invoice_id) .",
                user_id                 = " . $db->qstr($user_id) .",
                last_modified			= NOW()";
    
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    }

    function load_user_by_invoice($invoice_id){
        global $db;
        global $error;
    
        $q = "SELECT * FROM invoice_to_user WHERE invoice_id = " . $db->qstr($invoice_id);

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $tempArray = $rs->GetArray();

	    $this->fields = $tempArray[0];

    }

    function load_company_by_invoice($invoice_id){
        global $db;
        global $error;
    
        $q = "SELECT * FROM invoice_to_company WHERE invoice_id = " . $db->qstr($invoice_id);
        
        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $tempArray = $rs->GetArray();

	    $this->fields = $tempArray[0];


    }

	function load_by_company($company_id,$field='invoice_id',$sort='ASC',$start=0,$limit=5,&$total){
		global $db;
        global $error;

		$q = "SELECT SQL_CALC_FOUND_ROWS invoice_to_company.*, invoice.*
				FROM invoice_to_company, invoice
				WHERE invoice_to_company.company_id = " . $db->qstr($company_id) . "
				AND invoice.invoice_id = invoice_to_company.invoice_id
				ORDER BY invoice.$field $sort LIMIT $start,$limit";

		if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }
		
		$invoiceArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$invoiceArray[$counter] = new invoice();
			$invoiceArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$total = ($rs->fields['FOUND_ROWS()']);
	
		return $invoiceArray;


	}


    function load_invoice_items($account_type,$account_type_id) {
        global $db;
        global $error;

        $q = "SELECT * FROM invoice_item
                WHERE account_type      = " . $db->qstr($account_type) . "
                AND account_type_id     = " . $db->qstr($account_type_id) . "
                ORDER BY invoice_item_id ASC";



        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }
		
		$invoiceArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$invoiceArray[$counter] = new invoice();
			$invoiceArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $invoiceArray;


    }

    function load_items_by_invoice($invoice_id) {
        global $db;
        global $error;

        $q = "SELECT * FROM invoice_item WHERE invoice_id = " . $db->qstr($invoice_id) . "
                AND invoice_item_type != 'Payment' 
                AND invoice_item_type != 'TAX'
                AND invoice_item_type != 'Credit'";

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $invoiceArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$invoiceArray[$counter] = new invoice();
			$invoiceArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $invoiceArray;

    }

    function load_credits($invoice_id) {
        global $db;
        global $error;

        $q = "SELECT * FROM invoice_item
                WHERE invoice_id = " . $db->qstr($invoice_id) . "
                AND invoice_item_line_type = 'Credit'";

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

        $invoiceArray = array();

		$counter = 0;
	
		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$invoiceArray[$counter] = new invoice();
			$invoiceArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		return $invoiceArray;

    }


    function load_invoice_item($invoice_item_id) {
        global $db;
        global $error;

        $q = "SELECT * FROM invoice_item WHERE invoice_item_id = " . $db->qstr($invoice_item_id);

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }


        $tempArray = $rs->GetArray();

	    $this->fields = $tempArray[0];
    }

    function map_line_item_to_invoice($invoice_item_id, $invoice_id) {
        global $db;
        global $error;

        $q = "UPDATE invoice_item SET invoice_id = " .$db->qstr($invoice_id) . " WHERE invoice_item_id = " . $db->qstr($invoice_item_id);

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }
        
    }

    function map_contract_hours_to_invoice($company_id,$invoice_id,$start_date,$end_date){
        global $db;
        global $error;
        $q = "UPDATE invoice_item SET invoice_id = " . $db->qstr($invoice_id) . "
                WHERE account_type = 'company_id'
                AND account_type_id = " . $db->qstr($company_id) . "
                AND invoice_item_date >= " . $db->qstr($start_date) . "
                AND invoice_item_date <= " . $db->qstr($end_date) . "
                AND invoice_item_type = 'Contract Labor'";
 
        

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }
        
    }

    function map_contract_min_to_invoice($company_id,$invoice_id,$start_date,$end_date) {
        global $db;
        global $error;
        $q = "UPDATE invoice_item SET invoice_id = " . $db->qstr($invoice_id) . "
                WHERE account_type = 'company_id'
                AND account_type_id = " . $db->qstr($company_id) . "
                AND invoice_item_date >= " . $db->qstr($start_date) . "
                AND invoice_item_date <= " . $db->qstr($end_date) . "
                AND invoice_item_type = 'Contract Support Call'";

        if(!$rs = $db->Execute($q)) {
		  $error->dbError($db->ErrorMsg(), $q);
	    }

    }

    function add_line_item($invoice_id,$invoice_item_date,$account_type,$account_type_id,$invoice_item_type,$invoice_item_type_id,$invoice_item_qty,$invoice_item_amount,$invoice_item_description,$invoice_item_line_type,$invoice_item_subtotal) {
        global $db;
        global $error;

        $q = "INSERT INTO invoice_item SET 
        invoice_id                  = " . $db->qstr($invoice_id) . ",
        invoice_item_date           = " . $db->qstr($invoice_item_date) . ",
        account_type                = " . $db->qstr($account_type) . ",
        account_type_id             = " . $db->qstr($account_type_id) . ",
        invoice_item_type           = " . $db->qstr($invoice_item_type) . ",
        invoice_item_type_id        = " . $db->qstr($invoice_item_type_id) . ",
        invoice_item_qty            = " . $db->qstr($invoice_item_qty) . ",
        invoice_item_amount         = " . $db->qstr($invoice_item_amount) . ",
        invoice_item_description    = " . $db->qstr($invoice_item_description) . ",
        invoice_item_line_type      = " . $db->qstr($invoice_item_line_type) . ",
        invoice_item_subtotal       = " . $db->qstr($invoice_item_subtotal);
    
        if(!$rs = $db->Execute($q)) {
		      $error->dbError($db->ErrorMsg(), $q);
	    }


        return $db->Insert_Id();
        

    }

    function invoice_item_to_workorder($invoice_item_id,$workorder_id) {
        global $db;
        global $error;

        $q = "INSERT INTO invoice_item_to_workorder SET
                invoice_item_id = " . $db->qstr($invoice_item_id) . ",
                workorder_id    = " . $db->qstr($workorder_id);

        if(!$rs = $db->Execute($q)) {
		      $error->dbError($db->ErrorMsg(), $q);
	    }
    }


    function set_paid($invoice_id,$invoice_status,$invoice_paid_date,$invoice_payment_type,$invoice_payment_enter_by,$invoice_paid_amount){
        global $db;
        global $error;

        $q = "UPDATE invoice SET
            invoice_status              = " . $db->qstr($invoice_status) . ",
            invoice_paid_date           = " . $db->qstr($invoice_paid_date) . ",
            invoice_payment_type        = " . $db->qstr($invoice_payment_type) . ",
            invoice_payment_enter_by    = " . $db->qstr($invoice_payment_enter_by) . ",
            invoice_paid_amount         = " . $db->qstr($invoice_paid_amount) . " 
            WHERE invoice_id            = " . $db->qstr($invoice_id);

        if(!$rs = $db->Execute($q)) {
		      $error->dbError($db->ErrorMsg(), $q);
	    }  
        

    }


    /**
    *
    * Type:     Cite CMS Public Methods<br>
    * Name:     delete_invoice<br>
    * Purpose:  Deletes A single invoice row<br>
    *
    * @author Cite CMS Module Developer
    * @param $_REQUEST Array The Form Fields
    * @access Public
    * @return Boolen True/ False
    * @version 1.0
    * @uses $db Datbase object, $error the Error object
    */
    function delete_invoice($invoice_id){
        global $db;
        global $error;
    
        $q = "DELETE FROM invoice
        WHERE invoice_id = " . $db->qstr($invoice_id);
    
        if(!$rs = $db->Execute($q)) {
            $error->dbError($db->ErrorMsg(), $q);
        }
    
    $_SESSION['CLEAR_CACHE'] = true;
    
        return true;
    }


}
?>