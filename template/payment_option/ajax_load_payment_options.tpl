
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_payment_option_text}</td>
		<td class="productListing-heading">{$translate_field_payment_option_active}</td>
	</tr>
	{foreach from=$payment_optionArray item=payment_option}
	<tr onDblClick="edit_edit_payment_option('{$payment_option->get_payment_option_id()}','{$payment_option->get_payment_option_active()}')">
		<td class="productListing-data">{$payment_option->get_payment_option_text()}</td>
		<td class="productListing-data">{$payment_option->get_payment_option_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
