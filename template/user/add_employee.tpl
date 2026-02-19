<!-- add_employee,tpl -->
{include file="core/header.tpl"}
{if $isError}
<br><span class='error'><img src='/images/icons/flag_16.gif' alt='error'> There where errors saving your data. Please correct the following errors:</span><br><br>
{/if}
<form method ="POST" action="{$ROOT_URL}/index.php?page=user:add_employee">

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a  href="" class="current">Personal Information</a></li>    
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" >    
            <table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
                    <td class="formAreaTitle">First Name</td>
                    <td class="fieldValue" ><input type="text" name="first_name" size="20"  id="first_name" value="{$first_name}"></td>
                    {validate field="first_name" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees First Name</span></td>"}
                </tr><tr>
                    <td class="formAreaTitle">Last Name</td>
                    <td class="fieldValue"><input type="text" name="last_name" size="20" id="last_name" value="{$last_name}"></td>
					{validate field="last_name" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees Last Name</span></td>"}                
                </tr><tr>
                    <td class="formAreaTitle">Email Address</td>
                    <td class="fieldValue"><input type="text" name="email" size="20" value="{$email}"></td>
                    {validate field="email" criteria="isEmail" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees Email Address</span></td>"}                
                </tr><tr>
					<td class="formAreaTitle">Password</td>
                    <td class="fieldValue"><input type="text" name="password" size="20" value="{$password}"></td>
                    {validate field="password" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees Password</span></td>"}                
				</tr>             
            </table>        
        </td>
    </tr>
</table>

<br>

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a  href="" class="current">Address</a></li>    
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" >            

            <table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
                    <td class="formAreaTitle">Street</td>
                    <td class="fieldValue"><input type="text" name="address_street" size="20" id="address_street" value="{$address_street}"></td>
                    {validate field="address_street" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees Street Address</span></td>"}                
                </tr><tr>
                    <td class="formAreaTitle">Street 2</td>
                    <td class="fieldValue"><input type="text" name="address_street_2" size="20" id="address_street_2" value="{$address_street_2}"></td>
                </tr><tr>
                    <td class="formAreaTitle">City</td>
                    <td class="fieldValue"><input type="text" name="address_city" size="20" id="address_city" value="{$address_city|default:$COMPANY_CITY}"></td>
                    {validate field="address_city" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees City</span></td>"}                
                </tr><tr>
                    <td class="formAreaTitle">State</td>
                    <td class="fieldValue"><input type="text" name="address_state" value="{$address_state|default:$COMPANY_STATE}"></td>
                    {validate field="address_state" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees State</span></td>"}
                </tr><tr>
                    <td class="formAreaTitle">Postal Code/Zip</td>
                    <td class="fieldValue"><input type="text" name="address_postal_code" size="20" id="address_postal_code" value="{$address_postal_code|default:$COMPANY_POSTAL_CODE}"></td>
                    {validate field="address_postal_code" criteria="notEmpty" message="</tr><tr><td colspan=\"2\"><span class='error'>Please provide the employees zip/Postal Code</span></td>"}
                </tr>
            </table>
        </td>
    </tr>
</table>
            
<br>

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a  href="" class="current">Contact Information</a></li>    
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" >            

            <table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
                    <td class="formAreaTitle">Business Phone</td>
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
                </tr>
            </table>
        </td>
    </tr>
</table>            

<br>

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a  href="" class="current">Employee Permisions</a></li>    
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" >   
        
<table class="small" cellpadding="0" cellspacing="0" >
	<tr>
		<td>
			<table class="small" cellpadding="3" cellspacing="0">
				<tr>
					<td><strong nowrap>Can Read</strong></td>
					<td nowrap><input type="checkbox" name="CAN_READ" id="CAN_READ" value="1" {if $CAN_READ == '1'}checked{/if}></td>
					<td nowrap ><em>Bit value 1</em></td>
				</tr><tr>
					<td nowrap><strong>Can Print</strong></td>
					<td nowrap ><input type="checkbox" name="CAN_PRINT" id="CAN_PRINT" value="2" {if $CAN_PRINT == "2"}checked{/if}></td>
					<td nowrap><em>Bit value 2</em></td>
				</tr><tr>
					<td nowrap><strong>Can Create</strong></td>
					<td nowrap><input type="checkbox" name="CAN_CREATE" id="CAN_CREATE" value="4" {if $CAN_CREATE == "4"}checked{/if}></td>
					<td nowrap><em>Bit value 4</em></td>
				</tr><tr>
					<td nowrapnowrap><strong>Can Edit</strong></td>
					<td nowrap><input type="checkbox" name="CAN_EDIT" id="CAN_EDIT" value="8" {if $CAN_EDIT == "8"}checked{/if}></td>
					<td nowrap><em>Bit value 8</em></td>
				</tr>
			</table>
		</td>
		<td width="10"><br></td>
		<td>
			<table class="small" cellpadding="3" cellspacing="0">
				<tr>		
					<td nowrap><strong>Can Delete</strong></td>
					<td nowrap><input type="checkbox" name="CAN_DELETE" id="CAN_DELETE" value="16" {if $CAN_DELETE == "16"}checked{/if}></td>
					<td nowrap><em>Bit value 16</em></td>
				</tr><tr>
					<td nowrap><strong>Can Read Others</strong></td>
					<td nowrap><input type="checkbox" name="CAN_READ_OTHERS" id="CAN_READ_OTHERS" value="32" {if $CAN_READ_OTHERS == "32"}checked{/if}></td>
					<td nowrap><em>Bit value 32</em></td>
				</tr><tr>
					<td nowrap><strong>Can Edit Others</strong></td>
					<td nowrap><input type="checkbox" name="CAN_EDIT_OTHER" id="CAN_EDIT_OTHER" value="64" {if $CAN_EDIT_OTHER == "64"}checked{/if}></td>
					<td nowrap><em>Bit value 64</em></td>
				</tr><tr>
					<td nowrap><strong>Full Admin</strong></td>
					<td nowrap><input type="checkbox" name="SUPER_USER" id="SUPER_USER" value="128" {if $SUPER_USER == "128"}checked{/if}></td>
					<td nowrap><em>Bit value 128</em></td>
				</tr>
			</table>
		</td>
		<td width="10"><br></td>
		<td valign="top">Cite CRM uses bitwise operators for permisions levels. The higher the bit value the more permisions a user has. If you give a user a permision value of 128 that user will have all permisions of the bit value 128 and under.</td>
	</tr><tr>
		<td colspan="3"></td>
	</tr>
</table>
</td></tr></table>
    
<br>
	  
<input type="hidden" name="address_type" value="Home">
<input type="Submit" name="submit" value="Submit">
</form>


{include file="core/footer.tpl"}
