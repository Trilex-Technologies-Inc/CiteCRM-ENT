<!-- ajax_load_address.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Company {$type} Address</span></td>	
	</tr>
</table>
 
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%"></a>
	<tr>
		<td class="productListing-data">

			<table cellpadding="3" cellspacing="0" border="0" >
				<tr>
					<td valign="top">

					{if $companyAddressObj->get_company_street_1() == ''}
			
						<table cellpadding="3" cellspacing="0" border="0" >
							<tr>
								<td class="formAreaTitle">Address Type</td>
								<td class="fieldValue">
									<select name="company_address_type" id="select_company_address_type" onchange="load_company_address('Address','')">
										<option value="Service" {if $type == "Service"} selected {/if}>Service</option>
										<option value="Billing" {if $type == "Billing"} selected {/if}>Billing</option>
										<option value="Shipping" {if $type == "Shipping"} selected {/if}>Shipping</option>
									</select>
								</td>
							</tr><tr>
								<td class="fieldValue" colspan="2">No Address found for Type {$type}</td>
							</tr>
						</table>
                        {if  $companyAddressObj->get_company_address_id() <= 0}
							<a href="javascript:add_company_address('{$type}')">Add</a>
						{/if}				
			
					{else}
						<table cellpadding="3" cellspacing="0" border="0">
							<tr>
								<td  class="formAreaTitle">Address Type</td>
								<td  class="fieldValue"><select name="select_company_address_type" id="select_company_address_type" onchange="load_company_address('Address','')">
										<option value="Service" {if $type == "Service"} selected {/if}>Service</option>
										<option value="Billing" {if $type == "Billing"} selected {/if}>Billing</option>
										<option value="Shipping" {if $type == "Shipping"} selected {/if}>Shipping</option>
									</select>
								</td>
							</tr><tr>
								<td  class="fieldValue" colspan="2">{$companyAddressObj->get_company_street_1()}</td>
							</tr><tr>
								<td class="fieldValue" colspan="2">{$companyAddressObj->get_company_street_2()}</td>
							<tr>
								<td class="formAreaTitle">City</td>
								<td class="fieldValue">{$companyAddressObj->get_company_city()}</td>
							</tr><tr>
								<td class="formAreaTitle">State</td>
								<td class="fieldValue">{$companyAddressObj->get_company_state()}</td>
							</tr><tr>
								<td class="formAreaTitle">Postal Code</td>
								<td class="fieldValue">{$companyAddressObj->get_company_postal_code()}</td>
							</tr>
						</table>
			             {if $companyAddressObj->get_company_address_id() > 0} 
							<a href="javascript:edit_address('{$companyAddressObj->get_company_address_id()}')">Edit</a>
                            <a href="#" onclick="window.open('{$ROOT_URL}/index.php?page=core:map&toAddress={$companyAddressObj->get_company_street_1()} {$companyAddressObj->get_company_city()}, {$companyAddressObj->get_company_state()|state_name} {$companyAddressObj->get_company_postal_code()} ','mywindow','scrollbars=1,menubar=1,resizable=1,width=640,height=550');">Map</a>
						{/if}

					{/if}
					</td>
					<td width="20"><br></td>
					<td valign="top">

						<table cellpadding="3" cellspacing="0" border="0">
							<tr>
								<td class="formAreaTitle">Contact</td>
								<td class="fieldValue">{$business_contact} </td>
							</tr><tr>
								<td class="formAreaTitle">Primary Phone</td>
								<td class="fieldValue">{$business_phone}</td>
							</tr><tr>	
								<td class="formAreaTitle">Fax</td>
								<td class="fieldValue">{$business_fax}</td>
							</tr><tr>
								<td class="formAreaTitle">Email</td>
								<td class="fieldValue">{$business_email}</td>
							</tr><tr>
								<td></td>
							</tr>
						</table>
                        <a href="javascript:edit_company_contact()">Edit</a>
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>


					