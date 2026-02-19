<!-- ajax_user_reset_pwd.tpl -->
<table cellpadding="3" cellspacing="0">
	<tr>
		<td class="formAreaTitle">Password</td>
		<td class="fieldValue"><input type="text" name="password" size="20" id="password"></td>
	</tr><tr>
		<td class="formAreaTitle">Verify</td>
		<td class="fieldValue"><input type="text" name="verify_password" id="verify_password"></td>
	</tr><tr>
		<td colspan="2" class="fieldValue">
            <input type="submit" name="save" value="Save" onclick="reset_password()">
            <input type="button" name="cancel" value="Cancel" onclick="load_window('Details');">
        </td>	
	</tr>
</table>
