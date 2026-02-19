<!-- ajax_view_support_call.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Account Call</span></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="3" class="formArea" width="600">
		<tr>
			<td class="formAreaTitle">Call Start</td>
			<td class="fieldValue">{$support_callObj->get_support_call_start()|date_format:$DATE_TIME_FORMAT}</td>
			<td class="formAreaTitle">Call End</td>
			<td class="fieldValue">{$support_callObj->get_support_call_stop()|date_format:$DATE_TIME_FORMAT}</td>
		</tr><tr>
			<td class="formAreaTitle">Minutes</td>
			<td class="fieldValue">{$support_callObj->get_support_call_num_min()}</td>
			<td class="formAreaTitle">Billed</td>
			<td class="fieldValue">
				{if $support_callObj->get_support_calls_billing_rate() > 0}
					${$support_callObj->get_billed_amount()|string_format:"%.2f"} @ ${$support_callObj->get_support_calls_billing_rate()|string_format:"%.2f"} per min
				{else}
					N/A
				{/if}
			</td>
		</tr><tr>
			<td class="formAreaTitle">Call Recorded By</td>
			<td class="fieldValue" colspan="3">{$support_callObj->get_support_call_enter_by()|display_names}</td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Call Details</td>
		</tr><tr>
			<td class="fieldValue" colspan="4">{$support_callObj->get_support_call_notes()}</td>
		</tr>
</table>