<!-- search_product_to_category -->
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
		<td class="productListing-heading">{$translate_field_product_to_category}</td>
		<td class="productListing-heading">{$translate_field_product_id}</td>
		<td class="productListing-heading">{$translate_field_category_id}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$product_to_categoryArray item=product_to_category}
	<tr>
		<td class="productListing-data">{$product_to_category->get_product_to_category_id()}</td>
		<td class="productListing-data">{$product_to_category->get_product_id()}</td>
		<td class="productListing-data">{$product_to_category->get_category_id()}</td>
		<td class="productListing-data"><a href="index.php?page=product_to_category:view_product_to_category&product_to_category_id={$product_to_category->get_product_to_category_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="4">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
