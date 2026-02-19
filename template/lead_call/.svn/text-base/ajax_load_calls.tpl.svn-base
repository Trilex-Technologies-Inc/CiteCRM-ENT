<!--ajax_load_calls.tpl-->
<table width="100%">
	<tr>
		<td><span class="greetUser">Phone Call History</span></td>
        <td align="right"><a href="javascript:add_activity('Call');">Record New Call</a></td>	
	</tr>
</table>  
<table width="100%" cellpadding="2" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_lead_call_subject}</td>
		<td class="productListing-heading" width="100">{$translate_field_lead_call_date}</td>
		<td class="productListing-heading" width="100">End Time</td>
		<td class="productListing-heading" width="100">{$translate_field_lead_call_by}</td>
	</tr>
	{foreach from=$lead_callArray item=lead_call}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblclick="javascript:load_edit_call_window('{$lead_call->get_lead_call_id()}')">
		<td class="productListing-data"><img src="{$ROOT_URL}/images/icons/copy_16.gif" align="middle" border="0" onMouseOver="ddrivetip('{$lead_call->get_lead_call_text()|escape:'javascript'}')" onMouseOut="hideddrivetip()" style="cursor:pointer"> {$lead_call->get_lead_call_subject()}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_date()|link_date_time}</td>
		<td class="productListing-data">{$lead_call->get_lead_call_duration()|date_format:"%I:%M %p"}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$lead_call->get_lead_call_by()}">{$lead_call->get_lead_call_by()|display_names}</a></td>		
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="4">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>