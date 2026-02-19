<!-- search_operating_system -->
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
		<td class="productListing-heading">Operating System</td>
		<td class="productListing-heading">Active</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$operating_systemArray item=operating_system}
	<tr>
		<td class="productListing-data">{$operating_system->get_operating_system_id()}</td>
		<td class="productListing-data">{$operating_system->get_operating_system_manufacture_id()}</td>
		<td class="productListing-data">{$operating_system->get_operating_system_active()}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=operating_system:view_operating_system&operating_system_id={$operating_system->get_operating_system_id()}"><img src="{$ROOT_URL}/images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="4">No Results Found</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
