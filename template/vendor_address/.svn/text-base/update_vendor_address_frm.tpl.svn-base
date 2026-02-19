<!-- update_vendor_address_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Vendor Address ID# {$vendor_address->get_vendor_address_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=vendor_address:update_vendor_address" id="add_vendor_address_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Vendor</td>
		<td class="fieldValue"><input type="text" name="vendor_id" value="{$vendor_address->get_vendor_id()}" id="vendor_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Address Type</td>
		<td class="fieldValue"><input type="text" name="vendor_address_type" value="{$vendor_address->get_vendor_address_type()}" id="vendor_address_type">
			{validate id="vendor_address_type" message="<br><span class='error'>Form Error: The field vendor_address_type Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Street </td>
		<td class="fieldValue"><input type="text" name="vendor_street_1" value="{$vendor_address->get_vendor_street_1()}" id="vendor_street_1">
			{validate id="vendor_street_1" message="<br><span class='error'>Form Error: The field vendor_street_1 Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Street Cont</td>
		<td class="fieldValue"><input type="text" name="vendor_street_2" value="{$vendor_address->get_vendor_street_2()}" id="vendor_street_2">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue"><input type="text" name="vendor_city" value="{$vendor_address->get_vendor_city()}" id="vendor_city">
			{validate id="vendor_city" message="<br><span class='error'>Form Error: The field vendor_city Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><input type="text" name="vendor_state_id" value="{$vendor_address->get_vendor_state_id()}" id="vendor_state_id">
			{validate id="vendor_state_id" message="<br><span class='error'>Form Error: The field vendor_state_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue"><input type="text" name="vendor_postal_code" value="{$vendor_address->get_vendor_postal_code()}" id="vendor_postal_code">
			{validate id="vendor_postal_code" message="<br><span class='error'>Form Error: The field vendor_postal_code Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue"><input type="text" name="vendor_country_id" value="{$vendor_address->get_vendor_country_id()}" id="vendor_country_id">
			{validate id="vendor_country_id" message="<br><span class='error'>Form Error: The field vendor_country_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="9">
		<input type="hidden" name="vendor_address_id" value="{$vendor_address_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
