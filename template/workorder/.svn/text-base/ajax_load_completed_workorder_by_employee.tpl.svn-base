<!-- ajax_load_completed_workorder_by_employee.tpl -->
<span class="greetUser">{$workorder_status} Work Orders</span>
	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
			<td class="productListing-heading">ID</td>
			<td class="productListing-heading">Date Opened</td>
			<td class="productListing-heading">Status</td>
			<td class="productListing-heading">Active</td>
			<td class="productListing-heading">Created By</td>
			<td class="productListing-heading">Assigned To</td>
			<td class="productListing-heading">Scope</td>
			<td class="productListing-heading">View</td>
		</tr>
		{foreach from=$workorder_array item=workorder}
		<tr>
			<td class="productListing-data">{$workorder->get_workorder_id()}</td>
			<td class="productListing-data">{$workorder->get_workorder_open_date()|date_format:$DATE_FORMAT}</td>
			<td class="productListing-data">{$workorder->get_workorder_status()|workorder_status}</td>
			<td class="productListing-data">{$workorder->get_workorder_active()|yesno}</td>
			<td class="productListing-data">{$workorder->get_workorder_create_by()|display_names}</td>
			<td class="productListing-data">{$workorder->get_workorder_assigned_to()|display_names}</td>
			<td class="productListing-data">{$workorder->get_workorder_scope()}</td>
			<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$workorder->get_workorder_id()}"><img src="{$ROOT_URL}/images/icons/srch_16.gif" alt="View" border="0"></a></td>
		</tr>
		{foreachelse}
		<tr>
			<td class="productListing-data" colspan="12">No Results Found</td>
		</tr>
		{/foreach}
	</table>
