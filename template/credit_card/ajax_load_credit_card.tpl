<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_credit_card_name}</td>
		<td class="productListing-heading">{$translate_field_credit_card_active}</td>
	</tr>
	{foreach from=$credit_cardArray item=credit_card}
	<tr onDblClick="edit_edit_credit_card('{$credit_card->get_credit_card_id()}','{$credit_card->get_credit_card_active()}')">
		<td class="productListing-data">{$credit_card->get_credit_card_name()}</td>
		<td class="productListing-data">{$credit_card->get_credit_card_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>