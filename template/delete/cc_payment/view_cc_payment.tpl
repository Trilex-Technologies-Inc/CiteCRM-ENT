<!-- view_cc_payment -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View cc_payment ID# {$cc_payment->get_cc_payment_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=cc_payment:update_cc_payment&cc_payment_id={$cc_payment->get_cc_payment_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=cc_payment:delete_cc_payment&cc_payment_id={$cc_payment->get_cc_payment_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue">{$cc_payment->get_invoice_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_amount}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_amount()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_number}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_number()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_expirdate}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_expirdate()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_enter_by}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_enter_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_billing_attempt}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_billing_attempt()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_status}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_status()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_date}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_cc_payment_date_proc}</td>
		<td class="fieldValue">{$cc_payment->get_cc_payment_date_proc()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
