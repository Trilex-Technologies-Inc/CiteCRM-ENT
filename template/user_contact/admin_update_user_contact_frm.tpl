<!-- newContactFrm -->
{include file="core/header.tpl"}

{if $errorOccurred}
<table cellpadding="3" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}

{validate field="contact_type"	criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_contact_type</span><br>"}
{validate field="contact_value"	criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_contact_value</span><br>"}
	
{if $errorOccurred}
		</td>
	</tr>
</table>
<br>
{/if}



<form method ="POST" action="/index.php?page=user_contact:admin_update_user_contact" id="new_user_frm">

<span class="greetUser">{$translate_text_update_user_contact} {$user_contact->getContactType()}</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_user_contact_type}</td>
		<td class="fieldValue">{html_select_contact_type contact_type=$user_contact->getContactType()}</td>
		<td class="fieldValue"><input type="text" name="contact_value" value="{$user_contact->getContactValue()}" size="20"></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="3">
			<input type="hidden" name="contact_id" value="{$user_contact->getContactID()}">
			<input type="hidden" name="user_id" value="{$user_contact->getUserID()}">
			<input type="submit" name="submit" value="{$translate_button_submit}">
		</td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}