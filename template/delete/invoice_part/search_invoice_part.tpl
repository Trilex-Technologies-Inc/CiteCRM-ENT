<!-- search_invoice_part -->
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
		<td class="productListing-heading">{$translate_field_invoice_part}</td>
		<td class="productListing-heading">{$translate_field_invoice_id}</td>
		<td class="productListing-heading">{$translate_field_product_id}</td>
		<td class="productListing-heading">{$translate_field_invoice_part_qty}</td>
		<td class="productListing-heading">{$translate_field_invoice_part_amount}</td>
		<td class="productListing-heading">{$translate_field_invoice_part_sub_total}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$invoice_partArray item=invoice_part}
	<tr>
		<td class="productListing-data">{$invoice_part->get_invoice_part_id()}</td>
		<td class="productListing-data">{$invoice_part->get_invoice_id()}</td>
		<td class="productListing-data">{$invoice_part->get_product_id()}</td>
		<td class="productListing-data">{$invoice_part->get_invoice_part_qty()}</td>
		<td class="productListing-data">{$invoice_part->get_invoice_part_amount()}</td>
		<td class="productListing-data">{$invoice_part->get_invoice_part_sub_total()}</td>
		<td class="productListing-data"><a href="index.php?page=invoice_part:view_invoice_part&invoice_part_id={$invoice_part->get_invoice_part_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
