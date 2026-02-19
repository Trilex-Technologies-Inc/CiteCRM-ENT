<!-- ajax_view_workorder_time -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Work Order Labor</span></span></td>
		<td align="right">
            {if $is_active}
            <a href="javascript:add_window('Time');">Record Labor</a>
            {/if}
        </td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Time','user_id','ASC','{$next}')" style="cursor:pointer">User</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Time','user_id','DESC','{$next}')" style="cursor:pointer">User</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_time_start'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Time','workorder_time_start','ASC','{$next}')" style="cursor:pointer">Start Time</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Time','workorder_time_start','DESC','{$next}')" style="cursor:pointer">Start Time</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_time_end'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Time','workorder_time_end','ASC','{$next}')" style="cursor:pointer">End Time</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Time','workorder_time_end','DESC','{$next}')" style="cursor:pointer">End Time</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_time_total'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Time','workorder_time_total','ASC','{$next}')" style="cursor:pointer">Total Time (hrs)</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Time','workorder_time_total','DESC','{$next}')" style="cursor:pointer">Total Time (hrs)</span>
			{/if}
		</td>
        <td class="productListing-heading">Labor Rate</td>
        <td class="productListing-heading">Sub Total</td>
		{if $edit}
		<td class="productListing-heading">Action</td>
		{/if}
	</tr>
{foreach from=$workorder_time_array item=workorder_time}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'">
		<td class="productListing-data" {if $field == 'user_id'} style="background-color: #ECECEC;"{/if} >{$workorder_time->get_user_id()|display_names}</td>
		<td class="productListing-data" {if $field == 'workorder_time_start'} style="background-color: #ECECEC;"{/if}>{$workorder_time->get_workorder_time_start()|date_format:$DATE_TIME_FORMAT}</td>
		<td class="productListing-data" {if $field == 'workorder_time_end'} style="background-color: #ECECEC;"{/if}>{$workorder_time->get_workorder_time_end()|date_format:$DATE_TIME_FORMAT}</td>
		<td class="productListing-data" {if $field == 'workorder_time_total'} style="background-color: #ECECEC;"{/if}>
             <img src="images/icons/copy_16.gif" onMouseOver="ddrivetip('{$workorder_time->get_workorder_time_description()|escape:'javascript'}')" onMouseOut="hideddrivetip()" style="cursor:pointer" border="0"> {$workorder_time->get_workorder_time_total()}</td>
        
        <td class="productListing-data">${$workorder_time->get_workorder_time_rate()}</td>
        <td class="productListing-data">${$workorder_time->get_workorder_time_amount()}</td>
		   {if $edit}	
		<td class="productListing-data">        		
			<!--<a href="javascript:"><img src="{$ROOT_URL}/images/icons/edit_16.gif" alt="Edit Time" border="0"></a>&nbsp;-->
			<a href="javascript:delete_workorder_time({$workorder_time->get_workorder_time_id()}, '{$workorder_time->get_workorder_time_start()|date_format:$DATE_TIME_FORMAT}', '{$workorder_time->get_workorder_time_end()|date_format:$DATE_TIME_FORMAT}')"><img src="{$ROOT_URL}/images/icons/del_16.gif" alt="Delete Time" border="0" ></a>&nbsp;	         
		</td>
		 {/if}	
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Labor Recorded</td>
	</tr>
{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_window('Time','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_window('Time','{$field}','{$sort}','{paginate_prev id="time"}');">Prev</a> |

							<a href="javascript:load_window('Time','{$field}','{$sort}','{paginate_next id="time"}');">Next</a> |
							<a href="javascript:load_window('Time','{$field}','{$sort}','{paginate_last id="time"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>