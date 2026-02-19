<!-- view_lead_call -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View lead_call ID# {$lead_call->get_lead_call_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_call:update_lead_call&lead_call_id={$lead_call->get_lead_call_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_call:delete_lead_call&lead_call_id={$lead_call->get_lead_call_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_id}</td>
		<td class="fieldValue"><a href="/index.php?page=leads:view_lead&lead_id={$lead_call->get_lead_id()}">{$lead_call->get_lead_id()}</a></td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_subject}</td>
		<td class="fieldValue">{$lead_call->get_lead_call_subject()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_text}</td>
		<td class="fieldValue">{$lead_call->get_lead_call_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_date}</td>
		<td class="fieldValue">{$lead_call->get_lead_call_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_duration}</td>
		<td class="fieldValue">{$lead_call->get_lead_call_duration()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_by}</td>
		<td class="fieldValue">{$lead_call->get_lead_call_by()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
