<!-- add_project_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to project</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=project:add_project" id="add_project_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="project_name" value="{$project_name}" size="" id="project_name">
			{validate id="project_name" message="<br><span class='error'>Form Error: The field project_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue">{html_select_project_status  project_status_id=$project_status_id}
			{validate id="project_status_id" message="<br><span class='error'>Form Error: The field project_status_id Must not be empty</span>"}
		</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue"><input type="text" name="project_create_date" value="{$project_create_date}" size="" id="project_create_date">
			{validate id="project_create_date" message="<br><span class='error'>Form Error: The field project_create_date Is not a Valid Date</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Completed</td>
		<td class="fieldValue"><input type="text" name="project_completed_date" value="{$project_completed_date}" size="" id="project_completed_date">
			{validate id="project_completed_date" message="<br><span class='error'>Form Error: The field project_completed_date Is not a Valid Date</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue"><input type="text" name="project_type_id" value="{$project_type_id}" size="" id="project_type_id">
			{validate id="project_type_id" message="<br><span class='error'>Form Error: The field project_type_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Website</td>
		<td class="fieldValue"><input type="text" name="project_web_address" value="{$project_web_address}" size="" id="project_web_address">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
