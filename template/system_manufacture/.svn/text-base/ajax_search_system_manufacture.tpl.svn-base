<!-- ajax_search_system_manufacture.tpl -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td width="100%" class="productListing-heading">
			{if $sort == 'DESC' && $field == 'manufacture_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('manufacture_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('manufacture_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td width="100%" class="productListing-heading">
			{if $sort == 'DESC' && $field == 'manufacture_abrv'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('manufacture_abrv','ASC','{$next}')" style="cursor:pointer">Abrv</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('manufacture_abrv','DESC','{$next}')" style="cursor:pointer">Abrv</span>
			{/if}
		</td>
	</tr>
	{foreach from=$system_manufacture_array item=system_manufacture}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_manufacture('{$system_manufacture->get_system_manufacture_id()}')">
		<td class="productListing-data" {if $field == 'manufacture_abrv'} style="background-color: #ECECEC;"{/if}>{$system_manufacture->get_manufacture_name()}</td>
		<td class="productListing-data" {if $field == 'manufacture_abrv'} style="background-color: #ECECEC;"{/if}>{$system_manufacture->get_manufacture_abrv()}</td>
	
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
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_prev id="manufacture"}');">Prev</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_next id="manufacture"}');">Next</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_last id="manufacture"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>	
</table>