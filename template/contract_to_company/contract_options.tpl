<!-- contract_options.tpl -->
<span class="greetUser">{$contract_typeObj->get_contract_type_name()}</span><br>
<input type="hidden" name="contract_type_id" id="contract_type_id" value="{$contract_typeObj->get_contract_type_id()}">

<table class="small" cellpadding="5" cellspacing="0" >
	<tr>
		<td><b>Contract Start Date</b></td>
		<td><input type="text" name="contract_to_company_start_date" id="contract_to_company_start_date" size="10" value="{$startDate|date_format:$DATE_FORMAT}"></td>
		<td><b>Amount</b></td>
		<td>$ <input type="text" name="contract_to_company_amount" id="contract_to_company_amount" value="{$contract_typeObj->get_contract_type_rate()}" size="10"> (Per Month)</td>
	</tr><tr>
		<td><b>Contract Length</b></td>
		<td><input type="text" name="contract_to_company_term" id="contract_to_company_term" value="{$contract_typeObj->get_contract_type_term()}" size="4"> (Months)</td>
		<td><b>Billing Cycle</b></td>
		<td>&nbsp;&nbsp; <select name="contract_to_company_increament" id="contract_to_company_increament">
				<option value="1">Monthly</option>
				<option value="3">Quarterly</option>
				<option value="6">Bi-Yearly</option>
				<option value="12">Yearly</option>
			</select></td>
	</tr></tr>
		<td><b>Labor Covered</b></td>
		<td><input type="text" name="contract_to_company_covered_labor" id="contract_to_company_covered_labor" value="{$contract_typeObj->get_contract_type_covered_labor()}" size="4"> (Hours)
		</td>
		<td>Covered Rate</td>
		<td>$ <input type="text" name="contract_to_company_covered_labor_rate" id="contract_to_company_covered_labor_rate" value="{$contract_typeObj->get_contract_type_covered_labor_rate()}" size="8"></td>		
	</tr><tr>
        <td colspan="2"><b>Non Covered Labor Rate</b></td>
        <td></td>
        <td>$ <input type="text" name="contract_to_company_non_covered_labor_rate" id="contract_to_company_non_covered_labor_rate" value="{$contract_typeObj->get_contract_type_non_covered_labor_rate()}" size="8"></td>
    </tr><tr>
        <td><b>Support Call</b></td>
        <td><input type="text" name="contract_to_company_call_min" id="contract_to_company_call_min" value="{$contract_typeObj->get_contract_type_call_min()}" size="6"> (Mins)</td>
        <td><b>Covered Rate</b></td>
        <td>$ <input type="text" name="contract_to_company_call_covered_rate" id="contract_to_company_call_covered_rate" value="{$contract_typeObj->get_contract_type_call_covered_rate()}" size="6"> (Per Min)</td>
    </tr><tr>
        <td colspan="2">Non Covered Support Rate</td>
        <td></td>
        <td>$ <input type="text" name="contract_to_company_call_non_covered_rate" id="contract_to_company_call_non_covered_rate" value="{$contract_typeObj->get_contract_type_call_non_covered_rate()}" size="6"> (Per Min)</td>
    </tr>
</table>
<input type="button" name="submit" id="submit" value="Save" onclick="save_new_contract()"> 
<input type="button" name="cancel" value="cancel" onclick="load_company_contract()">
<br>