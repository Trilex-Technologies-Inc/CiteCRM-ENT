<!-- view_workorder_comment -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View Workorder Comment ID# {$workorder_comment->get_workorder_comment_id()}</span></td>
		<td align="right">
				<a href="index.php?page=workorder:view_workorder&workorder_id={$workorder_comment->get_workorder_id()}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=workorder_comment:update_workorder_comment&workorder_comment_id={$workorder_comment->get_workorder_comment_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=workorder_comment:delete_workorder_comment&workorder_comment_id={$workorder_comment->get_workorder_comment_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
	</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue">{$workorder_comment->get_workorder_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created By</td>
		<td class="fieldValue">{$workorder_comment->get_workorder_comment_create_by()|display_names}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Comment</td>
		<td class="fieldValue">{$workorder_comment->get_workorder_comment_text()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
