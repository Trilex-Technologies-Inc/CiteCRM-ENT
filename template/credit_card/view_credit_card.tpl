<!-- view_credit_card -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View credit_card ID# {$credit_card->get_credit_card_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=credit_card:update_credit_card&credit_card_id={$credit_card->get_credit_card_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=credit_card:delete_credit_card&credit_card_id={$credit_card->get_credit_card_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_type}</td>
		<td class="fieldValue">{$credit_card->get_credit_card_type()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_name}</td>
		<td class="fieldValue">{$credit_card->get_credit_card_name()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_active}</td>
		<td class="fieldValue">{$credit_card->get_credit_card_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
