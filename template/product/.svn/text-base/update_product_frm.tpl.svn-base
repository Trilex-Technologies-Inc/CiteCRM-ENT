<!-- update_product_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Products ID# {$product->get_product_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=product:update_product" id="add_product_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_type}</td>
		<td class="fieldValue"><input type="text" name="product_type" value="{$product->get_product_type()}" id="product_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity}</td>
		<td class="fieldValue"><input type="text" name="product_quantity" value="{$product->get_product_quantity()}" id="product_quantity">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_model}</td>
		<td class="fieldValue"><input type="text" name="product_model" value="{$product->get_product_model()}" id="product_model">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_image}</td>
		<td class="fieldValue"><input type="text" name="product_image" value="{$product->get_product_image()}" id="product_image">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_price}</td>
		<td class="fieldValue"><input type="text" name="product_price" value="{$product->get_product_price()}" id="product_price">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_virtual}</td>
		<td class="fieldValue"><input type="text" name="product_virtual" value="{$product->get_product_virtual()}" id="product_virtual">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_date_added}</td>
		<td class="fieldValue"><input type="text" name="product_date_added" value="{$product->get_product_date_added()}" id="product_date_added">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_date_available}</td>
		<td class="fieldValue"><input type="text" name="product_date_available" value="{$product->get_product_date_available()}" id="product_date_available">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_weight}</td>
		<td class="fieldValue"><input type="text" name="product_weight" value="{$product->get_product_weight()}" id="product_weight">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_status}</td>
		<td class="fieldValue"><input type="text" name="product_status" value="{$product->get_product_status()}" id="product_status">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_id}</td>
		<td class="fieldValue"><input type="text" name="tax_class_id" value="{$product->get_tax_class_id()}" id="tax_class_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacturer_id}</td>
		<td class="fieldValue"><input type="text" name="manufacturer_id" value="{$product->get_manufacturer_id()}" id="manufacturer_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_ordered}</td>
		<td class="fieldValue"><input type="text" name="product_ordered" value="{$product->get_product_ordered()}" id="product_ordered">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_min}</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_min" value="{$product->get_product_quantity_order_min()}" id="product_quantity_order_min">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_units}</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_units" value="{$product->get_product_quantity_order_units()}" id="product_quantity_order_units">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_priced_by_attribute}</td>
		<td class="fieldValue"><input type="text" name="product_priced_by_attribute" value="{$product->get_product_priced_by_attribute()}" id="product_priced_by_attribute">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_free}</td>
		<td class="fieldValue"><input type="text" name="product_is_free" value="{$product->get_product_is_free()}" id="product_is_free">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_call}</td>
		<td class="fieldValue"><input type="text" name="product_is_call" value="{$product->get_product_is_call()}" id="product_is_call">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_is_always_free_shipping}</td>
		<td class="fieldValue"><input type="text" name="product_is_always_free_shipping" value="{$product->get_product_is_always_free_shipping()}" id="product_is_always_free_shipping">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_quantity_order_max}</td>
		<td class="fieldValue"><input type="text" name="product_quantity_order_max" value="{$product->get_product_quantity_order_max()}" id="product_quantity_order_max">
</td>
	</tr>
	<tr>
		<td colspan="21">
		<input type="hidden" name="product_id" value="{$product_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
