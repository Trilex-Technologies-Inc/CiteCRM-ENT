<!-- ajax_load_day.tpl -->
<span class="greetUser">View Day</span>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'user_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','user_id','ASC','{$next}');" style="cursor:pointer">Employee</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','user_id','DESC','{$next}')" style="cursor:pointer">Employee</span>
			{/if}			
		</td>
		<td class="productListing-heading">Start Day</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'calendar_hour'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','calendar_hour','ASC','{$next}')" style="cursor:pointer">Start Time</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span  onclick="load_day('{$month}','{$day}','{$year}','calendar_hour','DESC','{$next}')" style="cursor:pointer">Start Time</span>
			{/if}	
		</td>	
		<td class="productListing-heading">End Day</td>
		<td class="productListing-heading">End Time</td>
		<td class="productListing-heading">Duration</td>	
		<td class="productListing-heading">{$translate_field_calendar_title}</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'calendar_avtive'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','calendar_avtive','ASC','{$next}')" style="cursor:pointer">{$translate_field_calendar_avtive}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','calendar_avtive','DESC','{$next}')" style="cursor:pointer">{$translate_field_calendar_avtive}</span>
			{/if}	
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'calendar_private'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','calendar_private','ASC','{$next}')" style="cursor:pointer">{$translate_field_calendar_private}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_day('{$month}','{$day}','{$year}','calendar_private','DESC','{$next}')" style="cursor:pointer">{$translate_field_calendar_private}</span>
			{/if}	
		</td>
	</tr>
	{foreach from=$dayArray item=calendar}
	{load_calendar_end_date id=$calendar->get_calendar_id()}


	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="javascript:load_event('{$calendar->get_calendar_id()}','{$calendar->get_calendar_title()}');">

		<td class="productListing-data" {if $field == 'user_id'} style="background-color: #ECECEC;"{/if}>
            {if $calendar->get_user_id() < 1}
               Unassigned   
            {else}
            
                <a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$calendar->get_user_id()}">{$calendar->get_user_id()|display_names}</a>
            {/if}
        </td>
		<td class="productListing-data">{$calendar->get_calendar_month()}-{$calendar->get_calendar_day()}-{$calendar->get_calendar_year()}</td>
		<td class="productListing-data">{$calendar->get_calendar_hour()}:{$calendar->get_calendar_min()|string_format:"%02d"}</td>
		<td class="productListing-data">{$endMonth}-{$endDay}-{$endYear}</td>
		<td class="productListing-data">{$endHour}:{$endMin|string_format:"%02d"}</td>
		<td class="productListing-data">
			{load_calendar_duration sy=$calendar->get_calendar_year() smo=$calendar->get_calendar_month() sd=$calendar->get_calendar_day() sh=$calendar->get_calendar_hour() sm=$calendar->get_calendar_min() ey=$endYear emo=$endMonth ed=$endDay eh=$endHour em=$endMin  }</td>
		<td class="productListing-data">
			{if $calendar->get_calendar_event_type() == 'workorder'}
				{fetch_workorder_description workorder_id=$calendar->get_calendar_event_id()}						
			{/if}
			{if $calendar->get_calendar_event_type() == 'lead call'}
				{fetch_lead_call lead_call_id=$calendar->get_calendar_event_id()}
			{/if}
			{if $calendar->get_calendar_event_type() == 'lead meeting'}
				{fetch_lead_meeting lead_meeting_id=$calendar->get_calendar_event_id()}
			{/if}
			{if $calendar->get_calendar_event_type() == 'personal'}
				<img src="images/icons/copy_16.gif" onMouseOver="ddrivetip('<b>Subject: </b>{$calendar->get_calendar_title()|escape:'javascript'}<br><b>Details:</b><br>{$calendar->get_calendar_text()}')" onMouseOut="hideddrivetip()" style="cursor:pointer">
				Personal
			{/if}
			{if $calendar->get_calendar_event_type() == 'company meeting'}
				{fetch_company_meeting company_meeting_id=$calendar->get_calendar_event_id()}
			{/if}
		</td>
		<td class="productListing-data" {if $field == 'calendar_avtive'} style="background-color: #ECECEC;"{/if}>{$calendar->get_calendar_avtive()|yesno}</td>
		<td class="productListing-data" {if $field == 'calendar_private'} style="background-color: #ECECEC;"{/if} >{$calendar->get_calendar_private()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_day('{$month}','{$day}','{$year}','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_day('{$month}','{$day}','{$year}','{$field}','{$sort}','{paginate_prev id="calendar"}');">Prev</a> |

							<a href="javascript:load_day('{$month}','{$day}','{$year}','{$field}','{$sort}','{paginate_next id="calendar"}');" >Next</a> |
							<a href="javascript:load_day('{$month}','{$day}','{$year}','{$field}','{$sort}','{paginate_last id="calendar}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>