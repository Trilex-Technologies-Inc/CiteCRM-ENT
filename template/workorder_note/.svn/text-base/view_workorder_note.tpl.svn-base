<!-- view_workorder_note -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">View workorder_note ID# {$workorder_note->get_workorder_note_id()}</span></td>
		<td align="right">
				<a href="?page=workorder:view_workorder&workorder_id={$workorder_note->get_workorder_id()}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=workorder_note:update_workorder_note&workorder_note_id={$workorder_note->get_workorder_note_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=workorder_note:delete_workorder_note&workorder_note_id={$workorder_note->get_workorder_note_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
		</td>
	</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue">{$workorder_note->get_workorder_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Created By</td>
		<td class="fieldValue">{$workorder_note->get_workorder_note_create_by()|display_names}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Note</td>
		<td class="fieldValue">{$workorder_note->get_workorder_note_text()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
