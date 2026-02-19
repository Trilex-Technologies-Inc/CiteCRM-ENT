<!-- ajax_load_leads.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">My Leads</span></td>
        <td align="right"><a href="/index.php?page=leads:add">Add New Lead</a></td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_type_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_type_id','ASC','{$next}')" style="cursor:pointer">Lead Type</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_type_id','DESC','{$next}')" style="cursor:pointer">Lead Type</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_status_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_status_id','ASC','{$next}')" style="cursor:pointer">Status</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_status_id','DESC','{$next}')" style="cursor:pointer">Status</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_assigned_user'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_assigned_user','ASC','{$next}')" style="cursor:pointer">Assigned</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_assigned_user','DESC','{$next}')" style="cursor:pointer">Assigned</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','company_id','ASC','{$next}')" style="cursor:pointer">Account</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','company_id','DESC','{$next}')" style="cursor:pointer">Account</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_referer'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_referer','ASC','{$next}')" style="cursor:pointer">Referer</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_referer','DESC','{$next}')" style="cursor:pointer">Referer</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_campaign'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_campaign','ASC','{$next}')" style="cursor:pointer">Campaing</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_campaign','DESC','{$next}')" style="cursor:pointer">Campaing</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'lead_create_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Leads','lead_create_date','ASC','{$next}')" style="cursor:pointer">Create Date</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Leads','lead_create_date','DESC','{$next}')" style="cursor:pointer">Create Date</span>
			{/if}
		</td>			
	</tr>
	{foreach from=$leadArray item=lead}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=leads:view_lead&lead_id={$lead->get_lead_id()}';">
		<td class="productListing-data" {if $field == 'lead_id'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_id()}</td>
		<td class="productListing-data" {if $field == 'lead_type_id'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_type_id()|lead_type}</td>
		<td class="productListing-data" {if $field == 'lead_assigned_user'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_status_id()|lead_status}</td>
		<td class="productListing-data" {if $field == 'lead_assigned_user'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_assigned_user()|display_names}</td>
		<td class="productListing-data" {if $field == 'company_id'} style="background-color: #ECECEC;"{/if}>{$lead->get_company_id()|company_name}</td>
		<td class="productListing-data" {if $field == 'lead_referer'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_referer()}</td>
		<td class="productListing-data" {if $field == 'lead_campaign'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_campaign()}</td>
		<td class="productListing-data" {if $field == 'lead_create_date'} style="background-color: #ECECEC;"{/if}>{$lead->get_lead_create_date()}</td>
	</tr>	
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">No Leads</td>
	</tr>			
	{/foreach}
	<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_tools('Leads','{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_tools('Leads','{$field}','{$sort}','{paginate_prev id="leads"}');">Prev</a> |
						<a href="javascript:load_tools('Leads','{$field}','{$sort}','{paginate_next id="leads"}');">Next</a> |
						<a href="javascript:load_tools('Leads','{$field}','{$sort}','{paginate_last id="leads"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
		
