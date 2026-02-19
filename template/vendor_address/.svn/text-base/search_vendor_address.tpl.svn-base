<!-- search_vendor_address -->
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
		<td class="productListing-heading">Address Type</td>
		<td class="productListing-heading">Street </td>
		<td class="productListing-heading">Street Cont</td>
		<td class="productListing-heading">City</td>
		<td class="productListing-heading">State</td>
		<td class="productListing-heading">Postal Code</td>
		<td class="productListing-heading">Country</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$vendor_addressArray item=vendor_address}
	<tr>
		<td class="productListing-data">{$vendor_address->get_vendor_address_id()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_id()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_address_type()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_street_1()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_street_2()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_city()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_state_id()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_postal_code()}</td>
		<td class="productListing-data">{$vendor_address->get_vendor_country_id()}</td>
		<td class="productListing-data"><a href="index.php?page=vendor_address:view_vendor_address&vendor_address_id={$vendor_address->get_vendor_address_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="10">No Results Found</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
