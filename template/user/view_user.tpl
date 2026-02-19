<!-- userView -->
{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Contact</a></li>
</ul>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_user_first_name}</td>
		<td class="fieldValue">{$user->getUserFirstName()}<td>
		<td class="formAreaTitle">{$translate_user_last_name}</td>
		<td class="fieldValue">{$user->getUserLastName()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_user_username}</td>
		<td class="fieldValue" colspan="3">{$user->getUserUsername()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_user_email}</td>
		<td class="fieldValue" colspan="3">{$user->getUserEmail()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_user_create_date}</td>
		<td class="fieldValue" colspan="3">{$user->getUserCreateDate()|date_format:$DATE_FORMAT}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_user_activation_date}</td>
		<td class="fieldValue" colspan="3">{$user->getUserActivationDate()|date_format:$DATE_FORMAT}</td>
	</tr>
</table>

<br>

{foreach from=$user_address_array item=user_address}
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser"><span class="greetUser">{$user_address->getAddressType()} {$translate_address}</span></td>
		<td align="right">
			<a href="{$ROOT_URL}/index.php?page=user_address:new_user_address&user_id={$user_address->getUserID()}"><img src="images/icons/add_16.gif" border="0" alt="Add"></a> 
			<a href="{$ROOT_URL}/index.php?page=user_address:delete_user_address&address_id={$user_address->getAddressID()}&user_id={$user_address->getUserID()}"><img src="images/icons/del_16.gif" border="0" alt="delete"></a>
			<a href="{$ROOT_URL}/index.php?page=user_address:update_user_address&address_type={$user_address->getAddressType()}&address_id={$user_address->getAddressID()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
		</td>
	</tr>
</table>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
	</tr><tr>
		<td colspan="2" class="fieldValue">{$user_address->getAddressStreet()}</td>
	</tr><tr>
		<td colspan="2" class="fieldValue">{$user_address->getAddressStreet2()}</td>
	</tr><tr>
		<td colspan="2" class="fieldValue">{$user_address->getAddressCity()}, {$user_address->getAddressState()|state_name} {$user_address->getAddressPostalCode()}</td>
	</tr><tr>
		<td colspan="2" class="fieldValue">{$user_address->getAddressCountry()|country_name}</td>
	</tr><tr>
		<td class="formAreaTitle">Created</td>
		<td class="fieldValue">{$user_address->getAddressDateCreate()|date_format:$DATE_FORMAT}</td>
	</tr><tr>
		<td class="formAreaTitle">Last Modified</td>
		<td class="fieldValue">{$user_address->getLastModified()|date_format:$DATE_FORMAT}</td>
</table>
{/foreach}

<br>

<span class="greetUser">{$translate_contact_information}</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
{foreach from=$user_contact_array item=user_contact}
	<tr>
		<td class="fieldValue">{$user_contact->getContactType()}</td>
		<td class="fieldValue">{$user_contact->getContactValue()}</td>
		<td align="right">
			<a href="{$ROOT_URL}/index.php?page=user_contact:user_new_contact&user_id={$user_contact->getUserID()}"><img src="images/icons/add_16.gif" border="0" alt="Add"></a>
			<a href="{$ROOT_URL}/index.php?page=user_contact:user_delete_contact&user_contact_id={$user_contact->getContactID()}&user_id={$user_contact->getUserID()}"><img src="images/icons/del_16.gif" border="0" alt="delete"></a>
			<a href="{$ROOT_URL}/index.php?page=user_contact:user_update_contact&user_contact_id={$user_contact->getContactID()}&user_id={$user_contact->getUserID()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit">
		</td>
	</tr>
{/foreach}
</table>

{include file="core/footer.tpl"}