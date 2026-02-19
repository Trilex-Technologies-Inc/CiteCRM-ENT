<!-- view_lead_meeting -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View lead_meeting ID# {$lead_meeting->get_lead_meeting_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_meeting:update_lead_meeting&lead_meeting_id={$lead_meeting->get_lead_meeting_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_meeting:delete_lead_meeting&lead_meeting_id={$lead_meeting->get_lead_meeting_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_id}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_start}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_meeting_start()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_end}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_meeting_end()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_subject}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_meeting_subject()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_created_by}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_meeting_created_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_active}</td>
		<td class="fieldValue">{$lead_meeting->get_lead_meeting_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
