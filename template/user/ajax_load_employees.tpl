<!-- ajax_search_user.tpl-->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_id','ASC','{$next}')" style="cursor:pointer">ID</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_id','DESC','{$next}')" style="cursor:pointer">ID</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_type_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_type_id','ASC','{$next}')" style="cursor:pointer">Type</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_type_id','DESC','{$next}')" style="cursor:pointer">Type</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_status'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_status','ASC','{$next}')" style="cursor:pointer">Status</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_status','DESC','{$next}')" style="cursor:pointer">Status</span>
			{/if}
		</td>
		
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_last_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_last_name','ASC','{$next}')" style="cursor:pointer">Name</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_last_name','DESC','{$next}')" style="cursor:pointer">Name</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_email'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_email','ASC','{$next}')" style="cursor:pointer">Email</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_email','DESC','{$next}')" style="cursor:pointer">Email</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_create_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('user_create_date','ASC','{$next}')" style="cursor:pointer">Created</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('user_create_date','DESC','{$next}')" style="cursor:pointer">Created</span>
			{/if}		
		</td>
		<td class="productListing-heading">
		
			{if $sort == 'DESC' && $field == 'last_modified'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('last_modified','ASC','{$next}')" style="cursor:pointer">Modified</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('last_modified','DESC','{$next}')" style="cursor:pointer">Modified</span>
			{/if}			
		</td>
		
	</tr>
	
{foreach from=$userArray item=user}

	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=user:view_employee&user_id={$user->getUserID()}';">
		<td class="productListing-data" {if $field == 'user_id'} style="background-color: #ECECEC;"{/if}>{$user->getUserID()}</td>
		<td class="productListing-data" {if $field == 'user_type_id'} style="background-color: #ECECEC;"{/if}>{$user->getUserTypeID()|user_type}</td>
		<td class="productListing-data" {if $field == 'user_status'} style="background-color: #ECECEC;"{/if}>{$user->getUserStatus()}</td>
		<td class="productListing-data" {if $field == 'user_last_name'} style="background-color: #ECECEC;"{/if} nowrap>{$user->getUserFirstName()} {$user->getUserLastName()}</td>
		<td class="productListing-data" {if $field == 'user_email'} style="background-color: #ECECEC;"{/if}>{$user->getUserEmail()}</td>
		<td class="productListing-data" {if $field == 'user_create_date'} style="background-color: #ECECEC;"{/if}>{$user->getUserCreateDate()|date_format:$DATE_FORMAT}</td>
		
		<td class="productListing-data" {if $field == 'last_modified'} style="background-color: #ECECEC;"{/if}>{$user->getLastModified()|date_format:$DATE_FORMAT}</td>
		
	</tr>
{/foreach}
	<tr>
		<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_window('{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_prev id="users"}');">Prev</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_next id="users"}');">Next</a> |
						<a href="javascript:load_window('{$field}','{$sort}','{paginate_last id="users"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
