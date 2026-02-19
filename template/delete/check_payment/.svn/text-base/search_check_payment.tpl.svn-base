<!-- search_check_payment -->
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
		<td class="productListing-heading">{$translate_field_check_payment}</td>
		<td class="productListing-heading">{$translate_field_invoice_id}</td>
		<td class="productListing-heading">{$translate_field_check_payment_amount}</td>
		<td class="productListing-heading">{$translate_field_check_payment_number}</td>
		<td class="productListing-heading">{$translate_field_check_payment_enter_by}</td>
		<td class="productListing-heading">{$translate_field_check_payment_date}</td>
		<td class="productListing-heading">{$translate_field_check_payment_status}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$check_paymentArray item=check_payment}
	<tr>
		<td class="productListing-data">{$check_payment->get_check_payment_id()}</td>
		<td class="productListing-data">{$check_payment->get_invoice_id()}</td>
		<td class="productListing-data">{$check_payment->get_check_payment_amount()}</td>
		<td class="productListing-data">{$check_payment->get_check_payment_number()}</td>
		<td class="productListing-data">{$check_payment->get_check_payment_enter_by()}</td>
		<td class="productListing-data">{$check_payment->get_check_payment_date()}</td>
		<td class="productListing-data">{$check_payment->get_check_payment_status()}</td>
		<td class="productListing-data"><a href="index.php?page=check_payment:view_check_payment&check_payment_id={$check_payment->get_check_payment_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
