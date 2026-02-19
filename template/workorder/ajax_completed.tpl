<!-- ajax_completed.tpl -->
{include file="core/header.tpl"}

<script language="javascript" type="text/javascript">
{literal}

function cancel() {
    var workorder_id = document.getElementById("workorder_id").value;
    window.location='{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:view_workorder&workorder_id='+workorder_id;
}

function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Work Order\n';	

    with (thisform){
         if(document.getElementById("workorder_resolution").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Work Order Resolution! --\n';
            document.getElementById("workorder_resolution").className='formError';
        }

    }

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Work Order';
		alert(errorMsg);
        return false;       
    }

}

    
{/literal}
</script>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Complete Work Order #{$workorderObj->get_workorder_id()}</a></li>
</ul>
<form method="post" action="{$ROOT_URL}/index.php?page=workorder:complete_workorder" onsubmit="return validate_form(this);">
{if $company->get_company_id() != ""}
	<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
		<tr>
			<td class="productListing-data">
                <table width="100%" class="small">
                    <tr>
                        <td>
                            <input type="hidden" name="account_type" id="account_type" value="company_id">
                            <input type="hidden" name="account_type_id" id="account_type_id" value="{$company->get_company_id()}">
                            <a href="index.php?page=company:view_company&company_id={$company->get_company_id()}">{$company->get_company_name()}</a><br>
                            {$company_address->get_company_street_1()}<br>
                            {if $company_address->get_company_street_2() !=""}
                                {$company_address->get_company_street_2()}<br>
                            {/if}
                            {$company_address->get_company_city()}, {$company_address->get_company_state()|state_name} {$company_address->get_company_postal_code()}
                            <a href="#" onclick="window.open('index.php?page=core:map&toAddress={$company_address->get_company_street_1()} {$company_address->get_company_city()}, {$company_address->get_company_state()|state_name} {$company_address->get_company_postal_code()} ','mywindow','scrollbars=1,menubar=1,resizable=1,width=650,height=550');">Map</a><br>
                            <br>
                            {if $workorderObj->get_workorder_start_time() > 0}
                                <div id="schedual_window">
                                    Scheduled For: <b>{$workorderObj->get_workorder_start_time()|link_date_time}</b> T0:  <b>{$workorderObj->get_workorder_end_time()|link_date_time}</b>
                                </div>
                            {/if}                          
                        </td>
                        <td width="5"><br></td>
                        <td>{fetch_workorder_totals workorder_id=$workorderObj->get_workorder_id()}


                        </td>
                    </tr>
                </table>
                    
			</td>
            
		</tr>
	</table>
    
{/if}

{* User Work order *}
{if $user != ""}
	<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
		<tr>
			<td class="productListing-data">
			     <input type="hidden" name="account_type" id="account_type" value="user_id">
                 <input type="hidden" name="account_type_id" id="account_type_id" value="{$user->getUserID()}">
				<a href="index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}">{$user->getUserID()|display_names}</a><br>
				{$user_address->getAddressStreet()}<br>
				{if $user_address->getAddressStreet2() !=""}
					{$user_address->getAddressStreet2()}<br>
				{/if}
				{$user_address->getAddressCity()}, {$user_address->getAddressState()} {$user_address->getAddressPostalCode()}<br>
			
				<br><br>
			
				{if $workorderObj->get_workorder_start_time() > 0}
					<div id="schedual_window">
						Scheduled For: <b>{$workorderObj->get_workorder_start_time()|link_date_time}</b> T0: <b>{$workorderObj->get_workorder_end_time()|link_date_time}</b>
                    </div>
				{/if}
			</td>
		</tr>
	</table>
{/if}

<br>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Work Order Resolution</a></li>
</ul>

<table cellpadding="5" cellspacing="0" class="productListing"" width="100%">
	<tr>
		<td class="productListing-data">
			<table width="100%" class="small">
				<tr>
					<td>
                        <table class="productListing-data">
                            <tr>
                                <td class="formAreaTitle">Date Closed</td>
                                <td class="fieldValue">{html_select_date}</td>
                            </tr><tr>
                                <td class="formAreaTitle">Closed By</td>
                                <td class="fieldValue">{html_select_employee value=$SESSION_USER_ID}</td>
                            </tr><tr>
                                <td colspan="2" class="formAreaTitle">Work Preformed</td>
                            </tr><tr>
                                <td colspan="2" class="fieldValue"><textarea cols="100" rows="10" id="workorder_resolution" name="workorder_resolution"></textarea></td>

                            </tr>
                        </table>
                   </td>
				</tr>
			</table>

		</td>
	</tr>
</table>
<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Work Order Charge Details</a></li>
</ul>
<div id="spaceBox"></div>
<br>
            <table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
                <tr>
                    <td class="productListing-heading">Type</td>
                    <td class="productListing-heading">Qty</td>
                    <td class="productListing-heading">Description</td>
                    <td class="productListing-heading">Amount</td>
                    <td class="productListing-heading">Sub Total</td>
                </tr>
                {foreach from=$labor_array item=labor}
                <tr>
                    <td class="productListing-data" >Labor</td>
                    <td class="productListing-data">{$labor->fields.workorder_time_total|string_format:"%.2f"}</td>
                    <td class="productListing-data">{$labor->fields.workorder_time_description}</td>
                    <td class="productListing-data" align="right">${$labor->fields.workorder_time_rate|string_format:"%.2f"}</td>
                    <td class="productListing-data" align="right">${$labor->fields.workorder_time_amount|string_format:"%.2f"}</td>
                </tr>
                {/foreach}
                {foreach from=$part_array item=part}
                <tr>
                    <td class="productListing-data">Parts</td>
                    <td class="productListing-data">{$part->fields.product_to_workorder_qty}</td>
                    <td class="productListing-data">{$part->fields.product_to_workorder_description}</td>
                    <td class="productListing-data" align="right">${$part->fields.product_to_workorder_amount|string_format:"%.2f"}</td>
                    <td class="productListing-data" align="right">${$part->fields.product_to_workorder_sub_total|string_format:"%.2f"}</td>
                </tr>
                {/foreach}
                {foreach from=$service_array item=service}
                <tr>
                    <td class="productListing-data">Service</td>
                    <td class="productListing-data">{$service->get_workorder_service_qty()}</td>
                    <td class="productListing-data">{$service->get_workorder_service_description()}</td>
                    <td class="productListing-data" align="right">${$service->get_workorder_service_amount()}</td>
                    <td class="productListing-data" align="right">${$service->get_workorder_service_total()}</td>           
                </tr>
                {/foreach}
                <tr>
                    <td class="productListing-data" colspan="4" align="right">Total</td>
                    <td class="productListing-data" align="right">${$workorder_total|string_format:"%.2f"}</td>
                </tr>
            </table>

<br>
<span class="small">Be sure you have added all charges in the workorder. Invoiced items will be generated from the items above. </span>
<br><br>

<input type="hidden" name="workorder_id" id="workorder_id" value="{$workorderObj->get_workorder_id()}">
<input type="submit" name="submit" value="Save">
<input type="button" name="cancel" value="cancel" onclick="cancel()">

{include file="core/footer.tpl"}