<!-- ajax_search_workorder.tpl -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
        <td class="productListing-heading">Account</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_open_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_open_date','ASC','{$next}')" style="cursor:pointer">Opened</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_open_date','DESC','{$next}')" style="cursor:pointer">Opened</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_status'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_status','ASC','{$next}')" style="cursor:pointer">Status</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_status','DESC','{$next}')" style="cursor:pointer">Status</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_active'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_active','ASC','{$next}')" style="cursor:pointer">Active</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_active','DESC','{$next}')" style="cursor:pointer">Active</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_create_by'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_create_by','ASC','{$next}')" style="cursor:pointer">Created</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_create_by','DESC','{$next}')" style="cursor:pointer">Created</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_assigned_to'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_assigned_to','ASC','{$next}')" style="cursor:pointer">Assigned</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_assigned_to','DESC','{$next}')" style="cursor:pointer">Assigned</span>
			{/if}

		</td>
		<td class="productListing-heading">Scope</span></td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_close_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_close_date','ASC','{$next}')" style="cursor:pointer">Closed</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_close_date','DESC','{$next}')" style="cursor:pointer">Closed</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'workorder_close_by'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('workorder_close_by','ASC','{$next}')" style="cursor:pointer">Closed By</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('workorder_close_by','DESC','{$next}')" style="cursor:pointer">Closed By</span>
			{/if}

		</td>
		<td class="productListing-heading">Resolution</span></td>
	</tr>
	{foreach from=$workorderArray item=workorder}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$workorder->get_workorder_id()}';">
		<td class="productListing-data" {if $field == 'workorder_id'} style="background-color: #ECECEC;"{/if}>

            <a href="{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$workorder->get_workorder_id()}">{$workorder->get_workorder_id()}</a>
        </td>
        <td class="productListing-data">
            {load_company_by_workorder workorder_id=$workorder->get_workorder_id()}

            {if $workorderObj->fields.company_id > 0}
                
                <a href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$workorderObj->fields.company_id}">{$workorderObj->fields.company_name}</a>
            {else}
                {load_user_by_workorder workorder_id=$workorder->get_workorder_id()}
                   <a href="{$ROOT_URL}/index.php?page=user:admin_view_user_detail&userID={$workorderObj->fields.user_id}">{$workorderObj->fields.user_first_name}  {$workorderObj->fields.user_last_name}</a>
            {/if}
        </td>
		<td class="productListing-data" {if $field == 'workorder_open_date'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_open_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data" {if $field == 'workorder_status'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_status()|workorder_status}</td>
		<td class="productListing-data" {if $field == 'workorder_active'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_active()|yesno}</td>
		<td class="productListing-data" {if $field == 'workorder_create_by'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_create_by()|display_names}</td>
		<td class="productListing-data" {if $field == 'workorder_assigned_to'} style="background-color: #ECECEC;"{/if}>{$workorder->get_workorder_assigned_to()|display_names}</td>
		<td class="productListing-data">
            <img src="{$ROOT_URL}/images/icons/copy_16.gif" border="0" alt="More" onMouseOver="ddrivetip('<b>Scope</b><br>{$workorder->get_workorder_scope()|escape:'javascript'|truncate:50:"---"}<br><b>Description:</b><br>{$workorder->get_workorder_desription()|escape:'javascript'|truncate:300:"---"}')" onMouseOut="hideddrivetip()">
            {$workorder->get_workorder_scope()|truncate:15}            
        </td>
		<td class="productListing-data" {if $field == 'workorder_close_date'} style="background-color: #ECECEC;"{/if}>
            {if $workorder->get_workorder_close_date() != 0}
                {$workorder->get_workorder_close_date()|date_format:$DATE_FORMAT}
            {else}
                N/A
            {/if}
        </td>
		<td class="productListing-data" {if $field == 'workorder_close_by'} style="background-color: #ECECEC;"{/if}>
            {if $workorder->get_workorder_close_by() != 0}
                {$workorder->get_workorder_close_by()|display_names}
            {else}
                N/A
            {/if}
        </td>
		<td class="productListing-data">
            {if $workorder->get_workorder_resolution() != ""}
                <img src="{$ROOT_URL}/images/icons/copy_16.gif" border="0" alt="More" onMouseOver="ddrivetip('{$workorder->get_workorder_resolution()|escape:'javascript'|truncate:300:"---"}')" onMouseOut="hideddrivetip()">
                {$workorder->get_workorder_resolution()|truncate:15}
            {else}
                N/A
            {/if}

        </td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="13">No Results Found</td>
	</tr>
	{/foreach}
	<tr>
		<td class="productListing-data" style="background-color: #ECECEC;" colspan="11">
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_window('{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_prev id="workorder"}');">Prev</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_next id="workorder"}');">Next</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_last id="workorder"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
