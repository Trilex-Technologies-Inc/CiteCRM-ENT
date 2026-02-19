<!-- ajax_load_specifications.tpl -->
<table cellpadding="5" cellspacing="0" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_type}</td>
		<td class="fieldValue">{$productObj->get_product_type()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity}</td>
		<td class="fieldValue">{$productObj->get_product_quantity()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_model}</td>
		<td class="fieldValue">{$productObj->get_product_model()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_image}</td>
		<td class="fieldValue">{$productObj->get_product_image()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_price}</td>
		<td class="fieldValue">${$productObj->get_product_price()}</td>
	</tr>
    <tr>
		<td class="formAreaTitle">Markup</td>
		<td class="fieldValue">${$productObj->fields.product_markup}</td>
	</tr>
        
	<tr>
		<td class="formAreaTitle">{$translate_field_product_virtual}</td>
		<td class="fieldValue">{$productObj->get_product_virtual()|yesno}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_date_added}</td>
		<td class="fieldValue">{$productObj->get_product_date_added()|date_format:$DATE_FORMAT}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_date_available}</td>
		<td class="fieldValue">{$productObj->get_product_date_available()|date_format:$DATE_FORMAT}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_weight}</td>
		<td class="fieldValue">{$productObj->get_product_weight()} lbs</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_status}</td>
		<td class="fieldValue">{$productObj->get_product_status()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_id}</td>
		<td class="fieldValue">{$productObj->get_tax_class_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacturer_id}</td>
		<td class="fieldValue">{$productObj->get_manufacturer_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_ordered}</td>
		<td class="fieldValue">{$productObj->get_product_ordered()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_min}</td>
		<td class="fieldValue">{$productObj->get_product_quantity_order_min()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_units}</td>
		<td class="fieldValue">{$productObj->get_product_quantity_order_units()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_priced_by_attribute}</td>
		<td class="fieldValue">{$productObj->get_product_priced_by_attribute()|yesno}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_free}</td>
		<td class="fieldValue">{$productObj->get_product_is_free()|yesno}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_call}</td>
		<td class="fieldValue">{$productObj->get_product_is_call()|yesno}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_always_free_shipping}</td>
		<td class="fieldValue">{$productObj->get_product_is_always_free_shipping()|yesno  }</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_max}</td>
		<td class="fieldValue">{$productObj->get_product_quantity_order_max()}</td>
	</tr><tr>
        <td class="fieldValue" colspan="2"><a href="javascript:edit_specifications()">Edit</a></td>
    </tr>
</table>