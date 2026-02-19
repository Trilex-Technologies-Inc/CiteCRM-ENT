<!-- view_state -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View state ID# {$state->get_state_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=state:update_state&state_id={$state->get_state_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=state:delete_state&state_id={$state->get_state_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Country ID</td>
		<td class="fieldValue">{$state->get_country_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Code</td>
		<td class="fieldValue">{$state->get_state_code()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue">{$state->get_state_text()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
