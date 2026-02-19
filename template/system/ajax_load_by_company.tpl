<!-- ajax_load_by_company_id -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Systems</span></td>	
		<td align="right"><a href="{$ROOT_URL}/index.php?page=system:add_system&company_id={$company_id}">Add System</a></td>
	</tr>
</table>

	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'system_name'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','system_name','ASC','{$next}')" style="cursor:pointer">Name</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','system_name','DESC','{$next}')" style="cursor:pointer">Name</span>
				{/if}	
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'system_manufacture_id'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','system_manufacture_id','ASC','{$next}')" style="cursor:pointer">Manufacture</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','system_manufacture_id','DESC','{$next}')" style="cursor:pointer">Manufacture</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'system_model_id'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','system_model_id','ASC','{$next}')" style="cursor:pointer">Model</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','system_model_id','DESC','{$next}')" style="cursor:pointer">Model</span>
				{/if}			
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'operating_system_manufacture_id'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','operating_system_manufacture_id','ASC','{$next}')" style="cursor:pointer">OS</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','operating_system_manufacture_id','DESC','{$next}')" style="cursor:pointer">OS</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'system_host_name'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','system_host_name','ASC','{$next}')" style="cursor:pointer">Host Name</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','system_host_name','DESC','{$next}')" style="cursor:pointer">Host Name</span>
				{/if}			
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'system_ip_address'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_systems('Sytemes','system_ip_address','ASC','{$next}')" style="cursor:pointer">IP Address</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_systems('Sytemes','system_ip_address','DESC','{$next}')" style="cursor:pointer">IP Address</span>
				{/if}	
			</td>
		</tr>
		{foreach from=$system_array item=system}
		<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=system:view_system&system_id={$system->get_system_id()}';">
			<td class="productListing-data" {if $field == 'system_name'} style="background-color: #ECECEC;"{/if}>{$system->get_system_name()}</td>
			<td class="productListing-data" {if $field == 'system_manufacture_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_manufacture_id()|system_manufacture_name}</td>
			<td class="productListing-data" {if $field == 'system_model_id'} style="background-color: #ECECEC;"{/if} >{$system->get_system_model_id()}</td>
			<td class="productListing-data" {if $field == 'operating_system_manufacture_id'} style="background-color: #ECECEC;"{/if}>{$system->get_operating_system_manufacture_id()|operating_system_manufacture_name} {$system->get_operating_system_id()|operating_system_name}</td>
			<td class="productListing-data" {if $field == 'system_host_name'} style="background-color: #ECECEC;"{/if}>{$system->get_system_host_name()|default:"N/A"}</td>
			<td class="productListing-data" {if $field == 'system_ip_address'} style="background-color: #ECECEC;"{/if}>{$system->get_system_ip_address()|default:"N/A"}</td>
		</tr>
		{foreachelse}
		<tr>
			<td class="productListing-data" colspan="9">No Systems</td>
		</tr>
		{/foreach}
		<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_company_systems('Sytemes','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_company_systems('Sytemes','{$field}','{$sort}','{paginate_prev id="system"}');">Prev</a> |

							<a href="javascript:load_company_systems('Sytemes','{$field}','{$sort}','{paginate_next id="system"}');" >Next</a> |
							<a href="javascript:load_company_systems('Sytemes','{$field}','{$sort}','{paginate_last id="system}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
