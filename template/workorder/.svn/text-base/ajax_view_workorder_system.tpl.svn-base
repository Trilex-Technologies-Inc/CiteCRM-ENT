<!-- ajax_view_workorder_system -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Sytems Assigned to this Work Order</span></td>
		<td align="right">
            {if $is_active}
                <a href="javascript:add_window('Systems');">Add System</a>
            {/if}
        </td>	
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system.system_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','system.system_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','system.system_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','system_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','system_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_host_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','system_host_name','ASC','{$next}')" style="cursor:pointer">Host Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','system_host_name','DESC','{$next}')" style="cursor:pointer">Host Name</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_ip_address'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','system_ip_address','ASC','{$next}')" style="cursor:pointer">IP</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','system_ip_address','DESC','{$next}')" style="cursor:pointer">IP</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'operating_system_manufacture_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','operating_system_manufacture_id','ASC','{$next}')" style="cursor:pointer">Make</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','operating_system_manufacture_id','DESC','{$next}')" style="cursor:pointer">Make</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'system_model_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','system_model_id','ASC','{$next}')" style="cursor:pointer">Model</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','system_model_id','DESC','{$next}')" style="cursor:pointer">Model</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'operating_system_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Systems','operating_system_id','ASC','{$next}')" style="cursor:pointer">OS</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Systems','operating_system_id','DESC','{$next}')" style="cursor:pointer">OS</span>
			{/if}
		</td>
		{if $edit}
			<td class="productListing-heading">Action</td>
		{/if}
	</tr>
{foreach from=$system_array item="system"}
	<tr>
		<td class="productListing-data" {if $field == 'system.system_id'} style="background-color: #ECECEC;"{/if}><a href="index.php?page=system:view_system&system_id={$system->get_system_id()}">{$system->get_system_id()}</a></td>
		<td class="productListing-data" {if $field == 'system_name'} style="background-color: #ECECEC;"{/if}>{$system->get_system_name()}</td>
		<td class="productListing-data" {if $field == 'system_host_name'} style="background-color: #ECECEC;"{/if}>{$system->get_system_host_name()}</td>
		<td class="productListing-data" {if $field == 'system_ip_address'} style="background-color: #ECECEC;"{/if}>{$system->get_system_ip_address()}</td>
		<td class="productListing-data" {if $field == 'operating_system_manufacture_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_manufacture_id()|system_manufacture_name}</td>
		<td class="productListing-data" {if $field == 'system_model_id'} style="background-color: #ECECEC;"{/if}>{$system->get_system_model_id()|system_model_name}</td>
		<td class="productListing-data" {if $field == 'operating_system_id'} style="background-color: #ECECEC;"{/if}>{$system->get_operating_system_manufacture_id()|operating_system_manufacture_name} {$system->get_operating_system_id()|operating_system_name}</td>	
		{if $edit == true}	
		<td class="productListing-data" align="right">        
			<img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Remove From Workorder" onclick="delete_system_from_workorder({$system->get_system_id()},{$workorder_id})" style="cursor:pointer">&nbsp;    
		</td>	
		{/if}
				
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">
			No Systems Assigned 
		</td>
	</tr>	
{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="8"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_window('Systems','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_window('Systems','{$field}','{$sort}','{paginate_prev id="systems"}');">Prev</a> |

							<a href="javascript:load_window('Systems','{$field}','{$sort}','{paginate_next id="systems"}');">Next</a> |
							<a href="javascript:load_window('Systems','{$field}','{$sort}','{paginate_last id="systems"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>

