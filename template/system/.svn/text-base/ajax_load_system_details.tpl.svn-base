<!-- ajax_load_system_details.tpl -->
<table cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top" width="50%">

			<table cellpadding="3" cellspacing="0">
				<tr>
					<td class="formAreaTitle">Name</td>
					<td class="fieldValue">{$system->get_system_name()}</td>
				</tr><tr>
					<td class="formAreaTitle">Serial Number</td>
					<td class="fieldValue">{$system->get_system_serial_num()|default:"N/A"}</td>
				</tr><tr>
					<td class="formAreaTitle">Host Name</td>
					<td class="fieldValue">{$system->get_system_host_name()}</td>
				</tr><tr>
					<td class="formAreaTitle">IP Address</td>
					<td class="fieldValue">{$system->get_system_ip_address()}</td>
				</tr><tr>
					<td class="formAreaTitle">Manufacture</td>
					<td class="fieldValue">{$system->get_system_manufacture_id()|system_manufacture_name}</td>
				</tr><tr>
					<td class="formAreaTitle">Model</td>
					<td class="fieldValue">{$system->get_system_model_id()}</td>
				</tr><tr>
					<td  valign="top" class="formAreaTitle">Barcode</td>
					<td  valign="top" class="fieldValue"><img src="{$ROOT_URL}/images/barcode/SYS{$system->get_system_id()}.png" align="middle"> <a href="{$ROOT_URL}/index.php?page=system:{$SYSTEMLABEL}&system_id={$system->get_system_id()}"><img src="{$ROOT_URL}/images/icons/print_16.gif" alt="print barcode" border="0" align="middle" onMouseOver="ddrivetip('Print Barcode')" onMouseOut="hideddrivetip()"></a></td>
				</tr>
			</table>

		</td>
		<td width="10"><br></td>
		<td valign="top" width="50%">

			<table cellpadding="3" cellspacing="0" class="small">
				<tr>		
					<td class="formAreaTitle">Opreating System</td>
					<td class="fieldValue">{$system->get_operating_system_manufacture_id()|operating_system_manufacture_name} {$system->get_operating_system_id()|operating_system_name}</td>
				</tr><tr>
					<td class="formAreaTitle">Purchase Date</td>
					<td class="fieldValue">{$system->get_system_purchase_date()|date_format:$DATE_FORMAT}</td>
				</tr><tr>
					<td class="formAreaTitle">Purchase Price</td>
					<td class="fieldValue">${$system->get_system_purchase_price()|string_format:"%.2f"}</td>
				</tr><tr>
					<td class="formAreaTitle">Active</td>
					<td class="fieldValue">{$system->get_system_active()|yesno}</td>
				</tr><tr>
					<td class="formAreaTitle">Last Service</td>
					<td class="fieldValue">
					 {if $system->get_system_last_service() < 1}
					 	Never Serviced
					 {else}
						{$system->get_system_last_service()|date_format:$DATE_FORMAT}
					 {/if}
					</td>
				</tr><t>
                    <td colspan="2"><a href="javascript:edit_system()">Edit</a></td>
                </tr>
			</table>

		</td>
	</tr>
</table>