<!-- ajax_load_by_company.tpl-->
<table width="100%">
	<tr>
		<td><span class="greetUser">Work Orders</span></td>
		<td align="right"><a href="{$ROOT_URL}/index.php?page=workorder:add_workorder&company_id={$company_id}">New Workorder</a></td>	
	</tr>
</table>

	<table width="100%" cellpadding="3" cellspacing="0" border="1" class="productListing">
		<tr>
			<td class="productListing-heading">				
				{if $sort == 'DESC' && $field == 'workorder_id'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_id','ASC','{$next}')" style="cursor:pointer">ID</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_workorders('Workorders','workorder_id','DESC','{$next}')" style="cursor:pointer">ID</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'workorder_open_date'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_open_date','ASC','{$next}')" style="cursor:pointer">Date Opened</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_workorders('Workorders','workorder_open_date','DESC','{$next}')" style="cursor:pointer">Date Opened</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'workorder_status'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_status','ASC','{$next}')" style="cursor:pointer">Status</span>
					
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif">  <span onclick="load_company_workorders('Workorders','workorder_status','DESC','{$next}')" style="cursor:pointer">Status</span>
				{/if}
				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'workorder_active'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_active','ASC','{$next}')" style="cursor:pointer">Active</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif">  <span onclick="load_company_workorders('Workorders','workorder_active','DESC','{$next}')" style="cursor:pointer">Active</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'workorder_create_by'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_create_by','ASC','{$next}')" style="cursor:pointer">Created By</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif">  <span onclick="load_company_workorders('Workorders','workorder_create_by','DESC','{$next}')" style="cursor:pointer">Created By</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'workorder_assigned_to'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_workorders('Workorders','workorder_assigned_to','ASC','{$next}')" style="cursor:pointer">Assigned To</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif">  <span onclick="load_company_workorders('Workorders','workorder_assigned_to','DESC','{$next}')" style="cursor:pointer">Assigned To</span>
				{/if}
				
			</td>
			<td class="productListing-heading">Scope</td>
		</tr>
		{foreach from=$workorder_array item=workorder}
		<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$workorder->get_workorder_id()}';">
			<td class="productListing-data" {if $field == 'workorder_id'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_id()}</td>
			<td class="productListing-data" {if $field == 'workorder_open_date'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_open_date()|date_format:$DATE_FORMAT}</td>
			<td class="productListing-data" {if $field == 'workorder_status'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_status()|workorder_status}</td>
			<td class="productListing-data" {if $field == 'workorder_active'} style="background-color: #ECECEC;"{/if} >{$workorder->get_workorder_active()|yesno}</td>
			<td class="productListing-data" {if $field == 'workorder_create_by'} style="background-color: #ECECEC;"{/if} >{$workorder->get_workorder_create_by()|display_names}</td>
			<td class="productListing-data" {if $field == 'workorder_assigned_to'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_assigned_to()|display_names}</td>
			<td class="productListing-data">{$workorder->get_workorder_scope()}</td>
		</tr>
		{foreachelse}
		<tr>
			<td class="productListing-data" colspan="8">No Results Found</td>
		</tr>
		{/foreach}
		<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_company_workorders('Workorders','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_company_workorders('Workorders','{$field}','{$sort}','{paginate_prev id="company"}');">Prev</a> |

							<a href="javascript:load_company_workorders('Workorders','{$field}','{$sort}','{paginate_next id="company"}');">Next</a> |
							<a href="javascript:load_company_workorders('Workorders','{$field}','{$sort}','{paginate_last id="company"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

