<!-- ajax_load_new_event.tpl -->
<br>
<span class="greetUser">Add New Event</span>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing" style="background-color: #ECECEC;">
	<tr>
		<td class="productListing-data">

			<table cellpadding="3" cellspacing="0" border="0">
				<tr>
					<td  class="data"><b>Start</b></td>
					<td  class="data">
                        {html_select_date prefix="startDate" time=$sDate end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}
                        <b>-</b>
                        {html_select_time prefix="startTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$startTime}
                    </td>
					<td  class="data"><b>End</b></td>
					<td  class="data">
                        {html_select_date prefix="endDate" time=$sDate end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}
                        <b>-</b>
                        {html_select_time prefix="endTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$endTime}</td>
				</tr><tr>
					<td  class="data"><b>Title</b></td>
					<td  class="data" colspan="2"><input type="text" name="calendar_title" id="calendar_title" size="60"></td>
				</tr><tr>
					<td  class="data" colspan="4"><b>Description</b></td>
				</tr><tr>
					<td  class="data"  colspan="4"><textarea name="calendar_text" id="calendar_text"></textarea></td>
				</tr><tr>
					<td  class="data"><b>Employee</b></td>
					<td  class="data">{html_select_calendar_employee fieldName=user_id value=$SESSION_USER_ID}</td>
					<td  class="data"></td>
					<td  class="data"></td>

				</tr><tr>
					<td  class="data"><b>Private</b></td>
					<td  class="data">{html_select_yesno fieldName="calendar_private" value=0}</td>
					<td  class="data"></td>
					<td  class="data"></td>
				</tr><tr>
					<td  class="data"><input type="button" name="Submit" id="Submit" value="Save" onclick="save_new_event()"></td>
					<td  class="data"><input type="button" name="cancel" value="Cancel" onclick="cancel_new_event()"></td>
					<td  class="data"></td>
					<td  class="data"></td>	
				</tr>		
			</table>
		</td>
	</tr>
</table>