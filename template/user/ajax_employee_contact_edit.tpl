<!-- ajax_employee_contact_edit -->
<table>
	<tr>
		<td><span class="greetUser">Employee Contact</span></td>	
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
								<td valign="top">
						<table cellpadding="3" cellspacing="0" border="0">
							<tr><tr>
								<td class="formAreaTitle">Work Phone</td>
								<td class="fieldValue"><input type="text" name="primary_phone" id="primary_phone" value="{$primary_phone}"> <b>Extension</b> <input type="text" name="extension" id="extension" value="{$extension}" size="8"></td>
							</tr><tr>	
								<td class="formAreaTitle">Home Phone</td>
								<td class="fieldValue"><input type="text" name="secondary_phone" id="secondary_phone" value="{$secondary_phone}"></td>
							</tr><tr>
								<td class="formAreaTitle">Mobile Phone</td>
								<td class="fieldValue"><input type="text" name="mobile_phone" id="mobile_phone" value="{$mobile_phone}"></td>
							</tr><tr>
								<td class="formAreaTitle">Fax</td>
								<td class="fieldValue"><input type="text" name="fax" id="fax" value="{$fax}"></td>
							</tr><tr>
								<td colspan="2" align="center"><input type="button" value="save" onclick="save('contact')"> <input type="button" name="cancel" value="Cancel" onclick=" load_window('Address','','','')"></td>
							</tr>
						</table>                       
					</td>
					<td width="20"><br></td>
					<td valign="top">
						<table cellpadding="3" cellspacing="0" border="0">
							<tr><tr>
								<td class="formAreaTitle">Yahoo IM</td>
								<td class="fieldValue"><input type="text" name="yahoo" id="yahoo" value="{$yahoo}"></td>
							</tr><tr>
								<td class="formAreaTitle">MSN IM</td>
								<td class="fieldValue"><input type="text" name="msn" id="msn" value="{$msn}"></td>
							</tr><tr>
								<td class="formAreaTitle">ICQ IM</td>
								<td class="fieldValue"><input type="text" name="icq" id="icq" value="{$icq}"></td>
							</tr><tr>
								<td class="formAreaTitle">AOL IM</td>
								<td class="fieldValue"><input type="text" name="aol" id="aol" value="{$aol}"></td>
							</tr>
						</table>
								
				</tr>
			</table>

		</td>
	</tr>
</table>
