<!-- ajax_employee_reset_password.tpl -->
<table cellpadding="3" cellspacing="0" class="small">
	<tr>
		<td><strong>Password</strong></td>
		<td><input type="password" name="user_password" id="user_password"></td>
	</tr><tr>
		<td><strong>Confirm</strong></td>
		<td><input type="password" name="user_password2" id="user_password2"></td>
	</tr><tr>
		<td colspan="2"><input type="button" name="save" id="save" value="Save" onclick="save('reset_pwd')"> <input type="button" name="cancel" value="Cancel" onclick="load_details()"></td>
	</tr>
</table>