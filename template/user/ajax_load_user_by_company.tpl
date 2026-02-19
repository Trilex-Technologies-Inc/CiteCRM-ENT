<!-- -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Company Users</span></td>
		<td align="right"><a href="javascript:add_user()">Add Contact</a></td>	
	</tr>
</table>
	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
            <td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_last_name'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_last_name','ASC','{$next}')" style="cursor:pointer">Name</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_last_name','DESC','{$next}')" style="cursor:pointer">Name</span>
				{/if}				
			</td>
            <td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_email'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_email','ASC','{$next}')" style="cursor:pointer">Email</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_email','DESC','{$next}')" style="cursor:pointer">Email</span>
				{/if}	
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_type_id'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_type_id','ASC','{$next}')" style="cursor:pointer">Type</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_type_id','DESC','{$next}')" style="cursor:pointer">Type</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_status'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_status','ASC','{$next}')" style="cursor:pointer">Status</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_status','DESC','{$next}')" style="cursor:pointer">Status</span>
				{/if}				
			</td>

			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_create_date'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_create_date','ASC','{$next}')" style="cursor:pointer">Created</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_create_date','DESC','{$next}')" style="cursor:pointer">Created</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'user_activation_date'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','user_activation_date','ASC','{$next}')" style="cursor:pointer">Activated</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','user_activation_date','DESC','{$next}')" style="cursor:pointer">Activated</span>
				{/if}
				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'last_modified'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_users('Contacts','last_modified','ASC','{$next}')" style="cursor:pointer">Updated</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_users('Contacts','last_modified','DESC','{$next}')" style="cursor:pointer">Updated</span>
				{/if}			
			</td>
			<td class="productListing-heading"></td>
		</tr>
		
	{foreach from=$user_array item=user}
	
		<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}';">
            <td class="productListing-data" {if $field == 'user_last_name'} style="background-color: #ECECEC;"{/if} nowrap>{$user->getUserFirstName()} {$user->getUserLastName()}</td>
            <td class="productListing-data" {if $field == 'user_email'} style="background-color: #ECECEC;"{/if}>{$user->getUserEmail()}</td>
			<td class="productListing-data" {if $field == 'user_type_id'} style="background-color: #ECECEC;"{/if}>{$user->getUserTypeID()|user_type}</td>
			<td class="productListing-data" {if $field == 'user_status'} style="background-color: #ECECEC;"{/if}>{$user->getUserStatus()}</td>			
			<td class="productListing-data" {if $field == 'user_create_date'} style="background-color: #ECECEC;"{/if}>{$user->getUserCreateDate()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" {if $field == 'user_activation_date'} style="background-color: #ECECEC;"{/if}>{$user->getUserActivationDate()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" {if $field == 'last_modified'} style="background-color: #ECECEC;"{/if}>{$user->getLastModified()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" nowrap>
				
				<a href="{$ROOT_URL}/index.php?page=user_to_company:delete_user_to_company&user_id={$user->getUserID()}&company_id={$company_id}"><img src="{$ROOT_URL}/images/icons/del_16.gif" alt="Remove User" border="0" align="middle"></a>&nbsp;
				{if $user->getUserStatus() == "Pending"} 
					<img src="{$ROOT_URL}/images/icons/apps_16.gif" alt="Activate User" border="0" align="middle">
				{/if}
			</td>
		</tr>
	{/foreach}
		<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_company_users('Contacts','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_company_users('Contacts','{$field}','{$sort}','{paginate_prev id="users"}');">Prev</a> |

							<a href="javascript:load_company_users('Contacts','{$field}','{$sort}','{paginate_next id="users"}');" >Next</a> |
							<a href="javascript:load_company_users('Contacts','{$field}','{$sort}','{paginate_last id="users}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
