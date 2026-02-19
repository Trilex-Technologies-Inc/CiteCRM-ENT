<!-- search_vendor -->
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
		<td class="productListing-heading">Name</td>
		<td class="productListing-heading">Website</td>
		<td class="productListing-heading">Date Created</td>
		<td class="productListing-heading">Active</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$vendorArray item=vendor}
	<tr>
		<td class="productListing-data">{$vendor->get_vendor_id()}</td>
		<td class="productListing-data">{$vendor->get_vendor_name()}</td>
		<td class="productListing-data"><a href="{$vendor->get_vendor_website()}" target="_blank">{$vendor->get_vendor_website()}</a></td>
		<td class="productListing-data">{$vendor->get_vendor_create_date()|date_format:"%Y-%m-%d"}</td>
		<td class="productListing-data">{$vendor->get_vendor_active()|yesno}</td>
		<td class="productListing-data"><a href="index.php?page=vendor:view_vendor&vendor_id={$vendor->get_vendor_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="6">No Results Found</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
