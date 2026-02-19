<table  cellpadding="3" cellspacing="0" border="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-heading" width="80%">{$translate_field_lead_type_text}</td>
		<td class="productListing-heading" width="20%">{$translate_field_lead_type_active}</td>
	</tr>
	{foreach from=$lead_typeArray item=lead_type}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_lead_type('{$lead_type->get_lead_type_id()}')">
		<td class="productListing-data">{$lead_type->get_lead_type_text()}</td>
		<td class="productListing-data">{$lead_type->get_lead_type_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="2">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
