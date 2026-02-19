<!-- add_country_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to country</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=country:add_country" id="add_country_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Code</td>
		<td class="fieldValue"><input type="text" name="country_code" value="{$country_code}" size="" id="country_code">
			{validate id="country_code" message="<br><span class='error'>Form Error: The field country_code Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue"><input type="text" name="country_text" value="{$country_text}" size="" id="country_text">
			{validate id="country_text" message="<br><span class='error'>Form Error: The field country_text Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
