<!-- update_credit_card_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Credit Cards ID# {$credit_card->get_credit_card_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="credit_card_type" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_credit_card_type</span><br>"}
{validate field="credit_card_name" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_credit_card_name</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=credit_card:update_credit_card" id="add_credit_card_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_type}</td>
		<td class="fieldValue"><input type="text" name="credit_card_type" value="{$credit_card->get_credit_card_type()}" id="credit_card_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_name}</td>
		<td class="fieldValue"><input type="text" name="credit_card_name" value="{$credit_card->get_credit_card_name()}" id="credit_card_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_credit_card_active}</td>
		<td class="fieldValue"><input type="checkbox" name="credit_card_active" value="1" id="credit_card_active">
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="credit_card_id" value="{$credit_card_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
