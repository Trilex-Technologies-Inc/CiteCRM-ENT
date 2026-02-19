<!-- update_project_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Project ID# {$project->get_project_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=project:update_project" id="add_project_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="project_name" value="{$project->get_project_name()}" id="project_name">
			{validate id="project_name" message="<br><span class='error'>Form Error: The field project_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue"><input type="text" name="project_status_id" value="{$project->get_project_status_id()}" id="project_status_id">
			{validate id="project_status_id" message="<br><span class='error'>Form Error: The field project_status_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue"><input type="text" name="project_create_date" value="{$project->get_project_create_date()}" id="project_create_date">
			{validate id="project_create_date" message="<br><span class='error'>Form Error: The field project_create_date Is not a Valid Date</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Completed</td>
		<td class="fieldValue"><input type="text" name="project_completed_date" value="{$project->get_project_completed_date()}" id="project_completed_date">
			{validate id="project_completed_date" message="<br><span class='error'>Form Error: The field project_completed_date Is not a Valid Date</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue"><input type="text" name="project_type_id" value="{$project->get_project_type_id()}" id="project_type_id">
			{validate id="project_type_id" message="<br><span class='error'>Form Error: The field project_type_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Website</td>
		<td class="fieldValue"><input type="text" name="project_web_address" value="{$project->get_project_web_address()}" id="project_web_address">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="hidden" name="project_id" value="{$project_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
