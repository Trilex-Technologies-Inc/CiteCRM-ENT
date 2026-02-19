<!-- ajax_edit_system.tpl -->
<table cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" width="50%">

			<table cellpadding="0" cellspacing="3">
				<tr>
					<td class="formAreaTitle">Name</td>
					<td class="fieldValue"><input type="text" id="system_name" value="{$systemObj->get_system_name()}"></td>
				</tr><tr>
					<td class="formAreaTitle">Serial Number</td>
					<td class="fieldValue"><input type="text" id="system_serial_num" value="{$systemObj->get_system_serial_num()|default:"N/A"}"></td>
				</tr><tr>
					<td class="formAreaTitle">Host Name</td>
					<td class="fieldValue"><input type="text" id="system_host_name" value="{$systemObj->get_system_host_name()}"></td>
				</tr><tr>
					<td class="formAreaTitle">IP Address</td>
					<td class="fieldValue"><input type="text" id="system_ip_address" value="{$systemObj->get_system_ip_address()}"></td>
				</tr><tr>
					<td class="formAreaTitle">Manufacture</td>
					<td class="fieldValue"><div id="manufacture">{html_select_system_manufacture name="system_manufacture_id" div="model" value=$systemObj->get_system_manufacture_id()} <input type="button" onclick="add_manufacture()" value="+"></div></td>
				</tr><tr>
					<td class="formAreaTitle">Model</td>
					<td class="fieldValue"><input type="text" id="system_model_id" value="{$systemObj->get_system_model_id()}"></td>
				</tr>
			</table>

		</td>
		<td width="10"><br></td>
		<td valign="top" width="50%">

			<table cellpadding="3" cellspacing="0" class="small">
				<tr>		
					<td class="formAreaTitle" valign="top">Opreating System</td>
					<td class="fieldValue">
                        <div id="operating_system_man">{html_select_operating_system_manufacture value=$systemObj->get_operating_system_manufacture_id() div="operating_system" } <input type="button" onclick="add_operating_system_man()" value="+"></div>
                        <div id="operating_system">{html_select_opreating_system value=$systemObj->get_operating_system_id() operating_system_manufacture_id=$systemObj->get_operating_system_manufacture_id()}</div>
                    </td>
				</tr><tr>
					<td class="formAreaTitle">Purchase Date</td>
					<td class="fieldValue">
                        <input type="text" id="system_purchase_date" value="{$systemObj->get_system_purchase_date()|date_format:$DATE_FORMAT}">
                    </td>
				</tr><tr>
					<td class="formAreaTitle">Purchase Price</td>
					<td class="fieldValue"><input type="text" id="system_purchase_price" value="{$systemObj->get_system_purchase_price()}"></td>
				</tr><tr>
					<td class="formAreaTitle">Active</td>
					<td class="fieldValue">{html_select_yesno fieldName=system_active value=$systemObj->get_system_active()}</td>
				</tr><tr>
					<td class="formAreaTitle">Last Service</td>
					<td class="fieldValue"><input type="text" id="system_last_service" value="{$systemObj->get_system_last_service()|date_format:$DATE_FORMAT}"></td>
				</tr>
			</table>

            <br>
            


		</td>
	</tr>
</table>
{html_select_company_users company_id=$company_id value=$user_id}
<br>
<br>
<input type="button" name="submit" id="submit" value="Save" onclick="update_system()">
<input type="button" name="cancel" id="cancel" value="Cancel" onclick="load_system_details();">
<br>
<br>