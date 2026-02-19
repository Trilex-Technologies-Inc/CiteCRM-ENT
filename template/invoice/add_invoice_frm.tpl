<!-- add_invoice_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Invoice</td>
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

<form method="post" action="{$ROOT_PATH}/index.php?page=invoice:add_invoice" id="add_invoice_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_create_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_create_date" value="{$invoice_create_date}" size="" id="invoice_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_create_by}</td>
		<td class="fieldValue"><input type="text" name="invoice_create_by" value="{$invoice_create_by}" size="" id="invoice_create_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_due_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_due_date" value="{$invoice_due_date}" size="" id="invoice_due_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_amount" value="{$invoice_amount}" size="" id="invoice_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_discount_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_discount_amount" value="{$invoice_discount_amount}" size="" id="invoice_discount_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_total_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_total_amount" value="{$invoice_total_amount}" size="" id="invoice_total_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_status}</td>
		<td class="fieldValue"><input type="text" name="invoice_status" value="{$invoice_status}" size="" id="invoice_status">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_paid_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_paid_date" value="{$invoice_paid_date}" size="" id="invoice_paid_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_paid_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_paid_amount" value="{$invoice_paid_amount}" size="" id="invoice_paid_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_payment_type}</td>
		<td class="fieldValue"><input type="text" name="invoice_payment_type" value="{$invoice_payment_type}" size="" id="invoice_payment_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_barcode}</td>
		<td class="fieldValue"><input type="text" name="invoice_barcode" value="{$invoice_barcode}" size="" id="invoice_barcode">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_payment_enter_by}</td>
		<td class="fieldValue"><input type="text" name="invoice_payment_enter_by" value="{$invoice_payment_enter_by}" size="" id="invoice_payment_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_memo}</td>
		<td class="fieldValue"><input type="text" name="invoice_memo" value="{$invoice_memo}" size="" id="invoice_memo">
</td>
	</tr>
	<tr>
		<td colspan="14">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
