<!-- add_system_to_workorder_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to system_to_workorder</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=system_to_workorder:add_system_to_workorder" id="add_system_to_workorder_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">System</td>
		<td class="fieldValue"><input type="text" name="system_id" value="{$system_id}" size="" id="system_id">
			{validate id="system_id" message="<br><span class='error'>Form Error: The field system_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Work Order</td>
		<td class="fieldValue"><input type="text" name="workorder_id" value="{$workorder_id}" size="" id="workorder_id">
			{validate id="workorder_id" message="<br><span class='error'>Form Error: The field workorder_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
