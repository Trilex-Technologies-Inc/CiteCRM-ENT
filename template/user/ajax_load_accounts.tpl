<table width="100%">
	<tr>
		<td><span class="greetUser">My Accounts</span></td>
        <td align="right"><a href="{$ROOT_URL}/index.php?page=company:add_company">Add New Account</a></td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('company_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('company_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('company_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('company_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_website'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('company_website','ASC','{$next}')" style="cursor:pointer">Website</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('company_website','DESC','{$next}')" style="cursor:pointer">Website</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_create_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('company_create_date','ASC','{$next}')" style="cursor:pointer">Created</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('company_create_date','DESC','{$next}')" style="cursor:pointer">Created</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'company_active'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('company_active','ASC','{$next}')" style="cursor:pointer">Active</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('company_active','DESC','{$next}')" style="cursor:pointer">Active</span>
			{/if}
		</td>
	</tr>
	{foreach from=$companyArray item=company}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=company:view_company&company_id={$company->get_company_id()}';">
		<td class="productListing-data" {if $field == 'company_id'} style="background-color: #ECECEC;"{/if}>{$company->get_company_id()}</td>
		<td class="productListing-data" {if $field == 'company_name'} style="background-color: #ECECEC;"{/if}>{$company->get_company_name()}</td>
		<td class="productListing-data" {if $field == 'company_website'} style="background-color: #ECECEC;"{/if}>{$company->get_company_website()}</td>
		<td class="productListing-data" {if $field == 'company_create_date'} style="background-color: #ECECEC;"{/if}>{$company->get_company_create_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data" {if $field == 'company_active'} style="background-color: #ECECEC;"{/if}>{$company->get_company_active()|yesno}</td>
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
						<a href="javascript:load_tools('{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_tools('{$field}','{$sort}','{paginate_prev id="company"}');">Prev</a> |
						<a href="javascript:load_tools('{$field}','{$sort}','{paginate_next id="company"}');">Next</a> |
						<a href="javascript:load_tools('{$field}','{$sort}','{paginate_last id="company"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>