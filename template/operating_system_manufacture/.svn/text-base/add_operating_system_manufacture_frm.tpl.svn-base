<!-- add_operating_system_manufacture_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Add New Operating System Manufacture</td>
		<td align="right"></td>
</tr>
</table>

<br>
{validate field="operating_system_manufacture_name" criteria="notEmpty" message="<br><span class='errorText'>Form Error: The field operating_system_manufacture_name Must not be empty</span>"}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=operating_system_manufacture:add_operating_system_manufacture" id="add_operating_system_manufacture_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Operating System Manufacture</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_name" value="{$operating_system_manufacture_name}" size="40" id="operating_system_manufacture_name"></td>
	</tr>
	<tr>
		<td class="formAreaTitle">Web Site</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_website" value="{$operating_system_manufacture_website}" size="40" id="operating_system_manufacture_website">
		<br>(Include http://)
		</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="checkbox" name="operating_system_manufacture_active" value="1" checked id="operating_system_manufacture_active"></td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
