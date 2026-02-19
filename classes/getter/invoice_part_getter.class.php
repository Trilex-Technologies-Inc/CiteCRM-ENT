<?php
/**
* Type:     	Cite CMS Core Getter Class<br>
* Name:    	invoice_partGetter<br>
* Purpose:  	For all Invoice Part fields<br>
* @author    Cite CMS Module Developer
* @access Public
* @package CiteCMS
* @version 1.0
* @Copyright 2006 Cite Software Solutions 
* @link http://www.citecsoftware.com
*/
class invoice_part_getter {

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_part_id<br>
	 	* Purpose:  Returns invoice_part_id Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_invoice_part_id(){
		return $this->fields['invoice_part_id'];
	}
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_id<br>
	 	* Purpose:  Fetch invoice_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_id
		 *
		*/
	function get_invoice_id() {
		return $this->fields['invoice_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_id<br>
	 	* Purpose:  Fetch product_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_id
		 *
		*/
	function get_product_id() {
		return $this->fields['product_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_part_qty<br>
	 	* Purpose:  Fetch invoice_part_qty Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_part_qty
		 *
		*/
	function get_invoice_part_qty() {
		return $this->fields['invoice_part_qty'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_part_amount<br>
	 	* Purpose:  Fetch invoice_part_amount Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_part_amount
		 *
		*/
	function get_invoice_part_amount() {
		return $this->fields['invoice_part_amount'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_invoice_part_sub_total<br>
	 	* Purpose:  Fetch invoice_part_sub_total Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String invoice_part_sub_total
		 *
		*/
	function get_invoice_part_sub_total() {
		return $this->fields['invoice_part_sub_total'];
	}


	 function get_product_sku() {
 	return $this->fields['product_sku'];
 }
	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_type<br>
	 	* Purpose:  Fetch product_type Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_type
		 *
		*/
	function get_product_type() {
		return $this->fields['product_type'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_quantity<br>
	 	* Purpose:  Fetch product_quantity Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_quantity
		 *
		*/
	function get_product_quantity() {
		return $this->fields['product_quantity'];
	}

	function  get_product_upc() {
		return $this->fields['product_upc'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_model<br>
	 	* Purpose:  Fetch product_model Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_model
		 *
		*/
	function get_product_model() {
		return $this->fields['product_model'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_image<br>
	 	* Purpose:  Fetch product_image Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_image
		 *
		*/
	function get_product_image() {
		return $this->fields['product_image'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_price<br>
	 	* Purpose:  Fetch product_price Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_price
		 *
		*/
	function get_product_price() {
		return $this->fields['product_price'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_virtual<br>
	 	* Purpose:  Fetch product_virtual Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_virtual
		 *
		*/
	function get_product_virtual() {
		return $this->fields['product_virtual'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_date_added<br>
	 	* Purpose:  Fetch product_date_added Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_date_added
		 *
		*/
	function get_product_date_added() {
		return $this->fields['product_date_added'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_date_available<br>
	 	* Purpose:  Fetch product_date_available Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_date_available
		 *
		*/
	function get_product_date_available() {
		return $this->fields['product_date_available'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_weight<br>
	 	* Purpose:  Fetch product_weight Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_weight
		 *
		*/
	function get_product_weight() {
		return $this->fields['product_weight'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_status<br>
	 	* Purpose:  Fetch product_status Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_status
		 *
		*/
	function get_product_status() {
		return $this->fields['product_status'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_tax_class_id<br>
	 	* Purpose:  Fetch tax_class_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String tax_class_id
		 *
		*/
	function get_tax_class_id() {
		return $this->fields['tax_class_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_manufacturer_id<br>
	 	* Purpose:  Fetch manufacturer_id Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String manufacturer_id
		 *
		*/
	function get_manufacturer_id() {
		return $this->fields['manufacturer_id'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_ordered<br>
	 	* Purpose:  Fetch product_ordered Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_ordered
		 *
		*/
	function get_product_ordered() {
		return $this->fields['product_ordered'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_quantity_order_min<br>
	 	* Purpose:  Fetch product_quantity_order_min Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_quantity_order_min
		 *
		*/
	function get_product_quantity_order_min() {
		return $this->fields['product_quantity_order_min'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_quantity_order_units<br>
	 	* Purpose:  Fetch product_quantity_order_units Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_quantity_order_units
		 *
		*/
	function get_product_quantity_order_units() {
		return $this->fields['product_quantity_order_units'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_priced_by_attribute<br>
	 	* Purpose:  Fetch product_priced_by_attribute Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_priced_by_attribute
		 *
		*/
	function get_product_priced_by_attribute() {
		return $this->fields['product_priced_by_attribute'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_is_free<br>
	 	* Purpose:  Fetch product_is_free Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_is_free
		 *
		*/
	function get_product_is_free() {
		return $this->fields['product_is_free'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_is_call<br>
	 	* Purpose:  Fetch product_is_call Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_is_call
		 *
		*/
	function get_product_is_call() {
		return $this->fields['product_is_call'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_is_always_free_shipping<br>
	 	* Purpose:  Fetch product_is_always_free_shipping Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_is_always_free_shipping
		 *
		*/
	function get_product_is_always_free_shipping() {
		return $this->fields['product_is_always_free_shipping'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_product_quantity_order_max<br>
	 	* Purpose:  Fetch product_quantity_order_max Database field<br>
	 	*
	 	* @author Cite CMS Developer
	 	* @return String product_quantity_order_max
		 *
		*/
	function get_product_quantity_order_max() {
		return $this->fields['product_quantity_order_max'];
	}

	/**
	 	* Type:     Public Getter<br>
	 	* Name:     get_last_modified<br>
	 	* Purpose:  Returns last_modified Database field<br>
	 	*
	 	* @author Cite CMS Developer Module
	 	* @return String last_modified
		 *
		*/
 function get_last_modified(){
		return $this->fields['last_modified'];
	}

}
?>