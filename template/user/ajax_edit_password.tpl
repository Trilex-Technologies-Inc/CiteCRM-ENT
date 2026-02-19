<!-- ajax_edit_password.tpl -->
<span class="greetUser">Change Password</span>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF">
			<table cellpadding="3" cellspacing="0" class="small">
				<tr>
					<td><strong>Password</strong></td>
					<td><input type="password" name="user_password" id="user_password"></td>
				</tr><tr>
					<td><strong>Confirm</strong></td>
					<td><input type="password" name="user_password2" id="user_password2"></td>
				</tr><tr>
					<td colspan="2"><input type="button" name="save" id="save" value="Save" onclick="save_password()"> 
					<input type="button" name="cancel" value="Cancel" onclick="load_window('Personal Infomration')"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>