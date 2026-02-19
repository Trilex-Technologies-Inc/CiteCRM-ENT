<!-- ajax_start_support_call.tpl -->
<!--
<div id="callTimer">
You Have A Running Call Timer. <a href="javascript:stop_call_timer('{$support_call_id}')">Stop Time</a><br><br>
</div>-->
<table>
	<tr>
		<td><span class="greetUser">Account Calls</span></td>
	</tr>
</table>

{if $companyObj->get_company_type() == 'Contract'}
	<table cellpadding="0" cellspacing="3" class="formArea" width="600">
		<tr>
			<td class="formAreaTitle">Minutes Per Month</td>
			<td class="fieldValue">{$contractObj->get_contract_to_company_call_min()}</td>
			<td class="formAreaTitle">Minutes Used This Month</td>
			<td class="fieldValue">{$min_used}</td>
		</tr><tr>
			<td class="formAreaTitle">Minutes Available</td>
			<td class="fieldValue">{$min_left}</td>
			<td class="fieldValue"><b>Contract Rate</b> ${$contractObj->get_contract_to_company_call_covered_rate()} per min</td>
			<td class="fieldValue"><b>Non Contract Rate</b> ${$contractObj->get_contract_to_company_call_non_covered_rate()} per min</td>
		</tr>
	</table>
	{if $min_left < 1 }
		<br>
		<table cellpadding="0" cellspacing="3"  width="600">
			<tr>
				<td><span class="error">This customer is over their Contract Support minutes for this month. They will be billed at the Non-Contract rate of ${$contractObj->get_contract_to_company_call_non_covered_rate()} per min</span></td>
			</tr>
		</table>
		{/if}
	
{else}
	<table cellpadding="0" cellspacing="3" class="formArea" width="600">
		<tr>
			<td class="formAreaTitle">Non Contract Account</td>
		</tr>
	</table>
{/if}
<br>
<table>
	<tr>
		<td><span class="greetUser">Call Details</span></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="3" class="formArea">
		<tr>
			<td class="formAreaTitle" nowrap>Call Start</td>
			<td class="fieldValue" nowrap>{html_select_date prefix=start month_format=%m} {html_select_time display_seconds=false prefix=start}</td>
			<td class="formAreaTitle" nowrap>Call End</td>
			<td class="fieldValue" nowrap><div id="call_end">{html_select_date prefix=end month_format=%m} {html_select_time display_seconds=false prefix=end} <input type="button" onclick="update_call_time()" value="+"></div></td>
		</tr><tr>
			<td class="formAreaTitle">Billable</td>
			<td class="fieldValue">{html_select_yesno fieldName="isBillable" value=1}</td>
			<td class="fieldValue"></td>
			<td class="fieldValue"></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Call Details</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="100" rows="10" id="support_call_notes"></textarea></td>
		</tr><tr>
			<td class="fieldValue" colspan="4">
				<input type="button" id="save" value="Save" onclick="save_call()">
				<input type="button" name="calendar" value="Calendar" onclick="open_calendar()">
		</tr>
</table>