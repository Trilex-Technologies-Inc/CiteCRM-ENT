<!-- update_system_manufacture_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update System Manufacture ID# {$system_manufacture->get_system_manufacture_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=system_manufacture:update_system_manufacture" id="add_system_manufacture_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Manufacture ABRV</td>
		<td class="fieldValue"><input type="text" name="manufacture_abrv" value="{$system_manufacture->get_manufacture_abrv()}" id="manufacture_abrv">
			{validate id="manufacture_abrv" message="<br><span class='error'>Form Error: The field manufacture_abrv Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Manufacture Name</td>
		<td class="fieldValue"><input type="text" name="manufacture_name" value="{$system_manufacture->get_manufacture_name()}" id="manufacture_name">
			{validate id="manufacture_name" message="<br><span class='error'>Form Error: The field manufacture_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="system_manufacture_id" value="{$system_manufacture_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
