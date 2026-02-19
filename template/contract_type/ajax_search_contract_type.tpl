<!-- ajax_search_contract_type.tpl -->
<br>


<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_contract_type_name}</td>
		<td class="productListing-heading">Rate Per Month</td>
		<td class="productListing-heading">{$translate_field_contract_type_term}</td>
		<td class="productListing-heading">{$translate_field_contract_type_active}</td>
	</tr>
	{foreach from=$contract_typeArray item=contract_type}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="">
		<td class="productListing-data">{$contract_type->get_contract_type_name()}</td>
		<td class="productListing-data">${$contract_type->get_contract_type_rate()|string_format:"%.2f"}</td>
        <td class="productListing-data">{$contract_type->get_contract_type_term()} months</td>
		<td class="productListing-data">{$contract_type->get_contract_type_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
