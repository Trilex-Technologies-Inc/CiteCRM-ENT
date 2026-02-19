<!-- ajax_new_contact.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Add Company Contact</span></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="3" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">First Name</td>
		<td class="fieldValue" ><input type="text"  size="20" id="user_first_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Last Name</td>
		<td class="fieldValue"><input type="text" name="user_last_name" size="20" id="user_last_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Email Address</td>
		<td class="fieldValue"><input type="text" name="user_email" size="30" id="user_email"></td>
	<tr><tr>
		<td class="formAreaTitle">Primary Phone</td>
		<td class="fieldValue"><input type="text" name="primary_phone" id="primary_phone" value=""> <b>Ext</b> <input type="text" id="user_extension" size="8">
        </td>
	</tr><tr>
		<td class="formAreaTitle">Mobile Phone</td>
		<td class="fieldValue"><input type="text" name="mobile_phone" id="mobile_phone" value=""></td>
	</tr><tr>
        <td class="formAreaTitle">Other Phone</td>
		<td class="fieldValue"><input type="text" name="secondary_phone" id="secondary_phone" value=""></td>
	</tr><tr>
        <td class="formAreaTitle">Address</td>
        <td>{html_select_company_address company_id=$company_id fieldName=company_address_id}</td>
	</tr><tr>
		<td class="fieldValue" colspan="2">
			<input type="hidden" id="user_type_id" value="3">
			<input type="button" name="submit" value="Save" onclick="save_user()">
            <input type="button" name="cancel" onclick="javascript:load_company_users('Contacts','user_id', 'ASC', '');" value="cancel">
		</td>
	</tr>
</table>