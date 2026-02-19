<!-- ajax_edit_employee.tpl -->
<span class="greetUser">Edit Address</span>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%" style="background-color: #F0F8FF">
	<tr>
		<td class="productListing-data">
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="small"><b>Address Type</b></td>
					<td class="small">{$addressObj->getAddressType()}</td>
				</tr><tr>
					<td class="small"><b>Street</b></td>
					<td class="small"><input type="text" name="address_street" id="address_street" value="{$addressObj->getAddressStreet()}" size="40"></td>
				</tr><tr>
					<td class="small"><b>Street Cont</b></td>
					<td class="small"><input type="text" name="address_street_2" id="address_street_2" value="{$addressObj->getAddressStreet2()}" size="40"></td>
				</tr><tr>
					<td class="small"><b>City</b></td>
					<td class="small"><input type="text" name="address_city" id="address_city" value="{$addressObj->getAddressCity()}" size="40"></td>
				</tr><tr>
					<td class="small"><b>State</b></td>
					<td class="small"><input type="text" name="address_state" id="address_state" value="{$addressObj->getAddressState()}" size="30"></td>
				</tr><tr>
					<td class="small"><b>Postal Code</b></td>
					<td class="small"><input type="text" name="address_postal_code" id="address_postal_code" value="{$addressObj->getAddressPostalCode()}" size="10"></td>
				</tr><tr>
					<td class="small">
						<input type="hidden" name="address_id" id="address_id" value="{$addressObj->getAddressID()}">
						<input type="button" name="save" id="save" value="Save" onclick="save_address()">
						<input type="button" name="cancel" id="cancel" value="Cancel" onclick="load_window('Address')">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>