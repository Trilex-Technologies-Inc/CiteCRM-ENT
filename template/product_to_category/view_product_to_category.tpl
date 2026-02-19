<!-- view_product_to_category -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View product_to_category ID# {$product_to_category->get_product_to_category_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=product_to_category:update_product_to_category&product_to_category_id={$product_to_category->get_product_to_category_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=product_to_category:delete_product_to_category&product_to_category_id={$product_to_category->get_product_to_category_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue">{$product_to_category->get_product_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_category_id}</td>
		<td class="fieldValue">{$product_to_category->get_category_id()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
