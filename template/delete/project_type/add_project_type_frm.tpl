<!-- add_project_type_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to project_type</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=project_type:add_project_type" id="add_project_type_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue"><input type="text" name="project_type_name" value="{$project_type_name}" size="" id="project_type_name">
			{validate id="project_type_name" message="<br><span class='error'>Form Error: The field project_type_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
