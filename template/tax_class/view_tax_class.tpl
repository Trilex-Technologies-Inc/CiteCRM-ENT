<!-- view_tax_class -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View tax_class ID# {$tax_class->get_tax_class_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=tax_class:update_tax_class&tax_class_id={$tax_class->get_tax_class_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=tax_class:delete_tax_class&tax_class_id={$tax_class->get_tax_class_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_title}</td>
		<td class="fieldValue">{$tax_class->get_tax_class_title()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_description}</td>
		<td class="fieldValue">{$tax_class->get_tax_class_description()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type}</td>
		<td class="fieldValue">{$tax_class->get_tax_type()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_active}</td>
		<td class="fieldValue">{$tax_class->get_tax_class_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
