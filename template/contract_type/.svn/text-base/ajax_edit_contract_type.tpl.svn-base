<!-- ajax_add_contract_type.tpl -->
{include file="core/header.tpl"}

{literal}
<script type="text/javascript">

function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Account\n';	
	
 with (thisform){

     if(document.getElementById("contract_type_name").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Contract Name! --\n';
        document.getElementById("contract_type_name").className='formError';
     }

     if(document.getElementById("contract_type_rate").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Rate Per Month! --\n';
        document.getElementById("contract_type_rate").className='formError';
     }

    if(document.getElementById("contract_type_term").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Contract Term! --\n';
        document.getElementById("contract_type_term").className='formError';
     }

    if(document.getElementById("contract_type_covered_labor").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Labor Covered By Contract! --\n';
        document.getElementById("contract_type_covered_labor").className='formError';
     }
    
    if(document.getElementById("contract_type_covered_labor_rate").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Labor Rate Per Hour Convered By Contract! --\n';
        document.getElementById("contract_type_covered_labor_rate").className='formError';
     }

    if(document.getElementById("contract_type_non_covered_labor_rate").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Non Covered Labor Rate! --\n';
        document.getElementById("contract_type_non_covered_labor_rate").className='formError';
     }

    if(document.getElementById("contract_type_call_min").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Support Call Minutes Covered By Contract! --\n';
        document.getElementById("contract_type_call_min").className='formError';
     }

    if(document.getElementById("contract_type_call_covered_rate").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Support Call Covered Rate Per Minute! --\n';
        document.getElementById("contract_type_call_covered_rate").className='formError';
     }

    if(document.getElementById("contract_type_call_non_covered_rate").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Support Call Non Covered Rate Per Minutes! --\n';
        document.getElementById("contract_type_call_non_covered_rate").className='formError';
     }

    }

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Contract';
		alert(errorMsg);
        return false;       
    } 

}
}
</script>
{/literal}
<form method="post" action="{$ROOT_URL}/index.php?page=contract_type:ajax_edit_contract_type" onsubmit="return validate_form(this);">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Edit Contract Details</a></li>	
</ul>

<table cellpadding="0" cellspacing="0" class="dataTable">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
					<td class="formAreaTitle">Name</td>
					<td class="fieldValue">&nbsp;&nbsp; <input type="text" name="contract_type_name" id="contract_type_name" size="60"  value="{$contractTypeObj->get_contract_type_name()}"/></td>
				</tr><tr>
                    <td class="formAreaTitle">Rate Per Month</td>
                    <td class="fieldValue">$ <input type="text" name="contract_type_rate" id="contract_type_rate" size="8" value="{$contractTypeObj->get_contract_type_rate()}"/></td>
                </tr><tr>
                    <td class="formAreaTitle">Contract Term</td>
                    <td class="fieldValue">&nbsp;&nbsp; <input type="text" name="contract_type_term" id="contract_type_term" size="2" value="{$contractTypeObj->get_contract_type_term()}"/> (Months)</td>
                </tr><tr>
                    <td class="formAreaTitle">Labor Covered By Contract</td>
                    <td class="fieldValue">&nbsp;&nbsp; <input type="text" name="contract_type_covered_labor" id="contract_type_covered_labor" size="4" value="{$contractTypeObj->get_contract_type_covered_labor()}"/> (Hours)</td>
                </tr><tr>
                    <td class="formAreaTitle">Labor Rate Per Hour Convered By Contract</td>
                    <td class="fieldValue">$ <input type="text" name="contract_type_covered_labor_rate" id="contract_type_covered_labor_rate" size="8" value="{$contractTypeObj->get_contract_type_covered_labor_rate()}"/></td>
                </tr><tr>
                    <td class="formAreaTitle">Non Covered Labor Rate</td>
                    <td class="fieldValue">$ <input type="text" name="contract_type_non_covered_labor_rate" id="contract_type_non_covered_labor_rate" size="8" value="{$contractTypeObj->get_contract_type_non_covered_labor_rate()}"/></td>
                </tr><tr>
                    <td class="formAreaTitle">Support Call Minutes Covered By Contract</td>
                    <td class="fieldValue">&nbsp;&nbsp; <input type="text" name="contract_type_call_min" id="contract_type_call_min" size="6" value="{$contractTypeObj->get_contract_type_call_min()}"/> (Minutes)</td>
                </tr><tr>
                    <td class="formAreaTitle">Support Call Covered Rate Per Minute</td>
                    <td class="fieldValue">$ <input type="text" name="contract_type_call_covered_rate" id="contract_type_call_covered_rate" size="8" value="{$contractTypeObj->get_contract_type_call_covered_rate()}"/></td>
                </tr><tr>
                    <td class="formAreaTitle">Support Call Non Covered Rate Per Minute</td>
                    <td class="fieldValue">$ <input type="text" name="contract_type_call_non_covered_rate" id="contract_type_call_non_covered_rate" size="8" value="{$contractTypeObj->get_contract_type_call_non_covered_rate()}"/></td>
                </tr>
    
            </table>
        </td>
    </tr>
</table>
<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Contract Text</a></li>	
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
					<td class="formAreaTitle" colspan="2">Description</td>
                </tr><tr>
                    <td class="fieldValue" colspan="2"><textarea name="contract_type_text"  cols="75" rows="10">{$contractTypeObj->get_contract_type_text()}</textarea></td>
                </tr><tr>
                    <td class="formAreaTitle">Active</td>
                    <td class="fieldValue">{html_select_yesno fieldName="contract_type_active" value=$contractTypeObj->get_contract_type_active()}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
                    

<br>
<input type="hidden" name="contract_type_id" value="{$contractTypeObj->get_contract_type_id()}">
<input type="submit" name="submit" value="Save">
</form>
{include file="core/footer.tpl"}
