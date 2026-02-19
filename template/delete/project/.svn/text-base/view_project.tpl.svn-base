<!-- view_project -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View project ID# {$project->get_project_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=project:update_project&project_id={$project->get_project_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=project:delete_project&project_id={$project->get_project_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue">{$project->get_project_name()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue">{$project->get_project_status_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue">{$project->get_project_create_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Completed</td>
		<td class="fieldValue">{$project->get_project_completed_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue">{$project->get_project_type_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Website</td>
		<td class="fieldValue">{$project->get_project_web_address()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
