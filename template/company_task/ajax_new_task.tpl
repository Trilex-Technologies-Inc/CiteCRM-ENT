<!-- ajax_new_task.tpl -->
<table>
    <tr>
        <td><span class="greetUser">{$translate_text_new_task}</span></td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" class="formArea" width="700">
	<tr>
		<td>
			<table cellpadding="5" cellspacing="0" width="700">
				<tr>
					<td class="formAreaTitle">{$translate_field_company_task_name}</td>
					<td class="fieldValue"><input type="text" name="company_task_name" id="company_task_name" size="40"></td>
				</tr><tr>
					<td class="formAreaTitle">{$translate_field_company_task_category_id}</td>
					<td class="fieldValue">
						<div id="add_task_category">
							{html_select_company_task} <input type="button" name="add" id="add" value="+" onclick="add_task_category()">
							<input type="hidden" name="add_category" id="add_category" value="0">
						</div>
					</td>
				</tr>
			</table>
			<form name="task">
			<table cellpadding="5" cellspacing="0" width="700">
				<tr>
					<td class="formAreaTitle" valign="top">{$translate_field_company_task_due}</td>
					<td class="fieldValue">
						<input id="due_type_none" name="due_type" type="radio" value="0" checked="checked"  />
			   			{$translate_text_no_due_date}<br />
			   			{html_select_task_due}		
					</td>		
				</tr><tr>
					<td class="formAreaTitle" valign="top">{$translate_field_company_task_alarm}</td>
					<td class="fieldValue">
						<input id="alarm" name="alarm" type="radio" value="0" checked="checked"/>{$translate_text_none}<br />
			  	 		<input id="alarm" name="alarm" type="radio" value="1" />
			   			<input type="text" size="2" name="alarm_value" id="alarm_value" value="15" onclick="document.task.alarm[1].checked=true">&nbsp;
			   			<select name="alarm_unit" id ="alarm_unit" onchange="document.task.alarm[1].checked=true">
			    			<option value="1" selected="selected">Minute(s)</option>
			    			<option value="60">{$translate_text_hours}</option>
			    			<option value="1440">{$translate_text_days}</option>
			    			<option value="10080">{$translate_text_weeks}</option>
			   			</select>
			   		</td>
					
				</tr><tr>
						<td class="formAreaTitle">{$translate_field_company_task_priority}</td>
						<td class="fieldValue">
							<select id="company_task_priority" name="company_task_priority">
								<option value="1">1 {$translate_text_highest}</option>
								<option value="2">2 </option>
								<option value="3" selected="selected">3 </option>
								<option value="4">4 </option>
								<option value="5">5 {$translate_text_lowest}</option>
							</select>
						</td>
					</tr><tr>
						<td class="formAreaTitle">{$translate_field_company_task_status}</td>
						<td class="fieldValue">
							<select id="company_task_status" name="company_task_status">
								<option value="Active">{$translate_text_active}</option>
								<option value="Completed">{$translate_text_completed}</option>
								<option value="Converted">{$translate_text_converted}</option>							
							</select>
						</td>
					
					</tr>
				</table>
				</form>
				<table cellpadding="5" cellspacing="0" width="700">
					<tr>
						<td class="formAreaTitle" colspan="2">{$translate_field_company_task_text}</td>
					</tr><tr>
						<td class="fieldValue" colspan="2"><textarea id="company_task_text" name="company_task_text" cols="600" rows="8"></textarea></td>
					</tr><tr>
						<td class="fieldValue" colspan="2">
							<input type="button" name="save" id="save" value="{$translate_button_save}" onclick="save_company_task()"> 
							<input type="button" name="cancel" id="cancel" value="{$translate_button_cancel}" onclick="javascript:load_company_task('Task','','ASC','')">
							<input type="button" name="calendar" value="Calendar" onclick="open_calendar()">
							</td>
					</tr>				
			</table>
			
		</td>
	</tr>
</table>
