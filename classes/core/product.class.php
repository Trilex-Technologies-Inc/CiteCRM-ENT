<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     product.class.php<br>
 * Purpose:  For all product methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/product_getter.class.php');

class product extends product_getter {


function product(){
	global $smarty;
	global $translate;
	$translate = new translate();
	$translate_array = $translate->translate_module("product");
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
* Name:     add_product<br>
* Purpose:  Adds A single product row<br>
*
* @author Cite CMS Module Developer
* @access Public
* @return product Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function add_product($product_sku,$product_upc,$product_type,$product_quantity,$product_model,$_FILES,$product_price,$product_markup,$product_virtual,$product_date_added,$product_date_available,$product_weight,$product_status,$tax_class_id,$manufacturer_id,$product_ordered,$product_quantity_order_min,$product_quantity_order_units,$product_priced_by_attribute,$product_is_free,$product_is_call,$product_is_always_free_shipping,$product_quantity_order_max,$product_name,$product_description,$product_url,$catgory_id){

	global $db;
	global $error;

	// Move Image
	if($_FILES['product_image']['name'] != "") {
		
			$img_url = "/images/product/".$_FILES['product_image']['name'];
			
			$uploadfile =  ROOT_PATH."/images/product/".$_FILES['product_image']['name'];
				
			if(!move_uploaded_file($_FILES['product_image']['tmp_name'], $uploadfile)) {			
				print "Error";
				print_r($_FILES);
				die;			
			}			
		} else {
            $img_url = "/images/product/default.jpg";

        }


	// Add to Product DB
	$q = "INSERT INTO  product SET
			product_sku						= " . $db->qstr($product_sku) .",
			product_upc 					= " . $db->qstr($product_upc) .",
			product_type					= " . $db->qstr($product_type) .",
			product_quantity				= " . $db->qstr($product_quantity) .",
			product_model					= " . $db->qstr($product_model) .",
			product_image					= " . $db->qstr($img_url) .",
			product_price					= " . $db->qstr($product_price) .",
			product_markup					= " . $db->qstr($product_markup) .",
			product_virtual					= " . $db->qstr($product_virtual) .",
			product_date_added				= " . $db->qstr(strtotime($product_date_added)) .",
			product_date_available			= " . $db->qstr(strtotime($product_date_available)) .",
			product_weight					= " . $db->qstr($product_weight) .",
			product_status 					= " . $db->qstr($product_status) .",
			tax_class_id					= " . $db->qstr($tax_class_id) .",
			manufacturer_id					= " . $db->qstr($manufacturer_id) .",
			product_ordered					= " . $db->qstr($product_ordered) .",
			product_quantity_order_min		= " . $db->qstr($product_quantity_order_min) .",
			product_quantity_order_units	= " . $db->qstr($product_quantity_order_units) .",
			product_priced_by_attribute		= " . $db->qstr($product_priced_by_attribute) .",
			product_is_free					= " . $db->qstr($product_is_free) .",
			product_is_call					= " . $db->qstr($product_is_call) .",
			product_is_always_free_shipping	= " . $db->qstr($product_is_always_free_shipping) .",
			product_quantity_order_max		= " . $db->qstr($product_quantity_order_max) .",
			last_modified							= NOW()";

  

		
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$this->fields['product_id'] = $db->Insert_ID();

	// Add to product_description
	$q = "INSERT INTO product_description SET
		product_id				= " . $db->qstr($this->fields['product_id']) . ",
		product_name			= " . $db->qstr($product_name) . ",
		product_description	    = " . $db->qstr($product_description) . ",
		product_url				= " . $db->qstr($product_url) . ", 
		last_modified			= NOW()";
		
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}	

	
	// Add Product to product_to_category
	$q = "INSERT INTO product_to_category SET
			product_id		= " . $db->qstr($this->fields['product_id']) .",
			category_id		= " . $db->qstr($catgory_id) .",
			last_modified	= NOW()";
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	

 	return $this->fields['product_id'];
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     view_product<br>
* Purpose:  Loads A single product row<br>
*
* @author Cite CMS Module Developer
* @param $product_id String The product ID
* @access Public
* @return product Object
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function view_product($product_id){
	global $db;
	global $error;

	$q = "SELECT product.*, product_description.*
        FROM product
        LEFT JOIN product_description ON product.product_id = product_description.product_id
	WHERE product.product_id = ". $db->qstr($product_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

function load_by_upc($product_upc) {

	global $db;
	global $error;
	
	$q = "SELECT * FROM product WHERE  product_upc = " . $db->qstr($product_upc);

	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	$tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];
}

/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     search_product<br>
* Purpose:  Loads All product rows paginated<br>
*
* @author Cite CMS Module Developer
* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
* @param  SmartyPaginate::getLimit() Smarty Paginate Object
* @access Public
* @return $productArray Array  The paginated result set  of products
* @version 1.0
* @uses $db Datbase object, $error the Error object, $smarty Smarty Object
*/
function search_product($start=0,$limit=50,&$total){
	global $db;
	global $error;

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM product 
			LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$productArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$productArray[$counter] = new product();
		$productArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $productArray;

}


function admin_search_product($upcCode,$manufacture_id,$product_model,$product_status,$product_virtual,$start=0,$limit=50,&$total){
	global $db;
	global $error;

	if(!empty($upcCode)) {
		$and .= " AND product_upc = " . $db->qstr($upcCode);
	}

	if(!empty($manufacture_id)) {
		$and .= " AND manufacturer_id = " . $db->qstr($manufacture_id);
	}
	
	if(!empty($product_model)) {
		$and .= " AND product_model LIKE " . $db->qstr($product_model."%");
	}

	if(!empty($product_status)) {
		$and .= " AND product_status = " . $db->qstr($product_status);
	}

	if(!empty($product_virtual)) {
		$and .= " AND product_virtual = " . $db->qstr($product_virtual);
	}

	$q = "SELECT SQL_CALC_FOUND_ROWS * 
			FROM product 
			WHERE 1 = 1
			$and
			LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
}

	$productArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$productArray[$counter] = new product();
		$productArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	// now we get the total number of records from the table
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $productArray;

}

function load_product_by_workorder($workorder_id,$field,$sort,$start,$limit,&$total) {

	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS product_to_workorder.*,
					product.product_sku, product.product_model, product.product_image, product.product_price,product.product_markup, product.manufacturer_id,
					product_description.product_name
			FROM product_to_workorder
			LEFT JOIN  product ON product_to_workorder.product_id = product.product_id
			LEFT JOIN product_description ON product_to_workorder.product_id = product_description.product_id
			WHERE workorder_id = " . $db->qstr($workorder_id) . "
			ORDER BY $field $sort";

	if($limit > 0 ) {
		$q .= " LIMIT $start,$limit";
	}
			
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	
	$productArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	

	while($counter < count($tempArray)) {
		$productArray[$counter] = new product();
		$productArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}
	
	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = $rs->fields['FOUND_ROWS()'];

	return $productArray;
	
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     update_product<br>
* Purpose:  Updates A single product row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function update_product($_REQUEST){
	global $db;
	global $error;

	$q = "UPDATE product SET
		product_type					=". $db->qstr($_REQUEST['product_type']) ."	,
		product_quantity					=". $db->qstr($_REQUEST['product_quantity']) ."	,
		product_model					=". $db->qstr($_REQUEST['product_model']) ."	,
		product_image					=". $db->qstr($_REQUEST['product_image']) ."	,
		product_price					=". $db->qstr($_REQUEST['product_price']) ."	,
		product_virtual					=". $db->qstr($_REQUEST['product_virtual']) ."	,
		product_date_added					=". $db->qstr($_REQUEST['product_date_added']) ."	,
		product_date_available					=". $db->qstr($_REQUEST['product_date_available']) ."	,
		product_weight					=". $db->qstr($_REQUEST['product_weight']) ."	,
		product_status					=". $db->qstr($_REQUEST['product_status']) ."	,
		tax_class_id					=". $db->qstr($_REQUEST['tax_class_id']) ."	,
		manufacturer_id					=". $db->qstr($_REQUEST['manufacturer_id']) ."	,
		product_ordered					=". $db->qstr($_REQUEST['product_ordered']) ."	,
		product_quantity_order_min					=". $db->qstr($_REQUEST['product_quantity_order_min']) ."	,
		product_quantity_order_units					=". $db->qstr($_REQUEST['product_quantity_order_units']) ."	,
		product_priced_by_attribute					=". $db->qstr($_REQUEST['product_priced_by_attribute']) ."	,
		product_is_free					=". $db->qstr($_REQUEST['product_is_free']) ."	,
		product_is_call					=". $db->qstr($_REQUEST['product_is_call']) ."	,
		product_is_always_free_shipping					=". $db->qstr($_REQUEST['product_is_always_free_shipping']) ."	,
		product_quantity_order_max					=". $db->qstr($_REQUEST['product_quantity_order_max']) ."
	WHERE product_id = " . $db->qstr($_REQUEST['product_id']);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


/**
*
* Type:     Cite CMS Public Methods<br>
* Name:     delete_product<br>
* Purpose:  Deletes A single product row<br>
*
* @author Cite CMS Module Developer
* @param $_REQUEST Array The Form Fields
* @access Public
* @return Boolen True/ False
* @version 1.0
* @uses $db Datbase object, $error the Error object
*/
function delete_product($product_id){
	global $db;
	global $error;

	$q = "DELETE FROM product
	WHERE product_id = " . $db->qstr($product_id);

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

$_SESSION['CLEAR_CACHE'] = true;

	return true;
}


function loadByCategoryID($category_id,$field,$sort,$start,$limit,&$total) {
	global $db;
	global $error;
	
	$q = "SELECT SQL_CALC_FOUND_ROWS product_to_category.product_id, product.*,product_description.product_name,product_description.product_description
			FROM product_to_category, product
			LEFT JOIN product_description ON (product.product_id = product_description.product_id)
			WHERE product_to_category.category_id = " . $db->qstr($category_id) . "
			AND product_to_category.product_id = product.product_id
			AND product.product_quantity != '0'
			ORDER BY product.$field $sort LIMIT $start, $limit";

	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}		
	
	$productArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$productArray[$counter] = new product();
		$productArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

	$q = "SELECT FOUND_ROWS()";
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

	$total = ($rs->fields['FOUND_ROWS()']);



	return $productArray;
}


function load_product_sales($product_id) {
    global $db;
	global $error;

    $q = "SELECT invoice_part.*,invocie_to_workorder.*
            FROM invoice_part
            LEFT JOIN invocie_to_workorder ON invoice_part.invoice_id = invocie_to_workorder.invoice_id
            WHERE product_id = " . $db->qstr($product_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}		
	
	$productArray = array();

	$counter = 0;

	$tempArray = $rs->GetArray();

	while($counter < count($tempArray)) {
		$productArray[$counter] = new product();
		$productArray[$counter]->fields = $tempArray[$counter];
		$counter++;
	}

    return $productArray;

}

function load_product_manufacture($product_id) {
    global $db;
	global $error;

    $q = "SELECT product.manufacturer_id, product_manufacture.*
        FROM product
        LEFT JOIN product_manufacture on product.manufacturer_id = product_manufacture.product_manufacture_id
        WHERE product.product_id = " . $db->qstr($product_id);

    if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}

    $tempArray = $rs->GetArray();

	$this->fields = $tempArray[0];

}

}
?>