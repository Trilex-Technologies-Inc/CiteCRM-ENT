<!-- ajax_edit_event.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Edit Event</span></td>
        <td align="right"><a href="javascript:load_event('{$calendarObj->get_calendar_id()}','{$calendarObj->get_calendar_title()}');">Cancel</a></td>
    </tr>
</table>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing" style="background-color: #ECECEC;">
	<tr>
		<td class="productListing-data">
			<table cellpadding="3" cellspacing="0" border="0">
				<tr>
					<td class="data"><b>Start</b></td>
                    <td class="data">{html_select_date prefix="startDate" time=$startTime} <b>-</b> {html_select_time prefix="startTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$startTime}</td>
                    <td class="data"><b>End</b></td>
                    <td class="data">{html_select_date prefix="endDate" time=$endTime} <b>-</b> {html_select_time prefix="endTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$endTime}</td>
				</tr><tr>
					<td class="data"><b>Employee</b></td>
					<td class="data">{html_select_calendar_employee fieldName=user_id value=$calendarObj->get_user_id()}</td>
					<td class="data"><b>Private</b></td>
					<td class="data">{html_select_yesno fieldName="calendar_private" value=$calendarObj->get_calendar_private()}</td>
				</tr><tr>
					<td class="data"><b>Title</b></td>
					<td class="data" colspan="3"><input type="text" name="calendar_title" id="calendar_title" size="60" value="{$calendarObj->get_calendar_title()}"></td>
				</tr><tr>
					<td class="data" colspan="4"><b>Details</b></td>
				</tr><tr>
					<td class="data" colspan="4"><textarea name="calendar_text" id="calendar_text">{$calendarObj->get_calendar_text()}</textarea></td>
				</tr><tr>
                    <td class="data">Delete</td>
                    <td class="data"><input type="checkbox" id="delete"></td>
                    <td></td>
                    <td></td>
                </tr><tr>
					<td class="data" colspan="4">
                        <input type="hidden" name="calendar_id" id="calendar_id" value="{$calendarObj->get_calendar_id()}">
                        <input type="button" name="save" id="save" value="Save" onclick="update_event()">
						
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>