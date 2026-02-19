<!-- add_module_method_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to module_method</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=module_method:add_module_method" id="add_module_method_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
	</tr>
	<tr>
		<td class="formAreaTitle">Method Name</td>
		<td class="fieldValue"><input type="text" name="module_method_name" value="{$module_method_name}" size="" id="module_method_name">
			{validate id="module_method_name" message="<br><span class='error'>Form Error: The field module_method_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Translate</td>
		<td class="fieldValue"><input type="text" name="module_method_translate" value="{$module_method_translate}" size="" id="module_method_translate">
			{validate id="module_method_translate" message="<br><span class='error'>Form Error: The field module_method_translate Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Admin Menu</td>
		<td class="fieldValue"><input type="checkbox" name="module_method_admin_menu" value="{$module_method_admin_menu}" size="" id="module_method_admin_menu">
			{validate id="module_method_admin_menu" message="<br>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">User Menu</td>
		<td class="fieldValue"><input type="checkbox" name="module_method_user_menu" value="{$module_method_user_menu}" size="" id="module_method_user_menu">
			{validate id="module_method_user_menu" message="<br>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Public Menu</td>
		<td class="fieldValue"><input type="checkbox" name="module_method_public_menu" value="{$module_method_public_menu}" size="" id="module_method_public_menu">
			{validate id="module_method_public_menu" message="<br>"}
</td>
	</tr>
	<tr>
		<td colspan="7">
			<input type="hidden" name="module_id" value="{$module_id}" size="" id="module_id">
			{validate id="module_id" message="<br>"}
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
