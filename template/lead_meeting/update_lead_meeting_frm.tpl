<!-- update_lead_meeting_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Lead Meeting ID# {$lead_meeting->get_lead_meeting_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="lead_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_id</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=lead_meeting:update_lead_meeting" id="add_lead_meeting_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_id}</td>
		<td class="fieldValue"><input type="text" name="lead_id" value="{$lead_meeting->get_lead_id()}" id="lead_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_start}</td>
		<td class="fieldValue"><input type="text" name="lead_meeting_start" value="{$lead_meeting->get_lead_meeting_start()}" id="lead_meeting_start">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_end}</td>
		<td class="fieldValue"><input type="text" name="lead_meeting_end" value="{$lead_meeting->get_lead_meeting_end()}" id="lead_meeting_end">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_subject}</td>
		<td class="fieldValue"><input type="text" name="lead_meeting_subject" value="{$lead_meeting->get_lead_meeting_subject()}" id="lead_meeting_subject">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_created_by}</td>
		<td class="fieldValue"><input type="text" name="lead_meeting_created_by" value="{$lead_meeting->get_lead_meeting_created_by()}" id="lead_meeting_created_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_meeting_active}</td>
		<td class="fieldValue"><input type="text" name="lead_meeting_active" value="{$lead_meeting->get_lead_meeting_active()}" id="lead_meeting_active">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="hidden" name="lead_meeting_id" value="{$lead_meeting_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
