<!-- ajax_load_employee_address.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Employee Address</span></td>	
	</tr>
</table>
 
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%"></a>
	<tr>
		<td class="productListing-data">

			<table cellpadding="3" cellspacing="0" border="0" >
				<tr>
					<td valign="top">				
						<table cellpadding="3" cellspacing="0" border="0">
							<tr>
								<td  class="formAreaTitle">Address Type</td>
								<td  class="fieldValue">Home</td>
							</tr><tr>
								<td  class="fieldValue" colspan="2">{$addressObj->getAddressStreet()}</td>
							</tr><tr>
								<td class="fieldValue" colspan="2"></td>
							<tr>
								<td class="formAreaTitle">City</td>
								<td class="fieldValue">{$addressObj->getAddressCity()}</td>
							</tr><tr>
								<td class="formAreaTitle">State</td>
								<td class="fieldValue">{$addressObj->getAddressState()}</td>
							</tr><tr>
								<td class="formAreaTitle">Postal Code</td>
								<td class="fieldValue">{$addressObj->getAddressPostalCode()}</td>
							</tr><tr>
								<td colspan="2"><a href="#" onclick="window.open('{$ROOT_URL}/index.php?page=core:map&toAddress={$addressObj->getAddressStreet()} {$addressObj->getAddressCity()}, {$addressObj->getAddressState()} {$addressObj->getAddressPostalCode()} ','mywindow','scrollbars=1,menubar=1,resizable=1,width=640,height=550');">Map</a></td>
							</tr>
						</table>                           
					</td>
					<td width="20"><br></td>
					<td valign="top">
						<table cellpadding="3" cellspacing="0" border="0">
							<tr><tr>
								<td class="formAreaTitle">Work Phone</td>
								<td class="fieldValue">{$primary_phone} <b>Extension</b> {$extension}</td>
							</tr><tr>	
								<td class="formAreaTitle">Home Phone</td>
								<td class="fieldValue">{$secondary_phone}</td>
							</tr><tr>
								<td class="formAreaTitle">Mobile Phone</td>
								<td class="fieldValue">{$mobile_phone}</td>
							</tr><tr>
								<td class="formAreaTitle">Fax</td>
								<td class="fieldValue">{$fax}</td>
							</tr><tr>
								<td colspan="2" align="center"><a href="javascript:edit_window('edit_contact')">Edit</a></td>
							</tr>
						</table>                       
					</td>
					<td width="20"><br></td>
					<td valign="top">
						<table cellpadding="3" cellspacing="0" border="0">
							<tr><tr>
								<td class="formAreaTitle">Yahoo IM</td>
								<td class="fieldValue">{$yahoo}</td>
							</tr><tr>
								<td class="formAreaTitle">MSN IM</td>
								<td class="fieldValue">{$msn}</td>
							</tr><tr>
								<td class="formAreaTitle">ICQ IM</td>
								<td class="fieldValue">{$icq}</td>
							</tr><tr>
								<td class="formAreaTitle">AOL IM</td>
								<td class="fieldValue">{$aol}</td>
							</tr>
						</table>
								
				</tr>
			</table>

		</td>
	</tr>
</table>


					