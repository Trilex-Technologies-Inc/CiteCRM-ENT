<!-- ajax_add_workorder_time.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Record Work Order Labor</span></td>	
	</tr>
</table>
<table cellpadding="5" cellspacing="0" class="formArea">
	<tr>
        <td class="formAreaTitle">Arival Time</td>
		<td class="fieldValue">
		{html_select_date prefix="startDate" time=$startTime} <b>-</b> {html_select_time prefix="startTime" display_seconds=false use_24_hours="true" minute_interval=15 time=$startTime}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Hours Worked</td>
		<td class="fieldValue">
           

			{html_select_time use_24_hours=true minute_interval=$billingMinIncrement time="false" display_seconds=false prefix="endTime"}
          
            
             {if $contract_bill == true}
                <b>{$billing_type}</b> ${$billing_rate}
                <input type="hidden" name="workorder_time_rate" id="workorder_time_rate" value="{$billing_rate}">
            {else}
               <b>Labor Rate</b>{html_select_billing_rate id="workorder_time_rate"}
                
            {/if}

		</td>
	</tr><tr>
        <td class="formAreaTitle" colspan="2">Description</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea id="workorder_time_description"></textarea></td>
    </tr><tr>
        
		<td class="fieldValue" colspan="2">
		  <input type="hidden" name="user_id" value="{$user_id}" id="user_id">
		  <input type="button" name="submit" value="Save" id="submit" onclick="save_workorder_time()">
            <input type="button" name="cancel" id="cancel" onclick="load_window('Time','workorder_time_start','ASC','1');" value="Cancel">
		</td>
	</tr>
</table>