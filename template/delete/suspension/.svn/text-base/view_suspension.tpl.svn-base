<!-- view_suspension -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View suspension ID# {$suspension->get_suspension_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=suspension:update_suspension&suspension_id={$suspension->get_suspension_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=suspension:delete_suspension&suspension_id={$suspension->get_suspension_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Suspension Reason</td>
		<td class="fieldValue">{$suspension->get_suspension_reason_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">User ID</td>
		<td class="fieldValue">{$suspension->get_user_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Start Date</td>
		<td class="fieldValue">{$suspension->get_suspension_start()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">End Date</td>
		<td class="fieldValue">{$suspension->get_suspension_end()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Memo</td>
		<td class="fieldValue">{$suspension->get_suspension_memo()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Entered By</td>
		<td class="fieldValue">{$suspension->get_suspension_create_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{$suspension->get_suspension_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
