<!-- update_invoice_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Invoice ID# {$invoice->get_invoice_id()}</span></td>
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

<form method="post" action="index.php?page=invoice:update_invoice" id="add_invoice_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_create_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_create_date" value="{$invoice->get_invoice_create_date()}" id="invoice_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_create_by}</td>
		<td class="fieldValue"><input type="text" name="invoice_create_by" value="{$invoice->get_invoice_create_by()}" id="invoice_create_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_due_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_due_date" value="{$invoice->get_invoice_due_date()}" id="invoice_due_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_amount" value="{$invoice->get_invoice_amount()}" id="invoice_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_discount_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_discount_amount" value="{$invoice->get_invoice_discount_amount()}" id="invoice_discount_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_total_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_total_amount" value="{$invoice->get_invoice_total_amount()}" id="invoice_total_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_status}</td>
		<td class="fieldValue"><input type="text" name="invoice_status" value="{$invoice->get_invoice_status()}" id="invoice_status">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_paid_date}</td>
		<td class="fieldValue"><input type="text" name="invoice_paid_date" value="{$invoice->get_invoice_paid_date()}" id="invoice_paid_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_paid_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_paid_amount" value="{$invoice->get_invoice_paid_amount()}" id="invoice_paid_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_payment_type}</td>
		<td class="fieldValue"><input type="text" name="invoice_payment_type" value="{$invoice->get_invoice_payment_type()}" id="invoice_payment_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_barcode}</td>
		<td class="fieldValue"><input type="text" name="invoice_barcode" value="{$invoice->get_invoice_barcode()}" id="invoice_barcode">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_payment_enter_by}</td>
		<td class="fieldValue"><input type="text" name="invoice_payment_enter_by" value="{$invoice->get_invoice_payment_enter_by()}" id="invoice_payment_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_memo}</td>
		<td class="fieldValue"><input type="text" name="invoice_memo" value="{$invoice->get_invoice_memo()}" id="invoice_memo">
</td>
	</tr>
	<tr>
		<td colspan="14">
		<input type="hidden" name="invoice_id" value="{$invoice_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
