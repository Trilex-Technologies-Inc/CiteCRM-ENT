<!-- ajax_load_meetings.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Meetings</span></td>
        <td align="right"><a href="javascript:add_activity('Meeting');">New Meeting</a></td>
    </tr>
</table>
	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="100">{$translate_field_lead_meeting_start}</td>
		<td class="productListing-heading" width="125">{$translate_field_lead_meeting_end}</td>
		<td class="productListing-heading">{$translate_field_lead_meeting_subject}</td>
		<td class="productListing-heading" width="100">{$translate_field_lead_meeting_created_by}</td>
		<td class="productListing-heading" width="25">{$translate_field_lead_meeting_active}</td>
	</tr>
	{foreach from=$lead_meetingArray item=lead_meeting}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblclick="javascript:load_edit_meeting_window('{$lead_meeting->get_lead_meeting_id()}')">
		<td class="productListing-data" width="100">{$lead_meeting->get_lead_meeting_start()|link_date_time}</td>
		<td class="productListing-data" width="100">{$lead_meeting->get_lead_meeting_end()|date_format:$DATE_TIME_FORMAT}</td>
		<td class="productListing-data">
            <img src="{$ROOT_URL}/images/icons/copy_16.gif" align="middle" border="0" onMouseOver="ddrivetip('{$lead_meeting->get_lead_meeting_text()|escape:'javascript'}')" onMouseOut="hideddrivetip()" style="cursor:pointer">
            {$lead_meeting->get_lead_meeting_subject()}</td>
		<td class="productListing-data" width="100" nowrap>
            <a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$lead_meeting->get_lead_meeting_created_by()}">{$lead_meeting->get_lead_meeting_created_by()|display_names}</a>
        </td>
		<td class="productListing-data" width="25">{$lead_meeting->get_lead_meeting_active()|yesno}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
<br>	
