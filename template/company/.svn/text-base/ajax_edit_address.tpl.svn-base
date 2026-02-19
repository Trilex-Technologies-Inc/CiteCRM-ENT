<!-- ajax_edit_address.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Edit {$companyAddressObj->get_company_address_type()} Address</span></td>
	</tr>
</table>
<table cellpadding="1" cellspacing="3" class="formArea">
	<tr>
		<td class="formAreaTitle">Address Type</td>
		<td class="fieldValue">{$companyAddressObj->get_company_address_type()}
			<input type="hidden" id="company_address_type" value="{$companyAddressObj->get_company_address_type()}">
		</td>
	</tr><tr>
		<td class="formAreaTitle">Street</td>
		<td class="fieldValue"><input type="text" id="company_street_1" value="{$companyAddressObj->get_company_street_1()}"></td>
	</tr><tr>
		<td class="formAreaTitle">Street Cnt.</td>
		<td class="fieldValue"><input type="text" id="company_street_2" value="{$companyAddressObj->get_company_street_2()}"></td>
	</tr><tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue"><input type="text" id="company_city" value="{$companyAddressObj->get_company_city()}"></td>
	</tr><tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><input type="text" name="state_name" id="state_name" value="{$companyAddressObj->get_company_state()}"></td>
	</tr><tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue"><input type="text" id="company_postal_code" value="{$companyAddressObj->get_company_postal_code()}"></td>
	</tr><tr>
		<td class="fieldValue" colspan="2">
            <input type="hidden" id="company_address_id" value="{$companyAddressObj->get_company_address_id()}">
            <input type="button" name="submit" value="save" onclick="update_address()">
			<input type="button" name="cancel" value="Cancel" onclick="javascript:load_company_address('Address','Service');">
		</td>
	</tr>
</table>