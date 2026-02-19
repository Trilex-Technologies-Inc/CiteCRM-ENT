<!-- ajax_load_by_company.tpl -->

<table width="100%">
    <tr>
        <td><span class="greetUser">{$translate_text_meetings}</span></td>
        <td align="right"><a href="javascript:add_meeting()">{$translate_text_new_meeting}</a></td>
    </tr>
</table>
    <table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
    <tr>
        <td class="productListing-heading" width="100">{$translate_field_company_meeting_start}</td>
        <td class="productListing-heading" width="125">{$translate_field_company_meeting_end}</td>
        <td class="productListing-heading">{$translate_field_company_meeting_subject}</td>
        <td class="productListing-heading" width="100">{$translate_field_company_meeting_created_by}</td>
        <td class="productListing-heading" width="25">{$translate_field_company_meeting_active}</td>
    </tr>
    {foreach from=$meeting_array item=meeting}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblclick="javascript:edit_meeting_window('{$meeting->get_company_meeting_id()}')">
        <td class="productListing-data" width="100">{$meeting->get_company_meeting_start()|link_date_time}</td>
        <td class="productListing-data" width="100">{$meeting->get_company_meeting_end()|date_format:$DATE_TIME_FORMAT}</td>
        <td class="productListing-data">{$meeting->get_company_meeting_subject()}</td>
        <td class="productListing-data" width="100" nowrap>
            <a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$meeting->get_company_meeting_created_by()}">{$meeting->get_company_meeting_created_by()|display_names}</a>
        </td>
        <td class="productListing-data" width="25">{$meeting->get_company_meeting_active()|yesno}</td>
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="5">{$translate_text_no_results_found}</td>
    </tr>
    {/foreach}
</table>
<br>    
