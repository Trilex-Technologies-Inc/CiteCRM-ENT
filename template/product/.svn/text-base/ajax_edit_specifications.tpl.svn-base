<!-- ajax_edit_specifications.tpl -->
<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle" nowrap="true">UPC Code</td>
		<td class="fieldValue"><input type="text" name="upcCode" value="{$productObj->get_product_upc()}" id="upcCode"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Category</td>
		<td class="fieldValue">{html_select_product_category fieldName="category_id" value=$category_id}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">SKU</td>
		<td class="fieldValue"><input type="text" name="product_sku" value="{$productObj->get_product_sku()}" id="product_sku"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Manufacture</td>
		<td class="fieldValue">{html_select_product_manufacture fieldName="manufacture_id" value=$manufacture_id}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Model</td>
		<td class="fieldValue"><input type="text" name="product_model" value="{$productObj->get_product_model()}" id="product_model"></td>
	</tr><tr>	
		<td class="formAreaTitle" nowrap="true">Status</td>
		<td class="fieldValue">{html_select_product_status fieldName="product_status" value=$productObj->get_product_status()}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Call For Price</td>
		<td class="fieldValue">{html_select_yesno fieldName="product_is_call" value=$productObj->get_product_is_call()}</td>
	</tr><tr>	
		<td class="formAreaTitle" nowrap="true">Price $</td>
		<td class="fieldValue"><input type="text" name="product_price" value="{$productObj->get_product_price()}" id="product_price" size="8"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Markup $</td>
		<td class="fieldValue"><input type="text" name="product_markup" value="{$product_markup}" id="product_markup" size="8"></td>
	</tr><tr>			
		<td class="formAreaTitle" nowrap="true">Tax Class</td>
		<td class="fieldValue">tax_class_id</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Priced By Attributes</td>
		<td class="fieldValue">{html_select_yesno fieldName="product_priced_by_attribute" value=$product_priced_by_attribute}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Quantity</td>
		<td class="fieldValue"><input type="text" name="product_quantity" value="{$productObj->get_product_quantity()}" id="product_quantity" size="8"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Min Order</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_min" value="{$product_quantity_order_min|default:"1"}" id="product_quantity_order_min" size="8"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Max Order</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_max" value="{$product_quantity_order_max|default:"0"}" id="product_quantity_order_max" size="8"></td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Virtual Product</td>
		<td class="fieldValue">{html_select_yesno fieldName="product_virtual" value=$product_virtual}</td>	
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">On Order</td>
		<td class="fieldValue">{html_select_yesno fieldName="product_ordered" value=$product_ordered}</td> 
	</tr><tr>	
		<td class="formAreaTitle" nowrap="true">Units Orderd</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_units" value="{$product_quantity_order_units|default:"0"}" id="product_quantity_order_units" size="8"></td>
	</tr><tr>	
		<td class="formAreaTitle" nowrap="true">Free Shipping</td>
		<td class="fieldValue">{html_select_yesno fieldName="product_is_always_free_shipping" value=$product_is_always_free_shipping}</td> 
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Weight</td>
		<td class="fieldValue"><input type="text" name="product_weight" value="{$product_weight}" id="product_weight" size="8"> (lbs)</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Date Added</td>	
		<td class="fieldValue">
			<input type="text" name="product_date_added" value="{$product_date_added}" size="10" id="product_date_added">
			<input type="button" id="trigger_date_1" value="+">
			{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "product_date_added",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date_1"
						}
				 	);
				</script>
			{/literal}
			</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">Date Available</td>	
		<td class="fieldValue">
			<input type="text" name="product_date_available" value="{$product_date_available}" size="10" id="product_date_available">
			<input type="button" id="trigger_date_2" value="+">
			{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "product_date_available",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date_2"
						}
				 	);
				</script>
			{/literal}</td>
	</tr><tr>
		<td colspan="2">
				
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>
