<!-- view_project_type -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View project_type ID# {$project_type->get_project_type_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=project_type:update_project_type&project_type_id={$project_type->get_project_type_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=project_type:delete_project_type&project_type_id={$project_type->get_project_type_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue">{$project_type->get_project_type_name()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
