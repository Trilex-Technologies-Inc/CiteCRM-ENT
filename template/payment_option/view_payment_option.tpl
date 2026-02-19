<!-- view_payment_option -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View payment_option ID# {$payment_option->get_payment_option_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=payment_option:update_payment_option&payment_option_id={$payment_option->get_payment_option_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=payment_option:delete_payment_option&payment_option_id={$payment_option->get_payment_option_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_text}</td>
		<td class="fieldValue">{$payment_option->get_payment_option_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_active}</td>
		<td class="fieldValue">{$payment_option->get_payment_option_active()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_order}</td>
		<td class="fieldValue">{$payment_option->get_payment_option_order()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
