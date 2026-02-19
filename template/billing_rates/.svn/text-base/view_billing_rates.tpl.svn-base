<!-- view_billing_rates -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View billing_rates ID# {$billing_rates->get_billing_rates_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=billing_rates:update_billing_rates&billing_rates_id={$billing_rates->get_billing_rates_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=billing_rates:delete_billing_rates&billing_rates_id={$billing_rates->get_billing_rates_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue">{$billing_rates->get_billing_rate_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Amount</td>
		<td class="fieldValue">{$billing_rates->get_billing_rate_amount()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{$billing_rates->get_billing_rate_active()|yesno}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
