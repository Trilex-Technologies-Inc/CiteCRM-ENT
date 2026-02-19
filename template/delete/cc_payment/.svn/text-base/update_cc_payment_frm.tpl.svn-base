<!-- update_cc_payment_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Credit Card Payment ID# {$cc_payment->get_cc_payment_id()}</span></td>
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
{validate field="cc_payment_amount" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_cc_payment_amount</span><br>"}
{validate field="cc_payment_number" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_cc_payment_number</span><br>"}
{validate field="cc_payment_expirdate" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_cc_payment_expirdate</span><br>"}
{validate field="cc_payment_enter_by" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_cc_payment_enter_by</span><br>"}
{validate field="cc_payment_date" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_cc_payment_date</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=cc_payment:update_cc_payment" id="add_cc_payment_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue"><input type="text" name="invoice_id" value="{$cc_payment->get_invoice_id()}" id="invoice_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_amount}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_amount" value="{$cc_payment->get_cc_payment_amount()}" id="cc_payment_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_number}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_number" value="{$cc_payment->get_cc_payment_number()}" id="cc_payment_number">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_expirdate}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_expirdate" value="{$cc_payment->get_cc_payment_expirdate()}" id="cc_payment_expirdate">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_enter_by}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_enter_by" value="{$cc_payment->get_cc_payment_enter_by()}" id="cc_payment_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_billing_attempt}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_billing_attempt" value="{$cc_payment->get_cc_payment_billing_attempt()}" id="cc_payment_billing_attempt">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_status}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_status" value="{$cc_payment->get_cc_payment_status()}" id="cc_payment_status">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_date}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_date" value="{$cc_payment->get_cc_payment_date()}" id="cc_payment_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_date_proc}</td>
		<td class="fieldValue"><input type="text" name="cc_payment_date_proc" value="{$cc_payment->get_cc_payment_date_proc()}" id="cc_payment_date_proc">
</td>
	</tr>
	<tr>
		<td colspan="10">
		<input type="hidden" name="cc_payment_id" value="{$cc_payment_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
