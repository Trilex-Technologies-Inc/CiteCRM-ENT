<!-- ajax_load_emails.tpl -->
<table width="100%">
    <tr>
        <td><span class="greetUser">Email History</span></td>
        <td align="right"><a href="javascript:add_activity('Email');">New Email</a></td>
    </tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_lead_mail_date_sent}</td>
		<td class="productListing-heading">To</td>
		<td class="productListing-heading">Subject</td>
		<td class="productListing-heading">{$translate_field_lead_mail_sent_by}</td>
		<td class="productListing-heading">Server Send Time</td>		
		<td class="productListing-heading"></td>
	</tr>
	{foreach from=$lead_emailArray item=lead_email}
	<tr>
		<td class="productListing-data">{$lead_email->get_lead_mail_date_sent()|date_format:"%m-%d-%Y %I:%M %p"}</td>
		<td class="productListing-data">{$lead_email->fields.mail_to_email} [{$lead_email->fields.mail_to_name}]</td>
		<td class="productListing-data">
			<img src="/images/icons/copy_16.gif" onClick="opennewsletter({$lead_email->get_lead_email_id()}); return false" align="middle">{$lead_email->fields.mail_subject}
			<div id="{$lead_email->get_lead_email_id()}" style="display:none">
				<table width="100%" cellpadding="3" cellspacing="0" border="0" style="font-family:Tahoma, Verdana, Arial, sans-serif; font-size: 11px;">
					<tr>
						<td style="background: #f1f9fe;"><b>To:</b> {$lead_email->fields.mail_to_email} [{$lead_email->fields.mail_to_name}]</td>
					</tr><tr>
						<td style="background: #f1f9fe;"><b>Date:</b> {$lead_email->get_lead_mail_date_sent()|date_format:"%m-%d-%Y %I:%M %p"}</td>
					</tr><tr>
						<td style="background: #f1f9fe;" ><b>Subject:</b> {$lead_email->fields.mail_subject}</td>
					</tr><tr>
						<td style="background: #f1f9fe; border-bottom: 1px solid #7b9ebd;" ><b>Message:</b></td>
					</tr><tr>
						<td>{$lead_email->fields.mail_body}</td>
					</tr>
				</table>
				
			</div>

		</td>
		<td class="productListing-data">{$lead_email->get_lead_mail_sent_by()}</td>	
		<td class="productListing-data">{$lead_email->fields.mail_deliverd|date_format:"%m-%d-%Y %I:%M %p"}</td>	
		<td class="productListing-data">Add Reply</td>
	</tr>
	{if $lead_email->get_lead_email_has_reply()}
	<tr>
		<td colspan="6" class="productListing-data">
			<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
				<tr>
					<td class="productListing-data">Has Reply</td>
				</tr>
			</table>	
		</td>
	</tr>
	{/if}


	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="6">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

<br>


</div>