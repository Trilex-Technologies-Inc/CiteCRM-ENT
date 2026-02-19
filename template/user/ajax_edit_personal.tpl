<!-- ajax_edit_personal.tpl -->
<span class="greetUser">Edit Personal Information</span>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF">
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="small" colspan="4"><a href="javascript:edit_personal()">Edit</a> <span class="small">|</span> <a href="javascript:edit_window('reset_pwd')">Reset Password</a></td>
				</tr><tr>
					<td class="small"><b>{$translate_user_first_name}</b></td>
					<td class="small"><input type="text" name="first_name" id="first_name" value="{$userObj->getUserFirstName()}"></td>
					<td class="small"><b>{$translate_user_last_name}</b></td>
					<td class="small"><input type="text" name="last_name" id="last_name" value="{$userObj->getUserLastName()}"></td>
				</tr><tr>
					<td class="small"><b>{$translate_user_email}</b></td>
					<td class="small"><input type="text" name="email" id="email" value="{$userObj->getUserEmail()}"></td>
					<td class="small"></td>
					<td class="small"></td>
				<tr><tr>
					<td class="small">
						<input type="hidden" name="user_id" id="user_id" value="">
						<input type="button" name="save" id="save" value="Save" onclick="save_personal()">
						<input type="button" name="cancel" id="cancel" value="Cancel" onclick="load_window('Personal Infomration')">						
					</td>
				</tr>
			</table>	
		</td>
	</tr>
</table>