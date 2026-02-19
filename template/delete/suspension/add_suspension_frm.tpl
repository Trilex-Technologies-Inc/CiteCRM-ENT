<!-- add_suspension_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to suspension</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=suspension:add_suspension" id="add_suspension_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Suspension Reason</td>
		<td class="fieldValue"><input type="text" name="suspension_reason_id" value="{$suspension_reason_id}" size="" id="suspension_reason_id">
			{validate id="suspension_reason_id" message="<br><span class='error'>Form Error: The field suspension_reason_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">User ID</td>
		<td class="fieldValue"><input type="text" name="user_id" value="{$user_id}" size="" id="user_id">
			{validate id="user_id" message="<br><span class='error'>Form Error: The field user_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Start Date</td>
		<td class="fieldValue"><input type="text" name="suspension_start" value="{$suspension_start}" size="" id="suspension_start">
			{validate id="suspension_start" message="<br><span class='error'>Form Error: The field suspension_start Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">End Date</td>
		<td class="fieldValue"><input type="text" name="suspension_end" value="{$suspension_end}" size="" id="suspension_end">
			{validate id="suspension_end" message="<br><span class='error'>Form Error: The field suspension_end Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Memo</td>
		<td class="fieldValue"><input type="text" name="suspension_memo" value="{$suspension_memo}" size="" id="suspension_memo">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Entered By</td>
		<td class="fieldValue"><input type="text" name="suspension_create_by" value="{$suspension_create_by}" size="" id="suspension_create_by">
			{validate id="suspension_create_by" message="<br><span class='error'>Form Error: The field suspension_create_by Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="text" name="suspension_active" value="{$suspension_active}" size="" id="suspension_active">
			{validate id="suspension_active" message="<br><span class='error'>Form Error: The field suspension_active Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="8">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
