<!--ajax_load_contact.tpl-->
<span class="greetUser">Contact Information</span>
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
								<td colspan="2" align="center"><a href="javascript:edit_contact()">Edit</a></td>
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
