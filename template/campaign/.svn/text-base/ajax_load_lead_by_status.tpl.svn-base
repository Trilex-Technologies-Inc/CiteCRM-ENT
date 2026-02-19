<!-- ajax_load_lead_by_status -->
<table width="100%">
	<tr>
		<td><span class="greetUser"><span class="greetUser">Open Leads</span></td>	
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">Lead Type</td>
		<td class="productListing-heading">Status</td>
		<td class="productListing-heading">Assigned</td>
		<td class="productListing-heading">Account</td>
		<td class="productListing-heading">Re ferer</td>
		<td class="productListing-heading">Campaing</td>
		<td class="productListing-heading">Create Date</td>			
	</tr>
	{foreach from=$leadArray item=lead}
	{if $lead->get_lead_status_id() == '1' || $lead->get_lead_status_id() == '2' || $lead->get_lead_status_id() == '3'}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=leads:view_lead&lead_id={$lead->get_lead_id()}';">
		<td class="productListing-data">{$lead->get_lead_type_id()|lead_type}</td>
		<td class="productListing-data">{$lead->get_lead_status_id()|lead_status}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$lead->get_lead_assigned_user()}">{$lead->get_lead_assigned_user()|display_names}</a></td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=leads:view_lead&lead_id={$lead->get_lead_id()}">{$lead->get_company_id()|company_name}</a></td>
		<td class="productListing-data">{$lead->get_lead_referer()}</td>
		<td class="productListing-data">{$lead->get_lead_campaign()|campaign_name}</td>
		<td class="productListing-data">{$lead->get_lead_create_date()|date_format:$DATE_FORMAT}</td>
	</tr>
	{/if}
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Leads</td>
	</tr>			
	{/foreach}
</table>