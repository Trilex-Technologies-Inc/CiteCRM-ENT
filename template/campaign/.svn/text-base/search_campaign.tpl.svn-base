<!-- search_campaign -->
{include file="core/header.tpl"}
<span class="greetUser">{$translate_text_records_found} {$paginate.total}</span><br>

<br><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_campaign_name}</td>
		<td class="productListing-heading">{$translate_field_campaign_start_date}</td>
		<td class="productListing-heading">{$translate_field_campaign_end_date}</td>
		<td class="productListing-heading">{$translate_field_campaign_cost}</td>
		<td class="productListing-heading">{$translate_field_campaign_active}</td>
	</tr>
	{foreach from=$campaignArray item=campaign}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=campaign:view_campaign&campaign_id={$campaign->get_campaign_id()}'">
		<td class="productListing-data">{$campaign->get_campaign_name()}</td>
		<td class="productListing-data">{$campaign->get_campaign_start_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data">{$campaign->get_campaign_end_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data">${$campaign->get_campaign_cost()|string_format:"%.2f"}</td>
		<td class="productListing-data">{$campaign->get_campaign_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
