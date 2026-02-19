<!-- view_check_payment -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View check_payment ID# {$check_payment->get_check_payment_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=check_payment:update_check_payment&check_payment_id={$check_payment->get_check_payment_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=check_payment:delete_check_payment&check_payment_id={$check_payment->get_check_payment_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue">{$check_payment->get_invoice_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_amount}</td>
		<td class="fieldValue">{$check_payment->get_check_payment_amount()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_number}</td>
		<td class="fieldValue">{$check_payment->get_check_payment_number()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_enter_by}</td>
		<td class="fieldValue">{$check_payment->get_check_payment_enter_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_date}</td>
		<td class="fieldValue">{$check_payment->get_check_payment_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_check_payment_status}</td>
		<td class="fieldValue">{$check_payment->get_check_payment_status()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
