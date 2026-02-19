<!-- view_invoice_labor -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View invoice_labor ID# {$invoice_labor->get_invoice_labor_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=invoice_labor:update_invoice_labor&invoice_labor_id={$invoice_labor->get_invoice_labor_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=invoice_labor:delete_invoice_labor&invoice_labor_id={$invoice_labor->get_invoice_labor_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue">{$invoice_labor->get_invoice_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_hours}</td>
		<td class="fieldValue">{$invoice_labor->get_invoice_labor_hours()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_rate}</td>
		<td class="fieldValue">{$invoice_labor->get_invoice_labor_rate()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_description}</td>
		<td class="fieldValue">{$invoice_labor->get_invoice_labor_description()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_sub_total}</td>
		<td class="fieldValue">{$invoice_labor->get_invoice_labor_sub_total()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
