<!-- update_user_to_company_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update User To Company ID# {$user_to_company->get_user_to_company_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=user_to_company:update_user_to_company" id="add_user_to_company_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">User ID</td>
		<td class="fieldValue"><input type="text" name="user_id" value="{$user_to_company->get_user_id()}" id="user_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Company ID</td>
		<td class="fieldValue"><input type="text" name="company_id" value="{$user_to_company->get_company_id()}" id="company_id">
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="user_to_company_id" value="{$user_to_company_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
