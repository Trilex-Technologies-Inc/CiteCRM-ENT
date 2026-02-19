<!-- view_workorder_history -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View workorder_history ID# {$workorder_history->get_workorder_history_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=workorder_history:update_workorder_history&workorder_history_id={$workorder_history->get_workorder_history_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=workorder_history:delete_workorder_history&workorder_history_id={$workorder_history->get_workorder_history_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue">{$workorder_history->get_workorder_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">History</td>
		<td class="fieldValue">{$workorder_history->get_workorder_history_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue">{$workorder_history->get_workorder_history_create_date()|date_format:"%Y-%m-%d"}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
