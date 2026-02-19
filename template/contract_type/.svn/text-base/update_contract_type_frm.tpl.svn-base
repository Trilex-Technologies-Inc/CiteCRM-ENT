<!-- update_contract_type_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Contract Type ID# {$contract_type->get_contract_type_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="contract_type_name" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_contract_type_name</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=contract_type:update_contract_type" id="add_contract_type_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_contract_type_name}</td>
		<td class="fieldValue"><input type="text" name="contract_type_name" value="{$contract_type->get_contract_type_name()}" id="contract_type_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_contract_type_text}</td>
		<td class="fieldValue"><input type="text" name="contract_type_text" value="{$contract_type->get_contract_type_text()}" id="contract_type_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_contract_type_rate}</td>
		<td class="fieldValue"><input type="text" name="contract_type_rate" value="{$contract_type->get_contract_type_rate()}" id="contract_type_rate">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_contract_type_term}</td>
		<td class="fieldValue"><input type="text" name="contract_type_term" value="{$contract_type->get_contract_type_term()}" id="contract_type_term">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_contract_type_active}</td>
		<td class="fieldValue"><input type="text" name="contract_type_active" value="{$contract_type->get_contract_type_active()}" id="contract_type_active">
</td>
	</tr>
	<tr>
		<td colspan="6">
		<input type="hidden" name="contract_type_id" value="{$contract_type_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
