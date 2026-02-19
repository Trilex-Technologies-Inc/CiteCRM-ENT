<!-- view_tax_rate -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View tax_rate ID# {$tax_rate->get_tax_rate_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=tax_rate:update_tax_rate&tax_rate_id={$tax_rate->get_tax_rate_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=tax_rate:delete_tax_rate&tax_rate_id={$tax_rate->get_tax_rate_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_zone_id}</td>
		<td class="fieldValue">{$tax_rate->get_tax_rate_zone_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_id}</td>
		<td class="fieldValue">{$tax_rate->get_tax_class_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_priority}</td>
		<td class="fieldValue">{$tax_rate->get_tax_rate_priority()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_value}</td>
		<td class="fieldValue">{$tax_rate->get_tax_rate_value()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_description}</td>
		<td class="fieldValue">{$tax_rate->get_tax_rate_description()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
