<!-- search_workorder_status -->
{include file="core/header.tpl"}
<table width="100%" cellpadding="3" cellspacing="0" border="0">
	<tr>
		<td><span class="greetUser">Records Found {$paginate.total}</span><br></td>
		<td align="right"><a href="?page=workorder_status:add_workorder_status"><img src="images/icons/add_16.gif" alt="Add New Work Order Status" border="0"></a></td>
	</tr>
</table>
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
		<td class="productListing-heading">Status</td>
		<td class="productListing-heading">Order</td>
		<td class="productListing-heading">Active</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$workorder_statusArray item=workorder_status}
	<tr>
		<td class="productListing-data">{$workorder_status->get_workorder_status_id()}</td>
		<td class="productListing-data">{$workorder_status->get_workorder_status_text()}</td>
		<td class="productListing-data">{$workorder_status->get_workorder_status_order()}</td>
		<td class="productListing-data">{$workorder_status->get_workorder_status_active()|yesno}</td>
		<td class="productListing-data"><a href="index.php?page=workorder_status:view_workorder_status&workorder_status_id={$workorder_status->get_workorder_status_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">No Results Found</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
