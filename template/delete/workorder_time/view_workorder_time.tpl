<!-- view_workorder_time -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View workorder_time ID# {$workorder_time->get_workorder_time_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=workorder_time:update_workorder_time&workorder_time_id={$workorder_time->get_workorder_time_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=workorder_time:delete_workorder_time&workorder_time_id={$workorder_time->get_workorder_time_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_id}</td>
		<td class="fieldValue">{$workorder_time->get_workorder_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_user_id}</td>
		<td class="fieldValue">{$workorder_time->get_user_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_time_start}</td>
		<td class="fieldValue">{$workorder_time->get_workorder_time_start()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_time_end}</td>
		<td class="fieldValue">{$workorder_time->get_workorder_time_end()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
