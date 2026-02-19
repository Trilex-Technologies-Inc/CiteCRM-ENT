<!-- view_workorder_status -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View workorder_status ID# {$workorder_status->get_workorder_status_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=workorder_status:update_workorder_status&workorder_status_id={$workorder_status->get_workorder_status_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=workorder_status:delete_workorder_status&workorder_status_id={$workorder_status->get_workorder_status_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Status</td>
		<td class="fieldValue">{$workorder_status->get_workorder_status_text()}</td>
	</tr><tr>
		<td class="formAreaTitle">Order</td>
		<td class="fieldValue">{$workorder_status->get_workorder_status_order()}</td>
	</tr><tr>	
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{$workorder_status->get_workorder_status_active()|yesno}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
