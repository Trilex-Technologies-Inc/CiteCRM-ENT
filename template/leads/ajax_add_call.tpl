<!-- ajax_add_call.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Record New Call</span></td>
    </tr>
</table>
<input type="hidden" name="activity" value="{$activity}" id="activity">
<table cellpadding="5" cellspacing="0" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{html_select_date end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR} {html_select_time display_seconds=false minute_interval=15 prefix=start}</td>
		<td class="formAreaTitle">Duration</td>
		<td class="fieldValue">{html_select_time display_seconds=false minute_interval=15 time=0 prefix=end} </td>
	
	</tr><tr>
		<td class="formAreaTitle">Add To Calendar</td>
		<td class="fieldValue">{html_select_yesno fieldName='add_to_calendar' value=1}</td>
		<td class="formAreaTitle">Assign</td>
		<td class="fieldValue">{html_select_employee fieldName='user_id' value=$SESSION_USER_ID}</td>
	</tr><tr>
		<td class="formAreaTitle">Call Subject</td>
		<td class="fieldValue" colspan="3"><input type="text" name="lead_call_subject" value="" size="60" id="lead_call_subject"></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="4">Call Details</td>
	</tr><tr>
		<td class="fieldValue" colspan="4"><textarea name="lead_call_text" id="lead_call_text"></textarea></td>
	</tr><tr>
		<td class="fieldValue" colspan="4">
            <input type="submit" name="submit" value="Save" onclick="add_call()" id="submit">
            <input type="button" name="cancel" value="Cancel" onclick="javascript:load_activity('Call');">
            <input type="button" name="calendar" value="Calendar" onclick="open_calendar()">
        </td>
	</tr>
</table>
<br>
