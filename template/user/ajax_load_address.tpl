<!-- ajax_load_address.tpl -->
<span class="greetUser">Address</span>
{foreach from=$user_address_array item=user_addressObj}	

<table cellpadding="0" cellspacing="0" class="dataTable" width="100%" style="background-color: #F0F8FF">
	<tr>
		<td class="productListing-data">
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="small"><b>Address Type</b></td>
					<td class="small">{$user_addressObj->getAddressType()}</td>
				</tr><tr>
					<td class="small" colspan="2">{$user_addressObj->getAddressStreet()}</td>
				</tr><tr>
					<td class="small" colspan="2">{$user_addressObj->getAddressStreet2()}</td>
				</tr><tr>
					<td class="small" colspan="2">{$user_addressObj->getAddressCity()}, {$user_addressObj->getAddressState()} {$user_addressObj->getAddressPostalCode()}</td>
				</tr><tr>
					<td class="small"><b>Created</b></td>
					<td class="small">{$user_addressObj->getAddressDateCreate()|date_format:$DATE_FORMAT}</td>
				</tr><tr>
					<td class="small"><b>Last Modified</b></td>
					<td class="small">{$user_addressObj->getLastModified()|date_format:$DATE_FORMAT}</td>
				</tr><tr>
					<td class="small"><a href="javascript:edit_address('{$user_addressObj->getAddressID()}')">Edit</a></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
{foreachelse}
<a href="javascript:edit_address('')">Edit</a>
{/foreach}


