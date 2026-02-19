<!-- add_invoice_labor_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Invoice Labor</td>
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

<form method="post" action="index.php?page=invoice_labor:add_invoice_labor" id="add_invoice_labor_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue"><input type="text" name="invoice_id" value="{$invoice_id}" size="" id="invoice_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_hours}</td>
		<td class="fieldValue"><input type="text" name="invoice_labor_hours" value="{$invoice_labor_hours}" size="" id="invoice_labor_hours">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_rate}</td>
		<td class="fieldValue"><input type="text" name="invoice_labor_rate" value="{$invoice_labor_rate}" size="" id="invoice_labor_rate">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_description}</td>
		<td class="fieldValue"><input type="text" name="invoice_labor_description" value="{$invoice_labor_description}" size="" id="invoice_labor_description">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_labor_sub_total}</td>
		<td class="fieldValue"><input type="text" name="invoice_labor_sub_total" value="{$invoice_labor_sub_total}" size="" id="invoice_labor_sub_total">
</td>
	</tr>
	<tr>
		<td colspan="6">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
