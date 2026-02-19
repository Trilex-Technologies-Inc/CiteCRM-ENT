<!-- ajax_load_alert.tpl-->
<table width="100%">
	<tr>
		<td><span class="greetUser">{$alertObj->get_alert_subject()}</span></td>
        <td align="right"><a href="{$ROOT_URL}/index.php?page=alert:create_new">Create Alert</a></td>
	</tr>
</table>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="formAreaTitle">Start Date</td>
					<td class="fieldValue">{$alertObj->get_alert_start_date()|date_format:$DATE_FORMAT}</td>
                    <td class="formAreaTitle">End Date</td>
                    <td class="fieldValue">{$alertObj->get_alert_end_date()|date_format:$DATE_FORMAT}</td>
				</tr><tr>
                    <td class="formAreaTitle">Subject</td>
                    <td class="fieldValue" colspan="3">{$alertObj->get_alert_subject()}</td>
                </tr><tr>
                    <td class="formAreaTitle" colspan="4">Details</td>
                </tr><tr>
                    <td class="fieldValue" colspan="4">{$alertObj->get_alert_text()}</td>
                </tr><tr>
                	<td class="formAreaTitle">Created By</td>
                	 <td class="fieldValue" colspan="3">{$alertObj->get_alert_create_by()|display_names}</td>
                </tr><tr>
                    <td class="formAreaTitle" valign="top">Employees</td>
                    <td class="fieldValue">
                    	<table cellpadding="3" cellspacing="0">
                    		<tr>
                    			<td class="formAreaTitle">Employee</td>
                    			<td class="formAreaTitle">Read</td>
                    			<td class="formAreaTitle">Date</td>
                    		</tr>
                    		{foreach from=$employeeArray item=emp}
                    		<tr>
                    			<td class="fieldValue">{$emp->get_alert_to_employee_id()|display_names}</td>
                    			<td class="fieldValue">{$emp->get_alert_to_employee_read()|yesno}</td>
                    			<td class="fieldValue">
                    			{if $emp->get_alert_to_employee_read() > 0}
                    				{$emp->get_alert_to_employee_read_date()|date_format:$DATE_FORMAT}
                    			{else}
                    				N/A
                    			{/if}
                    			</td>
                    		</tr>
                    		{/foreach}
                    	</table>
                    
                    </td>
                    <td></td>
                    <td></td>
                </tr><tr>
                  	<td class="formAreaTitle">Date You Read</td>
                  	<td class="fieldValue">{if $alertObj->get_alert_to_employee_read() > 0}{$alertObj->get_alert_to_employee_read_date()|date_format:$DATE_FORMAT}{else}N/A{/if}</td>
                  	<td class="formAreaTitle">Active</td>
                  	<td class="fieldValue">{$alertObj->get_alert_active()|yesno}</td>
                </tr><tr>
                    <td class="fieldValue" colspan="4">
                    	{if $alertObj->get_alert_create_by() == $SESSION_USER_ID}
                    		<a href="javascript:editAlert('{$alertObj->get_alert_id()}')">Edit</a>
                    	{/if}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>
<a href="javascript:load_tools('Alerts','alert.alert_id','ASC','next')" id="Alerts">Back To Alerts</a>