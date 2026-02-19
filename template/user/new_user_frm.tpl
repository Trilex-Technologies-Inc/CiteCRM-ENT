<!-- newFrm -->
{include file="core/header.tpl"}

<script language="javascript" src="java/loadState.js" type="text/javascript"></script>


{literal}
<script language="javascript" type="text/javascript">

function validate_form(thisform) {
    var error = false;
	var errorMsg = 'There where errors saving your Contact\n';

    with (thisform){
        // First Name
        if(document.getElementById("user_first_name").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the First Name! --\n';
            document.getElementById("user_first_name").className='formError';
        }
        // Last name
        if(document.getElementById("user_last_name").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the Last Name! --\n';
            document.getElementById("user_last_name").className='formError';
        }
        // Street Address
        if(document.getElementById("address_street").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the Street Address! --\n';
            document.getElementById("address_street").className='formError';
        }
        // City
        if(document.getElementById("address_city").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the City! --\n';
            document.getElementById("address_city").className='formError';
        }
        // State
        if(document.getElementById("address_state").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the State! --\n';
            document.getElementById("address_state").className='formError';
        }
        // Postal Code
        if(document.getElementById("address_postal_code").value == ""){
            error = true;
            errorMsg = errorMsg + '-- Please provide the Postal Code! --\n';
            document.getElementById("address_postal_code").className='formError';
        }
         
    }


     // If we have an error stop and show 
    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Contact';
		alert(errorMsg);
        return false;       
    }

}

</script>
{/literal}



<form method ="POST" action="{$ROOT_URL}/index.php?page=user:add_user"  onsubmit="return validate_form(this);">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Personal Information</a></li>	
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >	
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="formAreaTitle">{$translate_user_first_name}</td>
					<td class="fieldValue" ><input type="text" name="user_first_name" size="20"  id="user_first_name"></td>
				</tr><tr>
					<td class="formAreaTitle">{$translate_user_last_name}</td>
					<td class="fieldValue"><input type="text" name="user_last_name" size="20" id="user_last_name"></td>				
				</tr><tr>
					<td class="formAreaTitle">{$translate_user_email}</td>
					<td class="fieldValue"><input type="text" name="user_email" size="20"></td>
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
					<td class="fieldValue"><input type="text" name="address_street" size="20" id="address_street"></td>
				</tr><tr>
					<td class="formAreaTitle">Street 2</td>
					<td class="fieldValue"><input type="text" name="address_street_2" size="20" id="address_street_2"></td>
				</tr><tr>
					<td class="formAreaTitle">City</td>
					<td class="fieldValue"><input type="text" name="address_city" size="20" id="address_city"></td>
				</tr><tr>
					<td class="formAreaTitle">State</td>
					<td class="fieldValue"><div id="state"><input type="text" name="address_state" id="address_state" value="{$DEFAULT_STATE}"></td>
				</tr><tr>
					<td class="formAreaTitle">Postal Code/Zip</td>
					<td class="fieldValue"><input type="text" name="address_postal_code" size="20" id="address_postal_code" value="{$DEFAULT_ZIP}"></td>
				</tr><tr>
                    <td class="formAreaTitle">Country</td>
                    <td class="fieldValue"><input type="text" name="address_country" id="address_country" value="{$DEFAULT_COUNTRY}"></td>
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
					<td class="formAreaTitle">Primary Phone</td>
					<td class="fieldValue"><input type="text" name="primary_phone" id="primary_phone" value=""></td>
				</tr><tr>
					<td class="formAreaTitle">Secondary Phone</td>
					<td class="fieldValue"><input type="text" name="secondary_phone" id="secondary_phone" value=""></td>
				</tr><tr>
					<td class="formAreaTitle">Mobile Phone</td>
					<td class="fieldValue"><input type="text" name="mobile_phone" id="mobile_phone" value=""></td>
				</tr>
			</table>
        </td>
	</tr>
</table>			

<br>
			
<input type="hidden" name="address_type" value="Home">
<input type="Submit" name="submit" value="Submit">
</form>

{include file="core/footer.tpl"}