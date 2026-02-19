<!-- adminViewAllUsers -->
{include file="core/header.tpl"}


<span class="greetUser">Total Users Found {$paginate.total}</span><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">Displaying Page {$paginate.page_current} of {$paginate.page_total}</td>
		<td class="productListing-heading" width="75%" align="right" valign="middle">
			{paginate_first text="<img src='images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>" id="user"}
			{paginate_prev text="<img src='images/icons/back_24.gif' alt='Previous' border='0' align='middle'>" id="user"} 
			{paginate_middle format=select id="user"} 
			{paginate_next text="<img src='images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>" id="user"}
			{paginate_last text="<img src='images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>" id="user"}
		</td>
	</tr>
</table>

<br>

<br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">ID</td>
		<td class="productListing-heading">Type</td>
		<td class="productListing-heading">Status</td>
		<td class="productListing-heading">Username</td>
		<td class="productListing-heading">Name</td>
		<td class="productListing-heading">Email</td>
		<td class="productListing-heading">Created</td>
		<td class="productListing-heading">Activated</td>
		<td class="productListing-heading">Modified</td>
		<td class="productListing-heading"></td>
	</tr>
	
{foreach from=$userArray item=user}

	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}';">
		<td class="productListing-data">{$user->getUserID()}</td>
		<td class="productListing-data">{$user->getUserTypeID()|user_type}</td>
		<td class="productListing-data">{$user->getUserStatus()}</td>
		<td class="productListing-data">{$user->getUserUsername()}</td>
		<td class="productListing-data" nowrap>{$user->getUserFirstName()} {$user->getUserLastName()}</td>
		<td class="productListing-data">{$user->getUserEmail()}</td>
		<td class="productListing-data">{$user->getUserCreateDate()|date_format:"%Y-%m-%d"}</td>
		<td class="productListing-data">
		{if $user->getUserStatus() == "Pending"} 
			Not Active
		{else}
			{$user->getUserActivationDate()|date_format:"%Y-%m-%d"}
		{/if}
			</td>
		<td class="productListing-data">{$user->getLastModified()}</td>
		<td class="productListing-data" nowrap>
		<a href="index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}"><img src="images/icons/docs_16.gif" alt="View Details" border="0" align="middle"></a>&nbsp;
		{if $user->getUserStatus() == "Pending"} 
			<img src="images/icons/apps_16.gif" alt="Activate User" border="0" align="middle">
		{/if}


		</td>
	</tr>

{/foreach}

</table>

<br>




{include file="core/footer.tpl"}