<!-- ajax_edit_lead.tpl -->
<table cellpadding="3" cellspacing="0" width="100%" border="0">
				<tr>
					<td width="20%" class="small">Lead Source</td>
					<td width="30%" class="small">{html_select_lead_type value=$leadObj->get_lead_type_id()}</td>
					<td width="15%" class="small">Status</td>
					<td width="35%" class="small">{html_select_lead_status value=$leadObj->get_lead_status_id()}</td>
				</tr><tr>
					<td width="20%" class="small">Account</td>
					<td width="30%" class="small"><input type="text" name="company_name" id="company_name" value="{$companyObj->get_company_name()}"></td>
					<td width="15%" class="small">Referer</td>
					<td width="35%" class="small"><input type="text" id="lead_referer" value="{$leadObj->get_lead_referer()}"></td>
				<r><tr>
					<td width="20%" class="small">Campaign</td>
					<td width="30%" class="small">{html_select_campaign_type value=$leadObj->get_lead_campaign()}</td>
					<td width="15%" class="small">Assigned</td>
					<td width="35%" class="small">{html_select_employee fieldName=lead_assigned_user value=$leadObj->get_lead_assigned_user()}</td>
				</tr><tr>
					<td colspan="4" class="small"><br></td>
				</tr><tr>
					<td width="20%" class="small">Street Address</td>
					<td><input type="text" id="company_street_1" value="{$companyAddressObj->get_company_street_1()}" width="60"></td>
					<td width="20%" class="small">Email</td>
					<td><input type="text" name="company_email" id="company_email" value="{$company_email}"></td>
				</tr><tr>
					<td width="20%" class="small">Street Address Cont</td>
					<td  class="small"><input type="text" id="company_street_2" value="{$companyAddressObj->get_company_street_2()}" width="60"></td>
				</tr><tr>
					<td width="20%" class="small">City</td>
					<td width="30%" class="small"><input type="text" id="company_city" value="{$companyAddressObj->get_company_city()}"></td>
					<td width="15%" class="small">Contact</td>
					<td width="35%" class="small"><input type="text" id="company_contact" value="{$contact_name}"></td>
				</tr><tr>
					<td width="20%" class="small">State</td>
					<td width="30%" class="small"><input type="text" name="state_id" id="state_id" value="{$companyAddressObj->get_company_state()}"></td>
					<td width="15%" class="small">Phone</td>
					<td width="35%" class="small"><input type="text" name="business_phone" id="business_phone" value="{$business_phone}"></td>
				</tr><tr>
					<td width="20%" class="small">Postal Code</td>
					<td width="30%" class="small"><input type="text" id="company_postal_code" value="{$companyAddressObj->get_company_postal_code()}"></td>
					<td width="15%" class="small">Fax</td>
					<td width="35%" class="small"><input type="text" name="business_fax" id="business_fax" value="{$business_fax}"></td>
				</tr><tr>
					<td colspan="4" class="small"><br></td>
				</tr><tr>
					<td  colspan="4" class="small">
						<input type="hidden" name="company_address_id" id="company_address_id" value="{$companyAddressObj->get_company_address_id()}">
						<input type="hidden" name="company_country" id="company_country" value="{$companyAddressObj->get_company_country()}">
						<input type="button" value="Save" onclick="save_lead_details()">
                        <input type="button" value="Cancel" onclick="load_details()">
					</td>
				</tr>
			</table>	
