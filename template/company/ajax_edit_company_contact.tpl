<!-- ajax_edit_company_contact.tpl -->
<table>
    <tr>
        <td><span class="greetUser">Edit Primary Contact</span></td>
    </tr>
</table>
<table cellpadding="1" cellspacing="3" class="formArea" >
	<tr>
		<td class="formAreaTitle"><b>Contact</b></td>
		<td class="fieldValue"><input type="text" id="business_contact" value="{$business_contact}"></td>
	</tr><tr>
		<td class="formAreaTitle"><b>Primary Phone</b></td>
		<td class="fieldValue"><input type="text" name="business_phone" id="business_phone" value="{$business_phone}"></td>
	</tr><tr>	
		<td class="formAreaTitle"><b>Fax</b></td>
		<td class="fieldValue"><input type="text" name="business_fax" id="business_fax" value="{$business_fax}"></td>
	</tr><tr>
		<td class="formAreaTitle"><b>Email</b></td>
		<td class="fieldValue"><input type="text" id="business_email" value="{$business_email}"></td>
	</tr><tr>
		<td class="fieldValue"><input type="button" value="Save" onclick="save_company_contact()"> <input type="button" name="cancel" value="Cancel" onclick="load_company_address('Address','Service');"></td>
	</tr>
</table>
