<span class="greetUser">Search</span>
	<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
		<tr>
			<td class="small">UPC</td>
			<td class="small"><input type="text" name="upcCode" id="upcCode" value="{$upcCode}" onchange="search_workorder('workorder_id','DESC','1')"></td>
		</tr><tr>	
			<td class="small">ID</td>
			<td class="small"><input type="text" name="workorder_id" id="workorder_id" value="{$workorder_id}"></td>
		</tr><tr>
			</tr><tr>	
			<td class="small">Status</td>
			<td class="small">{html_select_workorder_status fieldName="workorder_status" value=0}</td>
		</tr><tr>
			<td class="small">Assigned</td>
			<td class="small">{html_select_employee fieldName="workorder_assigned_to" value=0}</td>
		</tr><tr>	
			<td class="small">Active</td>
			<td class="small">{html_select_yesno fieldName="workorder_active" value=1}</td>
		</tr><tr>
			<td class="small">Opened</td>
			<td class="small">From <input type="text" name="workorder_open_date" id="workorder_open_date" size="8"> To <input type="text" name="workorder_open_date_c" id="workorder_open_date_c" size="8"><br>
				Date must be in format mm/dd/yyy
			 </td>
		</tr><tr>
			<td class="small">Closed</td>
			<td class="small">From <input type="text" name="workorder_close_date" id="workorder_close_date" size="8"> To <input type="text" name="workorder_close_date_c" id="workorder_close_date_c" size="8"><br>
				Date must be in format mm/dd/yyy
			</td>
		</tr><tr>
			<td colspan="2" class="small"><input type="submit" name="submit" value="Search" onclick="search_workorder('workorder_id','DESC','1')"></td>
	</tr>
	</table>
