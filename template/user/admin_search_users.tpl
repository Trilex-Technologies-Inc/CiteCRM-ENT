<!-- admin_search_users.tpl -->
{display_box_top title="Search Contacts"}

<form method="POST" action="index.php?page=user:admin_search_users">
<table cellpadding="3" cellspacing="0" class="formArea">
	<tr>
		<td class="small">Username</td>
		<td class="small"><input type="text" name="username" value="{$username}"></td>
	</tr><tr>
		<td class="small">Email</td>
		<td class="small"><input type="text" name="email" value="{$email}"></td>
	</tr><tr>
		<td class="small">First</td>
		<td class="small"><input type="text" name="first_name" value="{$first_name}"></td>
	</tr><tr>
		<td class="small">Last</td>
		<td class="small"><input type="text" name="last_name" value="{$last_name}"></td>
	</tr><tr>
		<td class="small">Status</td>
		<td class="small">{html_select_user_status user_status="user_status"}</td>
	</tr><tr>
		<td class="small">Type</td>
		<td class="small">{html_select_user_type user_type="user_type"}</td>	
	</tr><tr>	
		<td colspan="2" class="small"><input type="submit" name="submit" value="Search"></td>
	</tr>
</table>
</form>

{display_box_bottom}