<!-- view_tax_type -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View tax_type ID# {$tax_type->get_tax_type_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=tax_type:update_tax_type&tax_type_id={$tax_type->get_tax_type_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=tax_type:delete_tax_type&tax_type_id={$tax_type->get_tax_type_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type_text}</td>
		<td class="fieldValue">{$tax_type->get_tax_type_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type_active}</td>
		<td class="fieldValue">{$tax_type->get_tax_type_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
