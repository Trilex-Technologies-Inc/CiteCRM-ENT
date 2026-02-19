<!-- update_workorder_status_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Workorder Status ID# {$workorder_status->get_workorder_status_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=workorder_status:update_workorder_status" id="add_workorder_status_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue"><input type="text" name="workorder_status_text" value="{$workorder_status->get_workorder_status_text()}" id="workorder_status_text">
			{validate id="workorder_status_text" message="<br><span class='error'>Form Error: The field workorder_status_text Must not be empty</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Order</td>
		<td class="fieldValue"><input type="text" name="workorder_status_order" value="{$workorder_status->get_workorder_status_order()}" size="8">
	</tr><tr>	
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno fieldName="workorder_status_active" value=$workorder_status->get_workorder_status_active()}</td>
	</tr><tr>
		<td colspan="3">
		<input type="hidden" name="workorder_status_id" value="{$workorder_status_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
