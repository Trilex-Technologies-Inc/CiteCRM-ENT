<!-- ajax_search_operating_system_manufacture.tpl -->
<!-- ajax_search_system_manufacture.tpl -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td width="100%" class="productListing-heading">
			{if $sort == 'DESC' && $field == 'operating_system_manufacture_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('operating_system_manufacture_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('operating_system_manufacture_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td width="100%" class="productListing-heading">
			{if $sort == 'DESC' && $field == 'operating_system_manufacture_website'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('operating_system_manufacture_website','ASC','{$next}')" style="cursor:pointer">Website</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('operating_system_manufacture_website','DESC','{$next}')" style="cursor:pointer">Website</span>
			{/if}
		</td>
		<td width="100%" class="productListing-heading" nowrap>
			{if $sort == 'DESC' && $field == 'operating_system_manufacture_active'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('operating_system_manufacture_active','ASC','{$next}')" style="cursor:pointer">Active</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('operating_system_manufacture_active','DESC','{$next}')" style="cursor:pointer">Active</span>
			{/if}
		</td>
	</tr>
	{foreach from=$operating_system_manufacture_array item=operating_system_manufacture}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_manufacture('{$operating_system_manufacture->get_operating_system_manufacture_id()}')">
		<td class="productListing-data" {if $field == 'operating_system_manufacture_name'} style="background-color: #ECECEC;"{/if}>{$operating_system_manufacture->get_operating_system_manufacture_name()}</td>
		<td class="productListing-data" {if $field == 'manufacture_abrv'} style="background-color: #ECECEC;"{/if}>{$operating_system_manufacture->get_operating_system_manufacture_website()}</td>
		<td class="productListing-data" {if $field == 'manufacture_abrv'} style="background-color: #ECECEC;"{/if}>{$operating_system_manufacture->get_operating_system_manufacture_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="6">No Results Found</td>
	</tr>
	{/foreach}
	<tr>
		<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_window('{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_prev id="operating_manufacture"}');">Prev</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_next id="operating_manufacture"}');">Next</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_last id="operating_manufacture"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>	
</table>