<!-- update_payment_option_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Payment Options ID# {$payment_option->get_payment_option_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="payment_option_text" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_payment_option_text</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=payment_option:update_payment_option" id="add_payment_option_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_text}</td>
		<td class="fieldValue"><input type="text" name="payment_option_text" value="{$payment_option->get_payment_option_text()}" id="payment_option_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_active}</td>
		<td class="fieldValue"><input type="text" name="payment_option_active" value="{$payment_option->get_payment_option_active()}" id="payment_option_active">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_payment_option_order}</td>
		<td class="fieldValue"><input type="text" name="payment_option_order" value="{$payment_option->get_payment_option_order()}" id="payment_option_order">
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="payment_option_id" value="{$payment_option_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
