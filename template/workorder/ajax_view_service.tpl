<!-- ajax_view_service.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Flat Rate Services</span></span></td>
		<td align="right">
            {if $is_active}
            <a href="javascript:add_window('Service');">Add Service</a>
            {/if}
        </td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_service_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Service','workorder_service_id','ASC','{$next}')" style="cursor:pointer">Service ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Service','workorder_service_id','DESC','{$next}')" style="cursor:pointer">Service ID	</span>
			{/if}
		</td>
		<td class="productListing-heading">Qty</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_service_description'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Service','workorder_service_description','ASC','{$next}')" style="cursor:pointer">Description</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Service','workorder_service_description','DESC','{$next}')" style="cursor:pointer">Description</span>
			{/if}
		</td>
		<td class="productListing-heading">Amount</td>
        <td class="productListing-heading">Sub Total</td>
		{if $edit}
		<td class="productListing-heading">Action</td>
		{/if}
	</tr>
{foreach from=$workorder_service_array item=workorder_service}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'">
		<td class="productListing-data" {if $field == 'workorder_service_id'} style="background-color: #ECECEC;"{/if} >{$workorder_service->get_workorder_service_id()}</td>
		<td class="productListing-data" >{$workorder_service->get_workorder_service_qty()}</td>
		<td class="productListing-data" {if $field == 'workorder_service_description'} style="background-color: #ECECEC;"{/if}>{$workorder_service->get_workorder_service_description()}</td>
		<td class="productListing-data">${$workorder_service->get_workorder_service_amount()}</td>
        <td class="productListing-data">${$workorder_service->get_workorder_service_total()}</td>
	{if $edit}	
		<td class="productListing-data"></td>
	{/if}	
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Flate Rate Services Recorded</td>
	</tr>
{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_window('Service','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_window('Service','{$field}','{$sort}','{paginate_prev id="service"}');">Prev</a> |

							<a href="javascript:load_window('Service','{$field}','{$sort}','{paginate_next id="service"}');">Next</a> |
							<a href="javascript:load_window('Service','{$field}','{$sort}','{paginate_last id="service"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>