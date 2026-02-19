<!-- ajax_load_employee_edit.tpl -->
<table>
	<tr>
		<td>
			<a href="javascript:load_details()">Cancel</a> <span class="small">|</span> <a href="javascript:edit_window('reset_pwd')">Reset Password</a>
			
			<table cellpadding="3" cellspacing="0" class="small">
				<tr>
					<td ><strong>First Name</strong></td>
					<td ><input type="text" name="first_name" id="first_name" value="{$userObj->getUserFirstName()}" size="20"></td>
					<td ><strong>Last Name</strong></td>
					<td ><input type="text" name="last_name" id="last_name" value="{$userObj->getUserLastName()}" size="20"></td>
				</tr><tr>
					<td ><strong>Email</strong></td>
					<td colspan="2"><input type="text" id="email" name="email" value="{$userObj->getUserEmail()}" size="40"></td>
				</tr>
					
			</table>
			<br>
			<table cellpadding="3" cellspacing="0"  class="small">
                <tr>
                    <td><b>Street</b></td>
                    <td colspan="3"><input type="text" name="address_street" id="address_street" size="20" id="address_street" value="{$addressObj->getAddressStreet()}"></td>
                </tr><tr>
                    <td><b>Street 2</b></td>
                    <td colspan="3"><input type="text" name="address_street_2" id="address_street_2" size="20" id="address_street_2" value="{$addressObj->getAddressStreet2()}"></td>
                </tr><tr>
                    <td><b>City</b></td>
                    <td colspan="3"><input type="text" name="address_city" id="address_city" size="20" id="address_city" value="{$addressObj->getAddressCity()}"></td>
                </tr><tr>
                    <td><b>State</b></td>
                    <td colspan="3"><input type="text" name="address_state" id="address_state" value="{$addressObj->getAddressState()}"></td>
                </tr><tr>
                    <td><b>Postal Code/Zip</b></td>
                    <td colspan="3"><input type="text" name="address_postal_code" id="address_postal_code" size="20" id="address_postal_code" value="{$addressObj->getAddressPostalCode()}"></td>
                </tr><tr>
					<td colspan="4">
					<input type="hidden" name="address_id" id="address_id" value="{$addressObj->getAddressID()}">
					<input type="submit" name="submit" value="Save" onclick="save('edit')"></td>
				</tr>
                
            </table>
        </td>
    </tr>
</table>
		</td>
	</tr>
</table>