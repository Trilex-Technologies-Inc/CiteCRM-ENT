<!-- view_vendor -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_view_vendor} {$vendor->get_vendor_name()}</span></td>
		<td align="right">
			<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
			<a href="index.php?page=vendor:update_vendor&vendor_id={$vendor->get_vendor_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
			<a href="index.php?page=vendor:delete_vendor&vendor_id={$vendor->get_vendor_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
		</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_name}</td>
		<td class="fieldValue">{$vendor->get_vendor_name()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_website}</td>
		<td class="fieldValue"><a href="{$vendor->get_vendor_website()}" target="_blank">{$vendor->get_vendor_website()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_create_date}</td>
		<td class="fieldValue">{$vendor->get_vendor_create_date()|date_format:"%Y-%m-%d"}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_active}</td>
		<td class="fieldValue">{$vendor->get_vendor_active()|yesno}</td>
	</tr>
</table>


{foreach from=$vendor_address_array item="vendor_address"}
<br><br>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_field_vendor_address_type}: {$vendor_address->get_vendor_address_type()}</span></td>
		<td align="right">
			<a href="index.php?page=vendor_address:add_vendor_address&vendor_id={$vendor->get_vendor_id()}"><img src="images/icons/add_16.gif" alt="{$translate_text_add}" border="0"></a>
			<a href="index.php?page=vendor_address:update_vendor_address&vendor_address_id={$vendor_address->get_vendor_address_id()}"><img src="images/icons/edit_16.gif" border="0" alt="{$translate_text_edit}"></a>
			<a href="index.php?page=vendor_address:delete_vendor_address&vendor_address_id={$vendor_address->get_vendor_address_id()}"><img src="images/icons/del_16.gif" border="0" alt="{$translate_text_delete}"></a>
		</td>
	</tr>
</table>
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_street_1}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_street_1()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_street_2}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_street_2()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_city}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_city()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_state_id}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_state_id()|state_name}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_postal_code}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_postal_code()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_country_id}</td>
		<td class="fieldValue">{$vendor_address->get_vendor_country_id()|country_name}</td>
	</tr>
</table>
{/foreach}


{foreach from=$vendor_contact_array item="vendor_contact"}

<br><br>
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_field_vendor_contact_type}: {$vendor_contact->get_vendor_contact_type()}</span></td>
		<td align="right">
			<a href="index.php?page=vendor_contact:add_vendor_contact&vendor_id={$vendor->get_vendor_id()}"><img src="images/icons/add_16.gif" alt="{$translate_text_add}" border="0"></a>
			<a href="index.php?page=vendor_contact:update_vendor_contact&vendor_contact_id={$vendor_contact->get_vendor_contact_id()}"><img src="images/icons/edit_16.gif" border="0" alt="{$translate_text_edit}"></a>
			<a href="index.php?page=vendor_contact:delete_vendor_contact&vendor_contact_id={$vendor_contact->get_vendor_contact_id()}"><img src="images/icons/del_16.gif" border="0" alt="{$translate_text_delete}"></a>
		</td>
	</tr>
</table>
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_contact_value}</td>
		<td class="fieldValue">{$vendor_contact->get_vendor_contact_value()}</td>
	</tr>
</table>
{/foreach}

{include file="core/footer.tpl"}
