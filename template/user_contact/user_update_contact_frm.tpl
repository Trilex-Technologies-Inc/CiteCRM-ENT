<!-- user_update_contact_frm.tpl -->
{include file="core/header.tpl"}
<form method ="POST" action="/index.php?page=user_contact:user_update_contact" id="new_user_frm">

<span class="greetUser">Update Contact</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle" nowrap="true"><span class="inputRequirement">*</span> Contact Type</td>
		<td class="fieldValue" nowrap="true">{html_select_contact_type}
			{validate id="contact_type"  message="<br><span class=\"errorText\">Please Select A Contact Type!</span>"}
		</td>
		<td class="fieldValue"><input type="text" name="contact_value" size="20" value="{$contact->getContactValue()}">
			{validate id="contact_value"  message="<br><span class=\"errorText\">Please Enter the Contact Value!</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="3">
			<input type="hidden" name="user_contact_id" value="{$user_contact_id}">
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}