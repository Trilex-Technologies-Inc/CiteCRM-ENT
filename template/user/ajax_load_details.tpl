<!-- ajax_load_details.tpl -->
<table>
	<tr>
		<td>
			
			<table cellpadding="3" cellspacing="0">
				<tr>
                    <td colspan="2" class="fieldValue"><a href="javascript:edit_window('edit')">Edit</a> <span class="small"></td>
                </tr><tr>
					<td class="formAreaTitle">Contact ID</td>
					<td class="fieldValue">{$userObj->getUserID()}</td>
				</tr><tr>
					<td class="formAreaTitle">Name</td>
					<td class="fieldValue">{$userObj->getUserFirstName()} {$userObj->getUserLastName()}</td>
				</tr><tr>
					<td class="formAreaTitle">User Type</td>
					<td class="fieldValue">{$userObj->getUserTypeID()|user_type}</td>
				</tr></tr>
			
			{if $user_to_companyObj->fields.company_id > 0}          
				<tr>
					<td class="formAreaTitle"><b>Account</b></td>
                    <td class="fieldValue"><a href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$user_to_companyObj->fields.company_id}">{$user_to_companyObj->fields.company_id|company_name}</a>
                    </td>
                </tr>
                
            {/if}

            </table>
		</td>
		<td width="15"><br></td>
		<td valign="top">
			<table cellpadding="3" cellspacing="0" class="small">
				<tr>
					<td class="formAreaTitle">Email</td>
					<td class="fieldValue">{$userObj->getUserEmail()}</td>
				</tr><tr>
					<td class="formAreaTitle">Status</td>
					<td class="fieldValue">{$userObj->getUserStatus()}</td>
				</tr><tr>
					<td class="formAreaTitle">Contact Created</td>
					<td class="fieldValue">{$userObj->getUserCreateDate()|date_format:"%Y-%m-%d"}</td>
				</tr></tr>
			</table>
		</td>
	</tr>
</table>