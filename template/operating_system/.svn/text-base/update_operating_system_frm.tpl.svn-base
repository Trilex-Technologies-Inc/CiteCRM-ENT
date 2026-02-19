<!-- update_operating_system_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Operating System ID# {$operating_system->get_operating_system_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="{$ROOT_URL}/index.php?page=operating_system:update_operating_system" id="add_operating_system_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Operating System</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_id" value="{$operating_system->get_operating_system_manufacture_id()}" id="operating_system_manufacture_id">
			{validate id="operating_system_manufacture_id" message="<br><span class='error'>Form Error: The field operating_system_manufacture_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="text" name="operating_system_active" value="{$operating_system->get_operating_system_active()}" id="operating_system_active">
			{validate id="operating_system_active" message="<br><span class='error'>Form Error: The field operating_system_active Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="operating_system_id" value="{$operating_system_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
