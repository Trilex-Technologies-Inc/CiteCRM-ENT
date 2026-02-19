<!-- ajax_load_alerts.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Alerts</span></td>
        <td align="right"><a href="{$ROOT_URL}/index.php?page=alert:create_new">Create Alert</a></td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'alert_to_employee.alert_to_employee_read'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Alerts','alert_to_employee.alert_to_employee_read','ASC','{$next}')" style="cursor:pointer">Read</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Alerts','alert_to_employee.alert_to_employee_read','DESC','{$next}')" style="cursor:pointer">Read</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'alert.alert_start_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Alerts','alert.alert_start_date','ASC','{$next}')" style="cursor:pointer">Date</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Alerts','alert.alert_start_date','DESC','{$next}')" style="cursor:pointer">Date</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'alert.alert_subject'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Alerts','alert.alert_subject','ASC','{$next}')" style="cursor:pointer">Subject</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Alerts','alert.alert_subject','DESC','{$next}')" style="cursor:pointer">Subject</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'alert.alert_active'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Alerts','alert.alert_active','ASC','{$next}')" style="cursor:pointer">Active</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Alerts','alert.alert_active','DESC','{$next}')" style="cursor:pointer">Active</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'alert_to_employee.alert_to_employee_read_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_tools('Alerts','alert_to_employee.alert_to_employee_read_date','ASC','{$next}')" style="cursor:pointer">Date Read</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_tools('Alerts','alert_to_employee.alert_to_employee_read_date','DESC','{$next}')" style="cursor:pointer">Date Read</span>
			{/if}
		</td>
	</tr>
	{foreach from=$alertArray item=alert}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="loadAlertById('{$alert->get_alert_id()}')">
		<td class="productListing-data" {if $field == 'alert_to_employee.alert_to_employee_read'} style="background-color: #ECECEC;"{/if}>{$alert->get_alert_to_employee_read()|yesno}</td>
		<td class="productListing-data" {if $field == 'alert.alert_start_date'} style="background-color: #ECECEC;"{/if}>{$alert->get_alert_start_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data" {if $field == 'alert.alert_subject'} style="background-color: #ECECEC;"{/if}>{$alert->get_alert_subject()}</td>
		<td class="productListing-data" {if $field == 'alert.alert_active'} style="background-color: #ECECEC;"{/if}>{$alert->get_alert_active()|yesno}</td>
		<td class="productListing-data" {if $field == 'alert_to_employee.alert_to_employee_read_date'} style="background-color: #ECECEC;"{/if}>{if $alert->get_alert_to_employee_read_date() > 0}{$alert->get_alert_to_employee_read_date()|date_format:$DATE_FORMAT}{else}N/A{/if}</td>
	</tr>
	{foreachelse}
	
	{/foreach}
	<tr>
		<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
			<table width="100%">
				<tr>
					<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
					<td class="data" width="75%"></td>
					<td class="data" nowrap>
						<a href="javascript:load_tools('Alerts','{$field}','{$sort}','1');">First</a> |
						<a href="javascript:load_tools('Alerts','{$field}','{$sort}','{paginate_prev id="alerts"}');">Prev</a> |
						<a href="javascript:load_tools('Alerts','{$field}','{$sort}','{paginate_next id="alerts"}');">Next</a> |
						<a href="javascript:load_tools('Alerts','{$field}','{$sort}','{paginate_last id="alerts"}');">Last</a>
					</td>
					</tr>
				</table>
			</td>
	</tr>
</table>