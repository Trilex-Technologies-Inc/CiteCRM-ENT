<!-- add_system_manufacture_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to system_manufacture</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="{$ROOT_URL}/index.php?page=system_manufacture:add_system_manufacture" id="add_system_manufacture_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Manufacture ABRV</td>
		<td class="fieldValue"><input type="text" name="manufacture_abrv" value="{$manufacture_abrv}" size="" id="manufacture_abrv">
			{validate id="manufacture_abrv" message="<br><span class='error'>Form Error: The field manufacture_abrv Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Manufacture Name</td>
		<td class="fieldValue"><input type="text" name="manufacture_name" value="{$manufacture_name}" size="" id="manufacture_name">
			{validate id="manufacture_name" message="<br><span class='error'>Form Error: The field manufacture_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
