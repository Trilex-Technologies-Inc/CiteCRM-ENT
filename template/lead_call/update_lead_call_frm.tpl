<!-- update_lead_call_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Lead Call ID# {$lead_call->get_lead_call_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="lead_call_subject" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_call_subject</span><br>"}
{validate field="lead_call_text" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_call_text</span><br>"}
{validate field="lead_call_by" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_call_by</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=lead_call:update_lead_call" id="add_lead_call_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_subject}</td>
		<td class="fieldValue"><input type="text" name="lead_call_subject" value="{$lead_call->get_lead_call_subject()}" id="lead_call_subject">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_text}</td>
		<td class="fieldValue"><input type="text" name="lead_call_text" value="{$lead_call->get_lead_call_text()}" id="lead_call_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_date}</td>
		<td class="fieldValue"><input type="text" name="lead_call_date" value="{$lead_call->get_lead_call_date()}" id="lead_call_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_call_duration}</td>
		<td class="fieldValue"><input type="text" name="lead_call_duration" value="{$lead_call->get_lead_call_duration()}" id="lead_call_duration">
</td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td colspan="7">
			<input type="hidden" name="lead_id" value="{$lead_id}" size="" id="lead_id">
			<input type="hidden" name="lead_call_by" value="{$lead_call_by}" size="" id="lead_call_by">
{validate field="lead_call_by" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_call_by</span><br>"}
		<input type="hidden" name="lead_call_id" value="{$lead_call_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
