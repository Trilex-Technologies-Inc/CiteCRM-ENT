<!-- ajax_search_systems.tpl -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
		<td class="productListing-heading">UPC</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_manufacture_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_manufacture_id','ASC','{$next}')" style="cursor:pointer">Manufacture</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_manufacture_id','DESC','{$next}')" style="cursor:pointer">Manufacture</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_model_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_model_id','ASC','{$next}')" style="cursor:pointer">Model</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_model_id','DESC','{$next}')" style="cursor:pointer">Model</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_active'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_active','ASC','{$next}')" style="cursor:pointer">Active</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_active','DESC','{$next}')" style="cursor:pointer">Active</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_last_service'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('system_last_service','ASC','{$next}')" style="cursor:pointer">Last Service</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('system_last_service','DESC','{$next}')" style="cursor:pointer">Last Service</span>
			{/if}
		 </td>
		<td class="productListing-heading">Action</td>
	</tr>
	{foreach from=$systemArray item=system }

    {fetch_system_owner system_id=$system->get_system_id() assign=ownerObj}

	<tr  onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=system:view_system&system_id={$system->get_system_id()}';">
		<td class="productListing-data" {if $field == 'system_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_id()}</td>
		<td class="productListing-data"><img src="images/icons/copy_16.gif" border="0" alt="More" onMouseOver="ddrivetip('{if $companyObj == 'true'}Company Owner<br>{$ownerObj->get_company_name()}<br> {else} User Owner<br>{$ownerObj->getUserFirstName()} {$ownerObj->getUserLastName()} <br>{/if}')" onMouseOut="hideddrivetip()"> SYS{$system->get_system_id()}</td>
		<td class="productListing-data" {if $field == 'system_manufacture_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_manufacture_id()|system_manufacture_name}</td>
		<td class="productListing-data" {if $field == 'system_model_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_model_id()|system_model_name}</td>
		<td class="productListing-data" {if $field == 'system_name'} style="background-color: #ECECEC;"{/if}><img src="images/icons/copy_16.gif" border="0" alt="More" onMouseOver="ddrivetip('IP Assignment<br>{$system->get_system_ip_address()}<br>{$system->get_system_host_name()}')" onMouseOut="hideddrivetip()"> {$system->get_system_name()}</td>
		<td class="productListing-data" {if $field == 'system_active'} style="background-color: #ECECEC;"{/if}>{$system->get_system_active()|yesno}</td>
		<td class="productListing-data" {if $field == 'system_last_service'} style="background-color: #ECECEC;"{/if}>
			{if $system->get_system_last_service() < 1}
				Never Serviced
			{else}
				{$system->get_system_last_service()|date_format:$DATE_FORMAT}
			{/if}
		</td>
		<td class="productListing-data">
            <a href="{if $companyObj == 'true'}{$ROOT_URL}/index.php?page=workorder:add_workorder&company_id={$ownerObj->get_company_id()}&system_id={$system->get_system_id()}{else}{$ROOT_URL}/index.php?page=workorder:add_workorder&user_id={$ownerObj->getUserID()}&system_id={$system->get_system_id()}{/if}"><img src="{$ROOT_URL}/images/icons/sinfo_16.gif" border="0" alt="New Work Order" onMouseOver="ddrivetip('Create New Work Order')" onMouseOut="hideddrivetip()"></a>
            <a href="{$ROOT_URL}/index.php?page=system:update_system&system_id={$system->get_system_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit System" onMouseOver="ddrivetip('Edit System')" onMouseOut="hideddrivetip()"></a>
        </td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Results Found</td>
	</tr>
	{/foreach}
	<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_window('{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_prev id="system"}');">Prev</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_next id="system"}');">Next</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_last id="system"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
