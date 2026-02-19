<!-- view_company_contact -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View company_contact ID# {$company_contact->get_company_contact_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=company_contact:update_company_contact&company_contact_id={$company_contact->get_company_contact_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=company_contact:delete_company_contact&company_contact_id={$company_contact->get_company_contact_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Company ID</td>
		<td class="fieldValue">{$company_contact->get_company_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Contact Type</td>
		<td class="fieldValue">{$company_contact->get_company_contact_type()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Value</td>
		<td class="fieldValue">{$company_contact->get_company_contact_value()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
