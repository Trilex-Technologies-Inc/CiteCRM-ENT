<!-- ajax_load_user_address.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Contact Address {$user_addressObj->getAddressType()}</span></td>	
	</tr>
</table>

<table cellpadding="0" cellspacing="0" class="dataTable" width="100%"></a>
	<tr>
		<td class="productListing-data">
		
			<table cellpadding="3" cellspacing="0" border="0" width="100%">
				<tr>
					<td valign="top">		

                    {if $user_to_companyObj->fields.company_id > 0}

                        {if $user_addressObj->fields.company_address_id > 0}
                            <table cellpadding="3" cellspacing="0" class="small">
                                <tr>
                                    <td><b>Address Type</b></td>
                                    <td>{$user_addressObj->fields.company_address_type}</td>
                                </tr><tr>
                                    <td><b>Name</b></td>
                                    <td>{$user_addressObj->fields.company_address_name}<td>
                                </tr><tr>
                                    <td colspan="2">{$user_addressObj->fields.company_street_1}</td>
                                </tr>
                                {if $user_addressObj->fields.company_street_2 != ''}
                                <tr>
                                     <td colspan="2">{$user_addressObj->fields.company_street_2}</td>
                                </tr>
                                {/if}
                                <tr>
                                    <td colspan="2">{$user_addressObj->fields.company_city}, {$user_addressObj->fields.company_state|state_name} {$user_addressObj->fields.company_postal_code}
                                    </td>
                                </tr>
                            </table>
                        {else}
                            <table cellpadding="3" cellspacing="0" class="small">
                                <tr>
                                    <td><b>Assign Account Address</b></td>
                                    <td>{html_select_company_address company_id=$user_to_companyObj->fields.company_id fieldName=company_address_id} <input type="button" id="save_address" onclick="map_company_address()" value="save"></td>
                                </tr>

                            </table>
                        {/if}



                    {else}

                        <table cellpadding="3" cellspacing="0" class="small">
                            <tr>
                                <td><b>Address Type</b></td>
                                <td>
                                    <select name="address_type" id="address_type" onchange="load_window('Address')">
                                        <option value="Home" {if $user_addressObj->getAddressType() == "Home"} selected {/if}>Home</option>
                                        <option value="Billing" {if $user_addressObj->getAddressType() == "Billing"} selected {/if}>Billing</option>
                                        <option value="Shipping" {if $user_addressObj->getAddressType() == "Shipping"} selected {/if}>Shipping</option>
                                    </select>
                                </td>
                            </tr><tr>
                                <td colapsn="2">{$user_addressObj->getAddressStreet()}</td>
                            </tr>
                            {if $user_addressObj->getAddressStreet2() != ''}
                            <tr>
                                <td colaspn="2">{$user_addressObj->getAddressStreet2()}</td>
                            </tr>
                            {/if}
                            <tr>
                                <td>{$user_addressObj->getAddressCity()} {$user_addressObj->getAddressState()|state_name} </td>
                            </tr>
                        </table>

                    {/if}

					</td>
					<td valign="top">	
		
						<table cellpadding="3" cellspacing="0" border="0">
							<tr>
								<td class="data"><b>Primary Phone</b></td>
								<td class="data">{$primary_phone} <b>Ext</b> {$extension}</td>
							</tr><tr>
                                <td class="data"><b>Mobile Phone</b></td>
                                <td class="data">{$mobile_phone}</td>
                            </tr><tr>
                                
								<td class="data"><b>Other Phone</b></td>
								<td class="data">{$secondary_phone}</td>
							</tr><tr>
								<td><a href="javascript:edit_contact()">Edit</a></td>
							</tr>
						</table>
						
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>
			
			
			
<br>
