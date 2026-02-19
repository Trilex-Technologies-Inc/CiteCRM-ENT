<!-- add_company_to_workorder_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to company_to_workorder</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=company_to_workorder:add_company_to_workorder" id="add_company_to_workorder_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Company ID</td>
		<td class="fieldValue"><input type="text" name="company_id" value="{$company_id}" size="" id="company_id">
			{validate id="company_id" message="<br><span class='error'>Form Error: The field company_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
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
