<!-- update_lead_email_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Lead Email ID# {$lead_email->get_lead_email_id()}</span></td>
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
{validate field="mail_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_mail_id</span><br>"}
{validate field="lead_mail_sent_by" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_mail_sent_by</span><br>"}
{validate field="lead_mail_date_sent" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_lead_mail_date_sent</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=lead_email:update_lead_email" id="add_lead_email_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_id}</td>
		<td class="fieldValue"><input type="text" name="lead_id" value="{$lead_email->get_lead_id()}" id="lead_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_mail_id}</td>
		<td class="fieldValue"><input type="text" name="mail_id" value="{$lead_email->get_mail_id()}" id="mail_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_mail_sent_by}</td>
		<td class="fieldValue"><input type="text" name="lead_mail_sent_by" value="{$lead_email->get_lead_mail_sent_by()}" id="lead_mail_sent_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_mail_date_sent}</td>
		<td class="fieldValue"><input type="text" name="lead_mail_date_sent" value="{$lead_email->get_lead_mail_date_sent()}" id="lead_mail_date_sent">
</td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="hidden" name="lead_email_id" value="{$lead_email_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
