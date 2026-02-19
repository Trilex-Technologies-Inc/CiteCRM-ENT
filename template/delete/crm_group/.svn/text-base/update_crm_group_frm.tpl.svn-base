<!-- update_crm_group_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Group ID# {$crm_group->get_crm_group_id()}</span></td>
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

<form method="post" action="index.php?page=crm_group:update_crm_group" id="add_crm_group_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_crm_group_text}</td>
		<td class="fieldValue"><input type="text" name="crm_group_text" value="{$crm_group->get_crm_group_text()}" id="crm_group_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_crm_group_bit}</td>
		<td class="fieldValue"><input type="text" name="crm_group_bit" value="{$crm_group->get_crm_group_bit()}" id="crm_group_bit">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_crm_group_active}</td>
		<td class="fieldValue"><input type="text" name="crm_group_active" value="{$crm_group->get_crm_group_active()}" id="crm_group_active">
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="crm_group_id" value="{$crm_group_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
