<!-- ajax_edit_meeting.tpl -->
<table>
    <tr>
        <td><span class="greetUser">Edit Meeting "<i>{$lead_meetingObj->get_lead_meeting_subject()}</i>"</span></td>
    </tr>
</table>
<input type="hidden" name="lead_meeting_id" value="{$lead_meetingObj->get_lead_meeting_id()}" id="lead_meeting_id">

<table cellpadding="5" cellspacing="0" class="formArea" width="700">
	<tr>
		<td class="formAreaTitle">Start Date</td>
		<td class="formAreaTitle">End Date</td>
	</tr><tr>
		<td class="fieldValue">
            {html_select_date prefix=start time=$lead_meetingObj->get_lead_meeting_start() end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}
            {html_select_time display_seconds=false minute_interval=15 prefix=start time=$lead_meetingObj->get_lead_meeting_start()}
        </td>
		<td class="fieldValue">
        {html_select_date prefix=end end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR time=$lead_meetingObj->get_lead_meeting_end()}
        {html_select_time display_seconds=false minute_interval=15 prefix=end time=$lead_meetingObj->get_lead_meeting_end()}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">Subject</td>
	</tr><tr>
		<td class="fieldValue" colspan="2"><input type="text" name="lead_meeting_subject" id="lead_meeting_subject" size="60" value="{$lead_meetingObj->get_lead_meeting_subject()}"></td>
	</tr><tr>
        <td class="formAreaTitle" colspan="2">Description</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea id="lead_meeting_text">{$lead_meetingObj->get_lead_meeting_text()}</textarea></td>
    </tr><tr>
		<td class="formAreaTitle">Assign</td>
		<td class="fieldValue">{html_select_employee fieldName='user_id' value=$calendarObj->get_user_id()}</td>
	</tr><tr>
		<td class="formAreaTitle">Delete <input type="checkbox" id="delete"></td>
		<td class="fieldValue"></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">
            <input type="submit" name="submit" value="Save" id="submit" onclick="update_meeting()">
            <input type="button" id="cancel" value="Cancel" onclick="load_activity('Meeting');">
        </td>
	</tr>
</table>