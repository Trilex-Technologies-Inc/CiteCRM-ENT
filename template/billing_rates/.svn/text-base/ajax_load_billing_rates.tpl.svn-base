<!--ajax_load_billing_rates.tpl-->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">Type</td>
		<td class="productListing-heading">Amount</td>
		<td class="productListing-heading">Active</td>	
	</tr>
	{foreach from=$billing_ratesArray item=billing_rates}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_billing_rate('{$billing_rates->get_billing_rates_id()}')">
		<td class="productListing-data">{$billing_rates->get_billing_rate_text()}</td>
		<td class="productListing-data">{$billing_rates->get_billing_rate_amount()}</td>
		<td class="productListing-data">{$billing_rates->get_billing_rate_active()|yesno}</td>		
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="3">No Results Found</td>
	</tr>
	{/foreach}
</table>