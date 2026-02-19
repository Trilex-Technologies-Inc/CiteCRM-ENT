<!-- view_project_status -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View project_status ID# {$project_status->get_project_status_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=project_status:update_project_status&project_status_id={$project_status->get_project_status_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=project_status:delete_project_status&project_status_id={$project_status->get_project_status_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue">{$project_status->get_project_status_name()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
