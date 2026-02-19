<!--ajax_add_meeting.tpl-->
<table>
    <tr>
        <td><span class="greetUser">Add Meeting</span></td>
    </tr>
</table>
<input type="hidden" name="activity" value="{$activity}" id="activity">

<table cellpadding="5" cellspacing="0" class="formArea" width="700">
	<tr>
		<td class="formAreaTitle">Start Date</td>
		<td class="formAreaTitle">End Date</td>
	</tr><tr>
		<td class="fieldValue">{html_select_date prefix=start end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR} {html_select_time display_seconds=false minute_interval=15 prefix=start}</td>
		<td class="fieldValue">{html_select_date prefix=end end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR} {html_select_time display_seconds=false minute_interval=15 prefix=end}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">Subject</td>
	</tr><tr>
		<td class="fieldValue" colspan="2"><input type="text" name="lead_meeting_subject" id="lead_meeting_subject" size="60"></td>
	</tr><tr>
        <td class="formAreaTitle" colspan="2">Description</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea id="lead_meeting_text"></textarea></td>
    </tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno fieldName="lead_meeting_active" value=1}</td>
	</tr><tr>
		<td class="formAreaTitle">Assign</td>
		<td class="fieldValue">{html_select_employee fieldName='user_id' value=$SESSION_USER_ID}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">
            <input type="submit" name="submit" value="Save" id="submit" onclick="add_meeting()">
            <input type="button" id="cancel" value="Cancel" onclick="load_activity('Meeting');">
            <input type="button" name="calendar" value="Calendar" onclick="open_calendar()">
        </td>
	</tr>
</table>
	