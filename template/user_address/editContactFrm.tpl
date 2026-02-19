<!-- editContactFrm -->
{include file="core/header.tpl"}

<form method ="POST" action="/index.php?page=user:editContact" id="new_user_frm">

<span class="greetUser">New Contact</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> Contact Type</td>
		<td class="fieldValue">{html_select_contact_type contact_type=$contact->GetContactType()}
			{validate id="contact_type"  message="<br><span class=\"errorText\">Please Select A Contact Type!</span>"}
		</td>
		<td class="fieldValue"><input type="text" name="contact_value" value="{$contact->getContactValue()}" size="20">
			{validate id="contact_value"  message="<br><span class=\"errorText\">Please Enter the Contact Value!</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="3">
			<input type="hidden" name="contact_id" value="{$contact->getContactID()}">
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}