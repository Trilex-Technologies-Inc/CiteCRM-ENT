<!-- ajax_load_campaign_type -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_campaign_type_text}</td>
		<td class="productListing-heading" width="20">{$translate_field_campaign_type_active}</td>
	</tr>
	{foreach from=$campaign_typeArray item=campaign_type}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_campaign_type('{$campaign_type->get_campaign_type_id()}')">
		<td class="productListing-data">{$campaign_type->get_campaign_type_text()}</td>
		<td class="productListing-data">{$campaign_type->get_campaign_type_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="4">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>