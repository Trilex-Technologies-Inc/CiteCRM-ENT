<!-- search_bill -->
{include file="core/header.tpl"}
<span class="greetUser">Records Found {$paginate.total}</span><br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">Displaying Page {$paginate.page_current} of {$paginate.page_total}</td>
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
		<td class="productListing-heading">ID</td>
		<td class="productListing-heading">Vendor</td>
		<td class="productListing-heading">Date</td>
		<td class="productListing-heading">Due</td>
		<td class="productListing-heading">Amount Due</td>
		<td class="productListing-heading">Amount Paid</td>
		<td class="productListing-heading">Ref. No</td>
		<td class="productListing-heading">Memo</td>
		<td class="productListing-heading">Paid</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$billArray item=bill}
	<tr>
		<td class="productListing-data">{$bill->get_bill_id()}</td>
		<td class="productListing-data">{$bill->get_vendor_id()}</td>
		<td class="productListing-data">{$bill->get_bill_date_create()}</td>
		<td class="productListing-data">{$bill->get_bill_due_date()}</td>
		<td class="productListing-data">{$bill->get_bill_amount_due()}</td>
		<td class="productListing-data">{$bill->get_bill_amount_paid()}</td>
		<td class="productListing-data">{$bill->get_bill_ref_num()}</td>
		<td class="productListing-data">{$bill->get_bill_memo()}</td>
		<td class="productListing-data">{$bill->get_bill_paid()}</td>
		<td class="productListing-data"><a href="index.php?page=bill:view_bill&bill_id={$bill->get_bill_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="10">No Results Found</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
