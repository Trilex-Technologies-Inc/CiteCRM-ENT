<!--ajax_edit_meeting.tpl-->
<table>
    <tr>
        <td><span class="greetUser">{$translate_text_edit_meeting}</span></td>
    </tr>
</table>
<table cellpadding="5" cellspacing="0" class="formArea" width="700">
	<tr>
		<td class="formAreaTitle">{$translate_field_company_meeting_start}</td>
		<td class="formAreaTitle">{$translate_field_company_meeting_end}</td>
	</tr><tr>
		<td class="fieldValue">{html_select_date prefix=start end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR time=$meetingObj->get_company_meeting_start()} {html_select_time display_seconds=false minute_interval=15 prefix=start time=$meetingObj->get_company_meeting_start()}</td>
		<td class="fieldValue">{html_select_date prefix=end end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR time=$meetingObj->get_company_meeting_end()} {html_select_time display_seconds=false minute_interval=15 prefix=end time=$meetingObj->get_company_meeting_end()}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">{$translate_field_company_meeting_subject}</td>
	</tr><tr>
		<td class="fieldValue" colspan="2"><input type="text" name="company_meeting_subject" id="company_meeting_subject" size="60" value="{$meetingObj->get_company_meeting_subject()}"></td>
	</tr><tr>
        <td class="formAreaTitle" colspan="2">{$translate_field_company_meeting_text}</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea id="company_meeting_text" cols="600" rows="20">{$company_meeting_text}</textarea></td>
    </tr><tr>
		<td class="formAreaTitle">{$translate_field_company_meeting_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName="company_meeting_active" value=$meetingObj->get_company_meeting_active()}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">
			<input type="hidden" name="company_meeting_id" id="company_meeting_id" value="{$meetingObj->get_company_meeting_id()}">
            <input type="submit" name="submit" value="{$translate_button_save}" id="submit" onclick="update_meeting()">
            <input type="button" id="cancel" value="{$translate_button_cancel}" onclick="javascript:load_company_meeting('Meeting','','ASC','')">
        	<input type="button" name="calendar" value="Calendar" onclick="open_calendar()">
		</td>
	</tr>
</table>
