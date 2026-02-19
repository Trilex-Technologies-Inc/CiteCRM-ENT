<!-- ajax_lead_details.tpl -->
<table cellpadding="3" cellspacing="0">
    <tr>
        <td width="20%" class="formAreaTitle">Lead Source</td>
        <td width="30%" class="fieldValue">{$leadObj->get_lead_type_id()|lead_type}</td>
        <td width="15%" class="formAreaTitle">Status</td>
        <td width="35%" class="fieldValue">{$leadObj->get_lead_status_id()|lead_status}</td>
        <td width="10" class="fieldValue"><a href="javascript:edit_lead();">Edit</a></td>
    </tr><tr>
		<td width="20%" class="formAreaTitle">Account</td>
		<td width="30%" class="fieldValue">{$companyObj->get_company_name()}</td>
		<td width="15%" class="formAreaTitle">Referer</td>
		<td width="35%" class="fieldValue">{$leadObj->get_lead_referer()}</td>
        <td width="10" class="formAreaTitle"></td>
	<r><tr>
		<td width="20%" class="formAreaTitle">Campaign</td>
		<td width="30%" class="fieldValue"><a href="{$ROOT_URL}/index.php?page=campaign:view_campaign&campaign_id={$leadObj->get_lead_campaign()}">{$leadObj->get_lead_campaign()|campaign_name}</a></td>
		<td width="15%" class="formAreaTitle">Assigned</td>
		<td width="35%" class="fieldValue">{$leadObj->get_lead_assigned_user()|display_names}</td>
         <td width="10" class="fieldValue"></td>
	</tr><tr>
		<td colspan="5" class="fieldValue"><br></td>
	</tr><tr>
		<td width="20%" class="formAreaTitle">Street Address</td>
		<td width="30%" class="fieldValue">{$companyAddressObj->get_company_street_1()}</td>
		<td width="15%" class="formAreaTitle">Contact</td>
		<td width="35%" class="fieldValue">{$contact_name}</td>
         <td width="10" class="fieldValue"></td>
	</tr><tr>
		<td width="20%" class="formAreaTitle">City</td>
		<td width="30%" class="fieldValue">{$companyAddressObj->get_company_city()}</td>
		<td width="15%" class="formAreaTitle">Email</td>
		<td width="35%" class="fieldValue">{$company_email}</td>
         <td width="10" class="fieldValue"></td>
	</tr><tr>
		<td width="20%" class="formAreaTitle">State</td>
		<td width="30%" class="fieldValue">{$companyAddressObj->get_company_state()|state_name}</td>
		<td width="15%" class="formAreaTitle">Phone</td>
		<td width="35%" class="fieldValue">{$companyPhone}</td>
         <td width="10" class="fieldValue"></td>
	</tr><tr>
		<td width="20%" class="formAreaTitle">Postal Code</td>
		<td width="30%" class="fieldValue">{$companyAddressObj->get_company_postal_code()} <a href="#" onclick="window.open('index.php?page=core:map&toAddress={$companyAddressObj->get_company_street_1()} {$companyAddressObj->get_company_city()}, {$companyAddressObj->get_company_state()|state_name} {$companyAddressObj->get_company_postal_code()} ','mywindow','scrollbars=1,menubar=1,resizable=1,width=640,height=550');">Map</a></td>
		<td width="15%" class="formAreaTitle">Fax</td>
		<td width="35%" class="fieldValue">{$companyFax}</td>
         <td width="10" class="fieldValue"></td>
	</tr><tr>
		<td colspan="4" class="fieldValue"><br></td>
	</tr><tr>
		<td width="20%" class="formAreaTitle" valign="top">Description</td>
		<td colspan="4" class="fieldValue">{$leadObj->get_lead_description()}</td>
	</tr>
		<td colspan="5" class="fieldValue"><br></td>
	</tr>
</table>


    	
