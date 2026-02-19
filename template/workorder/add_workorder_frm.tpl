<!-- add_workorder_frm -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">
function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Work Order\n';	

    with (thisform){

        if(document.getElementById("workorder_scope").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Work Order Subject! --\n';
            document.getElementById("workorder_scope").className='formError';
        }
        if(document.getElementById("workorder_desription").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Work Order Description! --\n';
            document.getElementById("workorder_desription").className='formError';
        }


        if(document.getElementById("company_id").value == "" && document.getElementById("user_id").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Server Error: No User or Company to assign Work Order to! --\n';
            document.getElementById("workorder_desription").className='formError';
        }
              
    }

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Work Order';
		alert(errorMsg);
        return false;       
    }

}
</script>
{/literal}


<form method="post" action="{$ROOT_URL}/index.php?page=workorder:add_workorder" id="workorder" onsubmit="return validate_form(this);">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Add New Work Order</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
            <table cellpadding="5" cellspacing="0" class="small" width="600">
                <tr>
                    <td class="formAreaTitle">Opened</td>
                    <td class="formAreaTitle">Assigned To</td>
                    <td class="formAreaTitle">System</td>
                </tr><tr>
                    <td class="fieldValue">
                        {html_select_date prefix="Date" time=$sDate end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}
                    </td>
                    <td class="fieldValue">{html_select_employee fieldName="workorder_assigned_to" value=$workorder_assigned_to}</td>
                    <td class="fieldValue">
                         <input type="hidden" name="company_id" id ="company_id" value="{$company_id}">
                         <input type="hidden" name="user_id" id="user_id" value="{$user_id}">
                        {if $company_id != ""}
                            {html_select_company_system company_id=$company_id value=$system_id}                           
                        {/if}
                        
                        {if $user_id !=""}
                            {html_select_user_system user_id=$user_id value=$system_id}
                            
                        {/if}
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Work Order Details</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
            <table cellpadding="5" cellspacing="0" class="small" width="600">
                <tr>
                    <td class="formAreaTitle">Subject</td>
                </tr><tr>
                    <td class="fieldValue">
                        <input type="text" name="workorder_scope" value="{$workorder_scope}" size="70" id="workorder_scope">
                    </td>
                </tr><tr>
                    <td class="formAreaTitle">Desription</td>
                </tr><tr>
                    <td class="fieldValue"><textarea name="workorder_desription" id="workorder_desription" rows="15" cols="70">{$workorder_desription}</textarea></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="Save">
            <br><br>
        </td>
    </tr>
</table>



</form>
{include file="core/footer.tpl"}