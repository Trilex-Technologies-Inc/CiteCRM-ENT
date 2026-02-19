<!-- ajax_set_schedual.tpl -->
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">From:</td>
		<td>{html_select_date prefix="startDate"} <b>-</b> {html_select_time prefix="startTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$startTime}</td>
	</tr><tr>
		<td class="formAreaTitle">To:</td>
		<td>{html_select_date prefix="endDate"} <b>-</b> {html_select_time prefix="endTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$endTime}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2"></td>
	</tr><tr>
		<td class="formAreaTitle">Include Saturday</td>
		<td class="formAreaTitle">{html_select_yesno fieldName="inc_sat" value="0"}</td>
	</tr><tr>
		<td class="formAreaTitle">After Hours</td>
		<td class="formAreaTitle">{html_select_yesno fieldName="after_hours" value="0"}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">
			<input type="button" name="submit" value="Save" id="submit" onclick="submit_schedual()">
			<input type="button" name="" value="Calendar" onclick="open_calendar()">
		</td>
	<tr>
</table>