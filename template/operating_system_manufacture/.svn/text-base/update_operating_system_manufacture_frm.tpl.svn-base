<!-- update_operating_system_manufacture_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Operating System Manufacture ID# {$operating_system_manufacture->get_operating_system_manufacture_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="{$ROOT_URL}/index.php?page=operating_system_manufacture:update_operating_system_manufacture" id="add_operating_system_manufacture_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Operating System</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_name" value="{$operating_system_manufacture->get_operating_system_manufacture_name()}" id="operating_system_manufacture_name">
			{validate id="operating_system_manufacture_name" message="<br><span class='error'>Form Error: The field operating_system_manufacture_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Web Site</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_website" value="{$operating_system_manufacture->get_operating_system_manufacture_website()}" id="operating_system_manufacture_website">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_active" value="{$operating_system_manufacture->get_operating_system_manufacture_active()}" id="operating_system_manufacture_active">
			{validate id="operating_system_manufacture_active" message="<br><span class='error'>Form Error: The field operating_system_manufacture_active Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="operating_system_manufacture_id" value="{$operating_system_manufacture_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
