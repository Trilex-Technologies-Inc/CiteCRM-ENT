<!-- add_check_payment_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Check Payment</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="invoice_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_invoice_id</span><br>"}
{validate field="check_payment_amount" criteria="isPrice" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_isPrice_check_payment_amount</span><br>"}
{validate field="check_payment_number" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_check_payment_number</span><br>"}
{validate field="check_payment_enter_by" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_check_payment_enter_by</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=check_payment:add_check_payment" id="add_check_payment_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue"><input type="text" name="invoice_id" value="{$invoice_id}" size="" id="invoice_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_amount}</td>
		<td class="fieldValue"><input type="text" name="check_payment_amount" value="{$check_payment_amount}" size="" id="check_payment_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_number}</td>
		<td class="fieldValue"><input type="text" name="check_payment_number" value="{$check_payment_number}" size="" id="check_payment_number">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_enter_by}</td>
		<td class="fieldValue"><input type="text" name="check_payment_enter_by" value="{$check_payment_enter_by}" size="" id="check_payment_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_date}</td>
		<td class="fieldValue"><input type="text" name="check_payment_date" value="{$check_payment_date}" size="" id="check_payment_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_status}</td>
		<td class="fieldValue"><input type="text" name="check_payment_status" value="{$check_payment_status}" size="" id="check_payment_status">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
