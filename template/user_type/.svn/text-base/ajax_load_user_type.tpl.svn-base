<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">User Type</td>
	</tr>
	{foreach from=$user_typeArray item=user_type}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_user_type('{$user_type->get_user_type_id()}')">
		<td class="productListing-data">{$user_type->get_user_type_text()}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="2">No Results Found</td>
	</tr>
	{/foreach}
</table>