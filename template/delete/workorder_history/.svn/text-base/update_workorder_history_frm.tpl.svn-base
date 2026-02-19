<!-- update_workorder_history_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Work Order History ID# {$workorder_history->get_workorder_history_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=workorder_history:update_workorder_history" id="add_workorder_history_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue"><input type="text" name="workorder_id" value="{$workorder_history->get_workorder_id()}" id="workorder_id">
			{validate id="workorder_id" message="<br><span class='error'>Form Error: The field workorder_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">History</td>
		<td class="fieldValue"><input type="text" name="workorder_history_text" value="{$workorder_history->get_workorder_history_text()}" id="workorder_history_text">
			{validate id="workorder_history_text" message="<br><span class='error'>Form Error: The field workorder_history_text Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue"><input type="text" name="workorder_history_create_date" value="{$workorder_history->get_workorder_history_create_date()}" id="workorder_history_create_date">
			{validate id="workorder_history_create_date" message="<br><span class='error'>Form Error: The field workorder_history_create_date Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="workorder_history_id" value="{$workorder_history_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
