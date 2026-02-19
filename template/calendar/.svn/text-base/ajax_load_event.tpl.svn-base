<!-- ajax_load_event.tpl -->
{load_calendar_end_date id=$calendarObj->get_calendar_id()}
<table width="100%">
	<tr>
		<td><span class="greetUser">View Event</span></td>
		<td align="right">
            {if $calendarObj->get_calendar_event_type() == 'personal'}
                <a href="javascript:edit_event('{$calendarObj->get_calendar_id()}');">Edit</a>
            {/if}
            {if $calendarObj->get_calendar_event_type() == 'workorder'}
               <span class="small">Edit schedule from Work Order Module</span>
            {/if}
            {if $calendarObj->get_calendar_event_type() == 'lead call'}
                <span class="small">Edit schedule from Lead Call Module</span>
            {/if}
        </td>	
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing" style="background-color: #ECECEC;">
	<tr>
		<td class="productListing-data">
			<table cellpadding="3" cellspacing="0" border="0">
				<tr>
					<td class="formAreaTitle">Start</td>
					<td class="fieldValue">{$calendarObj->get_calendar_month()}-{$calendarObj->get_calendar_day()}-{$calendarObj->get_calendar_year()} {$calendarObj->get_calendar_hour()}:{$calendarObj->get_calendar_min()|string_format:"%02d"}</td>
					<td class="formAreaTitle">End</td>
					<td class="data">{$endMonth}-{$endDay}-{$endYear} {$endHour}:{$endMin|string_format:"%02d"}</td>
				</tr><tr>
					<td class="formAreaTitle">Employee</td>
					<td class="fieldValue">
                    {if $calendarObj->get_user_id() < 1}
                        {$calendarObj->get_user_id()}
                    {else}
                        <a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$calendarObj->get_user_id()}">{$calendarObj->get_user_id()|display_names}</a></td>
                    {/if}
                    <td class="formAreaTitle">Private</td>
					<td class="fieldValue">{$calendarObj->get_calendar_private()|yesno}</td>
				</tr><tr>
					<td class="formAreaTitle">Title</td>
					<td class="fieldValue" colspan="3">{$calendarObj->get_calendar_title()}</td>
				</tr><tr>
					<td class="formAreaTitle" valign="top">Details </td>
					<td class="fieldValue" colspan="3">{$calendarObj->get_calendar_text()}</td>
				</tr><tr>
					<td class="fieldValue" colspan="4">
						{if $calendarObj->get_calendar_event_type() == 'workorder'}
                            
                              {load_company_by_workorder  workorder_id=$calendarObj->get_calendar_event_id()}
                                {if $workorderObj->fields.company_id > 0}                                

                                    <table cellpadding="3" cellspacing="0">
                                        <tr>    
                                            <td class="formAreaTitle">Account</td>
                                            <td class="fieldValue"><a href="index.php?page=company:view_company&company_id={$workorderObj->fields.company_id}">{$workorderObj->fields.company_name}</a></td>
                                            <td class="formAreaTitle">Contact Name</td>
                                            <td class="fieldValue">
                                                {load_company_contact company_id=$workorderObj->fields.company_id contact_type="Contact Name"}
                                            </td>
                                        </tr>
                                    </table>
                                {/if}
                        
							<a href="{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$calendarObj->get_calendar_event_id()}">view Workorder</a>
						{/if}

						{if $calendarObj->get_calendar_event_type() == 'lead call'}
                           

                             <table cellpadding="3" cellspacing="0">
                                <tr>    
                                    <td class="formAreaTitle">Lead</td>
                                    <td class="fieldValue"></td>
                                </tr>
                            </table>
                                    
                            <a href="{$ROOT_URL}/index.php?page=lead_call:view_lead_call&lead_call_id={$calendarObj->get_calendar_event_id()}">View Lead Call</a>
                        {/if}

                        {if $calendarObj->get_calendar_event_type() == 'lead meeting'}
                                {load_lead_by_lead_meeting lead_meeting_id=$calendarObj->get_calendar_event_id()}

                             <table cellpadding="3" cellspacing="0">
                                <tr>    
                                    <td class="formAreaTitle">Lead</td>
                                    <td class="fieldValue"><A href="index.php?page=leads:view_lead&lead_id={$lead_meetingObj->fields.lead_id}">{$lead_meetingObj->fields.company_name}</a></td>
                                </tr>
                            </table>

                            <a href="">Lead Meeting</a>

                        {/if}

					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>