<!-- view_vendor_contact -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_view_vendor_contact} {$vendor_contact->get_vendor_contact_id()}</span></td>
		<td align="right">
			<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
			<a href="index.php?page=vendor_contact:update_vendor_contact&vendor_contact_id={$vendor_contact->get_vendor_contact_id()}"><img src="images/icons/edit_16.gif" border="0" alt="{$translate_text_edit}"></a>
			<a href="index.php?page=vendor_contact:delete_vendor_contact&vendor_contact_id={$vendor_contact->get_vendor_contact_id()}"><img src="images/icons/del_16.gif" border="0" alt="{$translate_text_delete}"></a>
		</td>
	</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_id}</td>
		<td class="fieldValue">{$vendor_contact->get_vendor_id()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_contact_type}</td>
		<td class="fieldValue">{$vendor_contact->get_vendor_contact_type()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_contact_value}</td>
		<td class="fieldValue">{$vendor_contact->get_vendor_contact_value()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
