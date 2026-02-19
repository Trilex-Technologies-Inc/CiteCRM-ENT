<!-- update_vendor_contact_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Vendor Contact ID# {$vendor_contact->get_vendor_contact_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=vendor_contact:update_vendor_contact" id="add_vendor_contact_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Vendor</td>
		<td class="fieldValue"><input type="text" name="vendor_id" value="{$vendor_contact->get_vendor_id()}" id="vendor_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Contact Type</td>
		<td class="fieldValue"><input type="text" name="vendor_contact_type" value="{$vendor_contact->get_vendor_contact_type()}" id="vendor_contact_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Value</td>
		<td class="fieldValue"><input type="text" name="vendor_contact_value" value="{$vendor_contact->get_vendor_contact_value()}" id="vendor_contact_value">
</td>
	</tr>
	<tr>
		<td colspan="4">
		<input type="hidden" name="vendor_contact_id" value="{$vendor_contact_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
