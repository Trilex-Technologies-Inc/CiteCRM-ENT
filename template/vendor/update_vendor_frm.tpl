<!-- update_vendor_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Vendor ID# {$vendor->get_vendor_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=vendor:update_vendor" id="add_vendor_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="vendor_name" value="{$vendor->get_vendor_name()}" id="vendor_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Website</td>
		<td class="fieldValue"><input type="text" name="vendor_website" value="{$vendor->get_vendor_website()}" id="vendor_website">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Date Created</td>
		<td class="fieldValue"><input type="text" name="vendor_create_date" value="{$vendor->get_vendor_create_date()}" id="vendor_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue"><input type="text" name="vendor_active" value="{$vendor->get_vendor_active()}" id="vendor_active">
</td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="hidden" name="vendor_id" value="{$vendor_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
