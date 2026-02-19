<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
    <tr>
        <td class="productListing-heading" width="80%">{$translate_field_lead_status_text}</td>
        <td class="productListing-heading" widht="20%">{$translate_field_lead_status_active}</td>
    </tr>
    {foreach from=$lead_statusArray item=lead_status}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="edit_lead_status('{$lead_status->get_lead_status_id()}')">
        <td class="productListing-data">{$lead_status->get_lead_status_text()}</td>
        <td class="productListing-data">{$lead_status->get_lead_status_active()|yesno}</td>
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="2">{$translate_text_no_results_found}</td>
    </tr>
    {/foreach}
</table>