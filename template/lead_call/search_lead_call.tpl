<!-- search_lead_call -->
{include file="core/header.tpl"}
<span class="greetUser">{$translate_text_records_found} {$paginate.total}</span><br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">{$translate_text_displaying_page} {$paginate.page_current} {$translate_text_of} {$paginate.page_total}</td>
		<td class="productListing-heading" width="75%" align="right" valign="middle">
			{paginate_first text="<img src='images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>"}
			{paginate_prev text="<img src='images/icons/back_24.gif' alt='Previous' border='0' align='middle'>"}
			{paginate_middle format=select}
			{paginate_next text="<img src='images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>"}
			{paginate_last text="<img src='images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>"}
		</td>
	</tr>
</table>
<br><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_lead_call}</td>
		<td class="productListing-heading">{$translate_field_lead_id}</td>
		<td class="productListing-heading">{$translate_field_lead_call_subject}</td>
		<td class="productListing-heading">{$translate_field_lead_call_text}</td>
		<td class="productListing-heading">{$translate_field_lead_call_date}</td>
		<td class="productListing-heading">{$translate_field_lead_call_duration}</td>
		<td class="productListing-heading">{$translate_field_lead_call_by}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$lead_callArray item=lead_call}
	<tr>
		<td class="productListing-data">{$lead_call->get_lead_call_id()}</td>
		<td class="productListing-data">{$lead_call->get_lead_id()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_subject()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_text()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_date()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_duration()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_by()}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=lead_call:view_lead_call&lead_call_id={$lead_call->get_lead_call_id()}"><img src="{$ROOT_URL}/images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
