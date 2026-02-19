<!-- ajax_load_contract.tpl -->

{if $contractObj->get_contract_to_company_id() > 0}
<span class="greetUser">Contract Information</span><br>
<table>
    <tr>
        <td>
            <table class="small" cellpadding="3" ce>
                <tr>
                    <td class="formAreaTitle">Contract Name</td>
                    <td class="fieldValue">{$contractObj->fields.contract_type_name}</td>
                    <td class="formAreaTitle">Active Date</td>
                    <td>{$contractObj->get_contract_to_company_start_date()|date_format:$DATE_FORMAT}</td>
                </tr><tr>	
                    <td class="formAreaTitle">Phone Support</td>
                    <td class="fieldValue">{$contractObj->get_contract_to_company_call_min()} (Mins per Month)</td>
                    <td class="formAreaTitle">Contract Labor</td>
                    <td class="fieldValue">{$contractObj->get_contract_to_company_covered_labor()} (Hours per Month)<td>
                </tr><tr>
                    <td class="formAreaTitle">Phone Support Used</td>
                    <td class="fieldValue">{$min_used|string_format:"%.2f"} (Mins)</td>
                    <td class="formAreaTitle">Labor Used</td>
                    <td class="fieldValue">{$labor_used|string_format:"%.2f"} (Hours)</td>
                </tr><tr>
                    <td class="formAreaTitle">Next Bill Date</td>
                    <td class="fieldValue">{$autobillObj->get_autobill_due_date()|date_format:$DATE_FORMAT}</td>
                    <td class="formAreaTitle">Amount</td>
                    <td class="fieldValue">${$contractObj->get_contract_to_company_amount()|string_format:"%.2f"}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

{else}
	<span class="greetUser">Select Contract</span><br>
	{html_select_contract_type} <input type="button" name="select" value="Select" onclick="javascript:select_contract()">



{/if}
