<!-- add_operating_system_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Add New Record to operating_system</td>
		<td align="right"></td>
</tr>
</table>

<br>

{validate field="operating_system_name" criteria="notEmpty" message="<br><span class='error'>Error: You  Must provide the Operating System Version</span>"}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=operating_system:add_operating_system" id="add_operating_system_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Operating System Manufacture</td>
		<td class="fieldValue">{$operating_system_manufacture_id|operating_system_manufacture_name}</td>
	</tr><tr>
		<td class="formAreaTitle">Version</td>
		<td class="fieldValue"><input type="text" name="operating_system_name" value="{$operating_system_name}" size="40"></td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="checkbox" name="operating_system_active" value="1" checked id="operating_system_active"></td>
	</tr><tr>
		<td colspan="3">
		<input type="hidden" name="operating_system_manufacture_id" value="{$operating_system_manufacture_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
