<!-- view_product_description -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View product_description ID# {$product_description->get_product_description_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=product_description:update_product_description&product_description_id={$product_description->get_product_description_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=product_description:delete_product_description&product_description_id={$product_description->get_product_description_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue">{$product_description->get_product_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_name}</td>
		<td class="fieldValue">{$product_description->get_product_name()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_description}</td>
		<td class="fieldValue">{$product_description->get_product_description()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_url}</td>
		<td class="fieldValue">{$product_description->get_product_url()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
