<!-- ajax_load_workorder_info.tpl -->
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-heading">Date Opened</td>
		<td class="productListing-heading">Status</td>
		<td class="productListing-heading">Active</td>	
		<td class="productListing-heading">Created By</td>
		<td class="productListing-heading">Assigned To</td>
		
		{if $workorderObj->get_workorder_close_date() != 0}
		<td class="productListing-heading">Date Closed</td>
		<td class="productListing-heading">Closed By</td>
		{/if}
	</tr><tr>
		<td class="productListing-data">{$workorderObj->get_workorder_open_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data">

		{if $workorderObj->get_workorder_status() != 5 && $workorderObj->get_workorder_status() != 7 && $workorderObj->get_workorder_status() !=6}

			{fetch_workorder_status assign=statusArray}
			<select name="workorder_status" onchange="updateStatus()" id="workorder_status" style="z-index:0;">
						
			{foreach from=$statusArray item=status}
				{if $status->get_workorder_status_id() != 7}
				<option value="{$status->get_workorder_status_id()}" 
					{if $status->get_workorder_status_id() == $workorderObj->get_workorder_status()} selected {/if} >
					{$status->get_workorder_status_text()}</option>
				{/if}
			{/foreach}
            </select>

		{else}
    
            {if $workorderObj->get_workorder_status() != 7 && $workorderObj->get_workorder_status() != 6}

				<select name="workorder_status" onchange="updateStatus()" id="workorder_status" >
					<option value="5">Awaiting Payment</option>
					<option value="5">View Invoice</option>
				</select>
            {else}
                {if $workorderObj->get_workorder_status() == 6}
                    Suspended
                {else}
                   Completed
                {/if}
                
            {/if}
        
		{/if}
			


		</td>	
		<td class="productListing-data">{$workorderObj->get_workorder_active()|yesno}</td>	
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$workorderObj->get_workorder_create_by()}">{$workorderObj->get_workorder_create_by()|display_names}</a></td>		
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$workorderObj->get_workorder_create_by()}">{$workorderObj->get_workorder_assigned_to()|display_names}</a></td>
		
		{if $workorderObj->get_workorder_close_date() != 0}
		<td class="productListing-data">{$workorderObj->get_workorder_close_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$workorderObj->get_workorder_create_by()}">{$workorderObj->get_workorder_close_by()|display_names}</a></td>
		{/if}
		
	</tr>
</table>
<br>