<!-- add.tpl -->
{include file="core/header.tpl"}


{literal}
<script language="javascript" type="text/javascript">
 function loadUser(){

	lead_status_id = document.getElementById("lead_status_id").value;

	if(lead_status_id == 2) {
		load_user_select();
	} else {
		document.getElementById("select_user").innerHTML = '';
	}
}

// Loaders
function load_user_select() {

	urlVars = {}	
	bodyVars = {}	
	ajaxCaller.postVars("{/literal}{$ROOT_PATH}{literal}/index.php?page=user:ajax_user_select_load", bodyVars, urlVars, on_user_select_load,false, "a postVars request");
}

function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Lead\n';	

    with (thisform){
        // Validate Account Name
        if(document.getElementById("company_name").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Account Name ! --\n';
            document.getElementById("company_name").className='formError';
        }
        
        // Validate Contact id Filled out
        if(document.getElementById("company_contact").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Contact Name ! --\n';
            document.getElementById("company_contact").className='formError';
        }    
    
	    // If we have an error stop and show 
	    if(error == true) {
	        errorMsg = errorMsg + '\nPlease correct the errors and save your Lead';
			alert(errorMsg);
	        return false;       
	    }

	}
}

function on_user_select_load(text, headers, callingContext) {
	document.getElementById("select_user").innerHTML = text;
}

</script>

{/literal}

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Lead Details</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
				<form method="post" action="{$ROOT_URL}/index.php?page=leads:add" id="new_lead" onsubmit="return validate_form(this);">
					<table cellpadding="5" cellspacing="0" class="small" width="600">
						<tr>
							<td class="formAreaTitle">Account Name</td>
							<td class="fieldValue" colspan="3"><input type="text" name="company_name" id="company_name"  size="60"></td>
						</tr><tr>
							<td class="formAreaTitle" valign="top">Lead Type</td>
							<td class="fieldValue" valign="top">{html_select_lead_type value=$lead_type_id}</td>
							<td class="formAreaTitle" valign="top">Lead Status</td>
							<td class="fieldValue" valign="top">{html_select_lead_status value=$lead_status_id}
								<div id="select_user"></div>
							</td>
						</tr><tr>
							<td class="formAreaTitle">Referred By</td>
							<td class="fieldValue"><input type="text" name="lead_referer" value="{$lead_referer}"></td>
							<td class="formAreaTitle">Campaign</td>
							<td class="fieldValue">{html_select_campaign value=$campaign_id}</td>
						</tr><tr>
							<td class="formAreaTitle" colspan="4">Lead Source Description</td>
						</tr><tr>
							<td class="fieldValue" colspan="4"><textarea cols="60" rows="5" name="lead_description">{$lead_description}</textarea></td>
						</tr>
					</table>
        </td>
    </tr>
</table>

<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Service Address</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
					<table cellpadding="5" cellspacing="0" class="small" width="600">
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
							<td class="fieldValue"><input type="text" name="company_postal_code"  size="" id="company_postal_code" value="{$DEFAULT_ZIP}"></td>
						</tr>
					</table>
					<input type="hidden" name="company_address_type" value="Service">

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
				</tr></tr>
					<td class="formAreaTitle">Primary Phone</td>
					<td class="fieldValue"><input type="text" id="business_phone" name="business_phone" size="20"></td>
                </tr><tr>
                    <td class="formAreaTitle">Fax</td>
					<td class="fieldValue"><input type="text" id="business_fax" name="business_fax" size="20"></td>
                </tr>
			</table>
        </td>
    </tr>
</table>

<br>

<input type="submit" name="submit" value="Save">
</form>


{include file="core/footer.tpl"}