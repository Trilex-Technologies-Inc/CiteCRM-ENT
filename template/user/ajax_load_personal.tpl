<!-- ajax_load_personal.tpl -->
<span class="greetUser">Personal Information</span>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF">
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="small" colspan="4"><a href="javascript:edit_personal()">Edit</a> <span class="small">|</span> <a href="javascript:edit_passwd()">Reset Password</a></td>
				</tr><tr>
					<td class="small"><b>{$translate_user_first_name}</b></td>
					<td class="small">{$userObj->getUserFirstName()}</td>
					<td class="small"><b>{$translate_user_last_name}</b></td>
					<td class="small">{$userObj->getUserLastName()}</td>
				</tr><tr>
					<td class="small"><b>{$translate_user_email}</b></td>
					<td class="small">{$userObj->getUserEmail()}</td>
					<td class="small"></td>
					<td class="small"></td>
				<tr><tr>
					<td class="small"><b>{$translate_user_create_date}</b></td>
					<td class="small">{$userObj->getUserCreateDate()|date_format:$DATE_FORMAT}</td>
					<td class="small"><b>{$translate_user_activation_date}</b></td>
					<td class="small">{$userObj->getUserActivationDate()|date_format:$DATE_FORMAT}</td>
				</tr>
			</table>	
		</td>
	</tr>
</table>
