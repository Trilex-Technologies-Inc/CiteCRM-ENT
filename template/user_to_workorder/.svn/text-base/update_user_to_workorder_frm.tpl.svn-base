<!-- update_user_to_workorder_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update User To Work Order ID# {$user_to_workorder->get_user_to_workorder_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=user_to_workorder:update_user_to_workorder" id="add_user_to_workorder_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">User ID</td>
		<td class="fieldValue"><input type="text" name="user_id" value="{$user_to_workorder->get_user_id()}" id="user_id">
			{validate id="user_id" message="<br><span class='error'>Form Error: The field user_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue"><input type="text" name="workorder_id" value="{$user_to_workorder->get_workorder_id()}" id="workorder_id">
			{validate id="workorder_id" message="<br><span class='error'>Form Error: The field workorder_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="user_to_workorder_id" value="{$user_to_workorder_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
