<!-- update_user_type_frm -->
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update User Type {$user_type->get_user_type_text()}</span></td>
	</tr>
</table>

<br><br>

<form >

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">User Type</td>
		<td class="fieldValue"><input type="text" name="user_type_text" value="{$user_type->get_user_type_text()}" id="user_type_text">
</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="hidden" name="user_type_id" id="user_type_id"value="{$user_type_id}">
		<input type="button" name="submit" value="Save" onclick="save_user_type()">
		<input type="button" name="delete" value="Delete" onclick="delete_user_type('{$user_type->get_user_type_id()}')">
		<input type="button" name="cancel" value="Cancel" onclick="cancel_edit()">
		</td>
	</tr>
</table>

</form>

