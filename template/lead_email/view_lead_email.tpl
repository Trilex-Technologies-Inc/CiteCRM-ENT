<!-- view_lead_email -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View lead_email ID# {$lead_email->get_lead_email_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_email:update_lead_email&lead_email_id={$lead_email->get_lead_email_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_email:delete_lead_email&lead_email_id={$lead_email->get_lead_email_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_id}</td>
		<td class="fieldValue">{$lead_email->get_lead_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_mail_id}</td>
		<td class="fieldValue">{$lead_email->get_mail_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_mail_sent_by}</td>
		<td class="fieldValue">{$lead_email->get_lead_mail_sent_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_mail_date_sent}</td>
		<td class="fieldValue">{$lead_email->get_lead_mail_date_sent()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
