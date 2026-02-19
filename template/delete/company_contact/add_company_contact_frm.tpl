<!-- add_company_contact_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to company_contact</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=company_contact:add_company_contact" id="add_company_contact_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
	</tr>
	<tr>
		<td class="formAreaTitle">Contact Type</td>
		<td class="fieldValue"><input type="text" name="company_contact_type" value="{$company_contact_type}" size="" id="company_contact_type">
			{validate id="company_contact_type" message="<br><span class='error'>Form Error: The field company_contact_type Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Value</td>
		<td class="fieldValue"><input type="text" name="company_contact_value" value="{$company_contact_value}" size="" id="company_contact_value">
			{validate id="company_contact_value" message="<br><span class='error'>Form Error: The field company_contact_value Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="4">
			<input type="hidden" name="company_id" value="{$company_id}" size="" id="company_id">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
