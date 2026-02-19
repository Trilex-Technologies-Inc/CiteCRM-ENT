{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Configure Company</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
					<form method="post" action="{$ROOT_URL}/index.php?page=core:configure_address">	
						<table cellpadding="5" cellspacing="5" class="formArea" width="600">
							<tr>
								<td class="formAreaTitle">Company Name</td>
								<td class="fieldValue"><input type="text" name="SITE_NAME" value="{$SITE_NAME}" size="40" id="SITE_NAME"></td>
							</tr><tr>
								<td class="formAreaTitle">Company Slogan</td>
								<td class="fieldValue"><input type="text" name="SITE_SLOGAN" value="{$SITE_SLOGAN}" size="40" id="SITE_SLOGAN"></td>
							</tr><tr>			
								<td class="formAreaTitle">Company Email</td>
								<td class="fieldValue"><input type="text" name="SITE_EMAIL" value="{$SITE_EMAIL}" size="40" id="SITE_EMAIL"></td>
							</tr><tr>
								<td class="formAreaTitle">Admin Email</td>
								<td class="fieldValue"><input type="text" name="SITE_EMAIL_ADMIN" value="{$SITE_EMAIL_ADMIN}" size="40" id="SITE_EMAIL_ADMIN"></td>
							</tr><tr>
								<td colspan="2"><br></span>
							</tr><tr>
								<td class="formAreaTitle">Street Address</td>
								<td class="fieldValue"><input type="text" name="COMPANY_STREET_1" value="{$COMPANY_STREET_1}" size="40" id="COMPANY_STREET_1"></td>
							</tr><tr>
								<td class="formAreaTitle">Street Address 2</td>
								<td class="fieldValue"><input type="text" name="COMPANY_STREET_2" value="{$COMPANY_STREET_2}" size="40" id="COMPANY_STREET_2"></td>
							</tr><tr>
								<td class="formAreaTitle">City</td>
								<td class="fieldValue"><input type="text" name="COMPANY_CITY" value="{$COMPANY_CITY}" size="40" id="COMPANY_CITY"></td>
							</tr><tr>
								<td class="formAreaTitle">State</td>
								<td class="fieldValue"><input type="text" name="COMPANY_STATE" value="{$COMPANY_STATE}" size="40" id="COMPANY_STATE"></td>
							</tr><tr>
								<td class="formAreaTitle">Zip/Postal Code</td>
								<td class="fieldValue"><input type="text" name="COMPANY_POSTAL_CODE" value="{$COMPANY_POSTAL_CODE}" size="40" id="COMPANY_POSTAL_CODE"></td>
							</tr><tr>
								<td class="formAreaTitle">Country</td>
								<td class="fieldValue"><input type="text" name="COMPANY_COUNTRY" value="{$COMPANY_COUNTRY}" size="40" id="COMPANY_COUNTRY"></td>
							</tr><tr>
								<td colspan="2"><br></td>
							</tr><tr>
								<td class="formAreaTitle">Company Phone</td>
								<td class="fieldValue"><input type="text" name="COMPANY_PHONE" value="{$COMPANY_PHONE}" size="40" id="COMPANY_PHONE"></td>
							</tr><tr>
								<td class="formAreaTitle">Company Mobile</td>
								<td class="fieldValue"><input type="text" name="COMPANY_MOBILE" value="{$COMPANY_MOBILE}" size="40" id="COMPANY_MOBILE"></td>
							</tr><tr>
								<td class="formAreaTitle">Company Toll Free</td>
								<td class="fieldValue"><input type="text" name="COMPANY_TOLL_FREE" value="{$COMPANY_TOLL_FREE}" size="40" id="COMPANY_TOLL_FREE"></td>
							</tr><tr>
								<td class="formAreaTitle">Company Fax</td>
								<td class="fieldValue"><input type="text" name="COMPANY_FAX" value="{$COMPANY_FAX}" size="40" id="COMPANY_FAX"></td>
							</tr><tr>
								<td class="formAreaTitle">Default Area Code</td>
								<td class="fieldValue"><input type="text" name="DEFAULTAREACODE" value="{$DEFAULTAREACODE}" size="40" id="DEFAULTAREACODE"></td>
							</tr><tr>
								<td colspan="2"><br></td>
							</tr><tr>
								<td class="formAreaTitle">Open Hour (24 hrs)</td>
								<td class="fieldValue"><input type="text" name="COMPANY_START_HOUR" value="{$COMPANY_START_HOUR}" size="40" id="COMPANY_START_HOUR"></td>
							</tr><tr>
								<td class="formAreaTitle">Open Min</td>
								<td class="fieldValue"><input type="text" name="COMPANY_START_MIN" value="{$COMPANY_START_MIN}" size="40" id="COMPANY_START_MIN"></td>
							</tr><tr>
								<td class="formAreaTitle">Close Hour (24 hrs)</td>
								<td class="fieldValue"><input type="text" name="COMPANY_END_HOUR" value="{$COMPANY_END_HOUR}" size="40" id="COMPANY_END_HOUR"></td>
							</tr><tr>
								<td class="formAreaTitle">Close Min</td>
								<td class="fieldValue"><input type="text" name="COMPANY_END_MIN" value="{$COMPANY_END_MIN}" size="40" id="COMPANY_END_MIN"></td>
							</tr><tr>
								<td colspan="2"><br></td>
							</tr><tr>
								<td class="formAreaTitle">Session Time Out</td>
								<td class="fieldValue"><input type="text" name="SESSION_TIMEOUT" value="{$SESSION_TIMEOUT}" size="40" id="SESSION_TIMEOUT"> Seconds</td>
							</tr><tr>
								<td class="formAreaTitle">Default Tech Support Price</td>
								<td class="fieldValue"><input type="text" name="DEFAULT_CALL_COST" value="{$DEFAULT_CALL_COST}" size="40" id="DEFAULT_CALL_COST"> Per Minute</td>
							</tr><tr>
							</tr>
								<td class="fieldValue"><input type="submit" name="submit" value="Save" id="submit"></td>
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