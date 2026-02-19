<!-- configure_crm.tpl -->
{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Configure CRM</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
					<form method="post" action="{$ROOT_URL}/index.php?page=core:configure_crm">	
						<table cellpadding="5" cellspacing="5" class="formArea" width="600">
							<tr>
								<td colspan="2"><span class="greetUser">Printing</span></td>
							</tr><tr>
								<td class="formAreaTitle">PDF Printing</td>
								<td class="fieldValue">{html_select_yesno fieldName=PDF_PRINTING value=$PDF_PRINTING|default:'1'}</td>
							</tr><tr>
								<td class="formAreaTitle">Print Logo In PDFs</td>
								<td class="fieldValue">{html_select_yesno fieldName=DISPLAY_COMPANY_LOGO value=$DISPLAY_COMPANY_LOGO|default:'1'}</td>
							</tr><tr>
								<td class="formAreaTitle">Label Printer</td>
								<td class="fieldValue"><select name="SYSTEMLABEL">
										<option value="dymo_4_2_5_16">Dymo 4X2</option>
									</select>
								</td>
							</tr><tr>
								<td colspan="2"><span class="greetUser">Date Format</span></td>
							</tr><tr>
								<td class="formAreaTitle">Date Format</td>
								<td class="fieldValue">
									<select name="DATE_FORMAT">
										<option value="%m-%d-%Y">MM-DD-YYYY</option>
										<option value="%m-%d-%y">MM-DD-YY</option>
										<option value="%Y-%m-%d">YYYY-MM-DD</option>
										<option value="%y-%m-%d">YY-MM-DD</option>
									</select>
								</td>
							</tr><tr>
								<td class="formAreaTitle">Date + Time Format</td>
								<td class="fieldValue">		
									<select name="DATE_TIME_FORMAT">
										<option value="%H:%M %m-%d-%Y">HH:II MM-DD-YYYY</option>
										<option value="%H:%M %m-%d-%y">HH:II MM-DD-YY</option>
										<option value="%m-%d-%Y %H:%M">MM-DD-YYYY HH:II</option>
										<option value="%m-%d-%y %H:%M">MM-DD-YY HH:II</option>
										<option value="%H:%M %Y-%m-%d">HH:II YYYY-MM-DD</option>
										<option value="%H:%M %y-%m-%d">HH:II YY-MM-DD</option>
										<option value="%Y-%m-%d %H:%M">YYYY-MM-DD HH:II</option>
										<option value="%y-%m-%d %H:%M">YY-MM-DD HH:II</option>										
								</td>
							</tr><tr>			
								<td colspan="2"><input type="submit" name="submit" value="Save"></td>
							</tr>
						</table>
					</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


{include file="core/footer.tpl"}

			