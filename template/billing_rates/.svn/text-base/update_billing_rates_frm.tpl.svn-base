<!-- update_billing_rates_frm -->
<br>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Billing Rate {$billing_rates->get_billing_rate_text()}</span></td>
	</tr>
</table>

<br><br>

<form>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Type</td>
		<td class="fieldValue"><input type="text" name="billing_rate_text" value="{$billing_rates->get_billing_rate_text()}" id="billing_rate_text"></td>
	</tr><tr>
		<td class="formAreaTitle">Amount</td>
		<td class="fieldValue">$<input type="text" name="billing_rate_amount" value="{$billing_rates->get_billing_rate_amount()|string_format:"%.2f"}" id="billing_rate_amount"></td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno fieldName="billing_rate_active" value=$billing_rates->get_billing_rate_active()}</td>
	</tr><tr>
		<td colspan="4">
			<input type="hidden" name="billing_rates_id" id="billing_rates_id" value="{$billing_rates->get_billing_rates_id()}">
			<input type="button" name="submit" value="Save" onclick="save_billing_rate()">
			<input type="button" name="delete" value="Delete" onclick="delete_billing_rate('{$billing_rates->get_billing_rates_id()	}')">
			<input type="button" name="cancel" value="Cancel" onclick="cancel_edit()">			
		</td>
	</tr>
</table>

</form>

