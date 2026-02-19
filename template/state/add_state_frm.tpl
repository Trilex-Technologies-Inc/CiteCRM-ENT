<!-- add_state_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to state</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=state:add_state" id="add_state_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Country ID</td>
		<td class="fieldValue"><input type="text" name="country_id" value="{$country_id}" size="" id="country_id">
			{validate id="country_id" message="<br><span class='error'>Form Error: The field country_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Code</td>
		<td class="fieldValue"><input type="text" name="state_code" value="{$state_code}" size="" id="state_code">
			{validate id="state_code" message="<br><span class='error'>Form Error: The field state_code Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><input type="text" name="state_text" value="{$state_text}" size="" id="state_text">
			{validate id="state_text" message="<br><span class='error'>Form Error: The field state_text Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
