<!-- update_system_to_workorder_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update System To Workorder ID# {$system_to_workorder->get_system_to_workorder_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=system_to_workorder:update_system_to_workorder" id="add_system_to_workorder_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">System</td>
		<td class="fieldValue"><input type="text" name="system_id" value="{$system_to_workorder->get_system_id()}" id="system_id">
			{validate id="system_id" message="<br><span class='error'>Form Error: The field system_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Work Order</td>
		<td class="fieldValue"><input type="text" name="workorder_id" value="{$system_to_workorder->get_workorder_id()}" id="workorder_id">
			{validate id="workorder_id" message="<br><span class='error'>Form Error: The field workorder_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="system_to_workorder_id" value="{$system_to_workorder_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
