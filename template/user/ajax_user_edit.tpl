<!-- ajax_user_edit.tpl -->

<table>
	<tr>
		<td valign="top">
			<table cellpadding="3" cellspacing="0" width="100%" border="0">
				<tr>
					<td class="formAreaTitle">First Name</td>
					<td class="fieldValue"><input type="text" id="user_first_name" value="{$userObj->getUserFirstName()}"></td>
				</tr><tr>
					<td class="formAreaTitle">Last Name</td>
					<td class="fieldValue"><input type="text" id="user_last_name" value="{$userObj->getUserLastName()}"></td>
				</tr><tr>
					<td class="formAreaTitle">Contact Type</td>
					<td class="fieldValue">
					 {if $userObj->getUserTypeID() == '3'}
					 	Account Contact
					 	<input type="hidden" id="user_type_id" value="3">
					 {else}
						{html_select_user_type user_type="user_type_id" value=$userObj->getUserTypeID()} 
					{/if}
					</td>
				</tr>
			</table>
		</td>
		<td width="5"><br></td>
		<td valign="top">
			<table cellpadding="3" cellspacing="0" width="100%" border="0">
				<tr>
					<td class="formAreaTitle">Email</td>
					<td class="fieldValue"><input type="text" id="user_email" value="{$userObj->getUserEmail()}"></td>
				</tr>
			</table>
		</td>
	</tr><tr>
		<td class="fieldValue">
            <input type="button" name="Save" id="save" value="Save" onclick="update_contact()">
            <input type="button" name="cancel" value="Cancel" onclick="load_window('Details');">
            </td>
	</tr>
</table>