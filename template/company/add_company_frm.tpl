<!-- add_company_frm -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">

function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Account\n';	

    with (thisform){

        

         // Validate Accout Name
         if(document.getElementById("company_name").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Account Name ! --\n';
            document.getElementById("company_name").className='formError';
        }

        // Validate Street Address
        if(document.getElementById("company_street_1").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Street Address! --\n';
            document.getElementById("company_street_1").className='formError';
        }

        // City
        if(document.getElementById("company_city").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the City! --\n';
            document.getElementById("company_city").className='formError';
        }

        if(document.getElementById("state_name").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the State! --\n';
            document.getElementById("state_name").className='formError';
        }

        // Postal code
        if(document.getElementById("company_postal_code").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Postal Code! --\n';
            document.getElementById("company_postal_code").className='formError';
        }
    
    
    }




    // If we have an error stop and show 
    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Account';
		alert(errorMsg);
        return false;       
    }
}

</script>
{/literal}



<form method="post" action="{$ROOT_URL}/index.php?page=company:add_company" id="add_company_frm" onsubmit="return validate_form(this);">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Company Information</a></li>	
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="formAreaTitle">Name</td>
					<td class="fieldValue"><input type="text" name="company_name" value="{$company_name}" size="" id="company_name"></td>
				</tr><tr>
					<td class="formAreaTitle">Website</td>
					<td class="fieldValue"><input type="text" name="company_website" value="{$company_website}" size="" id="company_website"></td>
				</tr><tr>
					<td class="formAreaTitle">Active</td>
					<td class="fieldValue">{html_select_yesno fieldName="company_active" value="1"}</td>
				</tr><tr>
					<td class="formAreaTitle">Assigned To</td>
					<td class="fieldValue">{html_select_employee fieldName="company_assgned_to"}</td>
				</tr>
			</table>

		</td>
	</tr>
</table>


<br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Service Address</a></li>	
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
		
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="formAreaTitle">Street</td>
					<td class="fieldValue"><input type="text" name="company_street_1" value="{$company_street_1}" size="" id="company_street_1"></td>
				</tr><tr>
					<td class="formAreaTitle">Street 2</td>
					<td class="fieldValue"><input type="text" name="company_street_2" value="{$company_street_2}" size="" id="company_street_2"></td>
				</tr><tr>
					<td class="formAreaTitle">City</td>
					<td class="fieldValue"><input type="text" name="company_city" value="{$COMPANY_CITY}" size="" id="company_city"></td>
				</tr><tr>
					<td class="formAreaTitle">State</td>
					<td class="fieldValue"><input type="text" name="state_name" id="state_name" value="{$DEFAULT_STATE}"></td>
				</tr><tr>
					<td class="formAreaTitle">Postal Code</td>
					<td class="fieldValue"><input type="text" name="company_postal_code" value="{$DEFAULT_ZIP}" size="" id="company_postal_code"></td>
				</tr><tr>
                    <td class="formAreaTitle">Country</td>
                    <td class="fieldValue"><input type="text" name="company_country" id="company_country" value="{$DEFAULT_COUNTRY}"></td>
                </tr>
			</table>
		</td>
	</tr>
</table>


<br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Primary Contact</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >								
            <table cellpadding="5" cellspacing="0" class="small" width="600">
                <tr>
                    <td class="formAreaTitle" >Contact Name</td>
                    <td class="fieldValue" >
                        <input type="text" name="company_contact" id="company_contact" size="20" /></td>
				</tr><tr>
					<td class="formAreaTitle">Contact Email</td>
					<td class="fieldValue"><input type="text" name="company_email" size="20" value=""></td>
				</tr><tr>
					<td class="formAreaTitle">Primary Phone</td>
					<td class="fieldValue"><input type="text" name="business_phone" id="business_phone" value=""></td>
				</tr><tr>
					<td class="formAreaTitle">Fax</td>
					<td class="fieldValue"><input type="text" name="business_fax" id="business_fax" value=""></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>

<input type="hidden" name="company_address_type" value="Service">
<input type="hidden" name="company_contact_type" value="Business Phone"  id="company_contact_type">
<input type="submit" name="submit" value="Save">
</form>


{include file="core/footer.tpl"}
