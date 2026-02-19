<!-- view_company_address -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View company_address ID# {$company_address->get_company_address_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=company_address:update_company_address&company_address_id={$company_address->get_company_address_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=company_address:delete_company_address&company_address_id={$company_address->get_company_address_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Company ID</td>
		<td class="fieldValue">{$company_address->get_company_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Street</td>
		<td class="fieldValue">{$company_address->get_company_street_1()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Street 2</td>
		<td class="fieldValue">{$company_address->get_company_street_2()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue">{$company_address->get_company_city()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue">{$company_address->get_company_state()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue">{$company_address->get_company_postal_code()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue">{$company_address->get_company_country()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
