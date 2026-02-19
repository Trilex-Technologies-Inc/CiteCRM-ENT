<!-- add_system_frm -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Lead\n';	

    with (thisform){
        if(document.getElementById("system_name").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the System Name ! --\n';
            document.getElementById("system_name").className='formError';
        }

    }

    // If we have an error stop and show 
    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your System';
		alert(errorMsg);
        return false;       
    }
    
}

function cancelManufacture(){
	document.getElementById("manufacture").innerHTML = "{/literal}{html_select_system_manufacture|escape:'javascript' name="system_manufacture_id" div="model" value=$system_manufacture_id}{literal} <input type=\"button\" onclick=\"add_manufacture()\" value=\"+\">";
}

function add_manufacture() {
	document.getElementById("manufacture").innerHTML = "<input type=\"text\" name=\"system_manufacture_id\" id=\"system_manufacture_id\" size=\"30\"><input type=\"hidden\" name=\"add_manufacture\" value=\"1\"> <input type=\"button\" name=\"cancel_manufacture\" id=\"cancel_manufacture\" value=\"-\" onclick=\"cancelManufacture()\" >";
}
function add_operating_system_man(){
	document.getElementById("operating_system_man").innerHTML = "<input type=\"text\" name=\"operating_system_manufacture_id\" id=\"operating_system_manufacture_id\" size=\"30\"> <input type=\"hidden\" name=\"add_operating_system_man\" value=\"1\"> <input type=\"button\" onclick=\"cancel_add_operating_man()\" value=\"-\">";
	add_operating_system();

}
function cancel_add_operating_man(){
	document.getElementById("operating_system_man").innerHTML = "{/literal}{html_select_operating_system_manufacture|escape:'javascript' value=$operating_system_manufacture_id div="operating_system"}{literal} <input type=\"button\" onclick=\"add_operating_system_man()\" value=\"+\">";
}
function add_operating_system(){
	document.getElementById("operating_system").innerHTML = "<input type=\"text\" name=\"opreating_system_id\" id=\"opreating_system_id\" size=\"30\"> <input type=\"hidden\" name=\"add_operating_system\" value=\"1\"> <input type=\"button\" onclick=\"cancel_add_operating()\" value=\"-\">";
}
function cancel_add_operating() {

	document.getElementById("operating_system").innerHTML = "{/literal}{html_select_opreating_system|escape:'javascript' value=$operating_system_id operating_system_manufacture_id=$system->operating_system_manufacture_id}{literal}";
}

</script>
{/literal}

<ul class="subpanelTablist" id="groupTabs">
{if $company_id != ""}
    <li id="All_sp_tab"><a class="current">Add New System to {$company_id|display_company_name}</a></li>
{/if}

{if $user_id != ""}
    <li id="All_sp_tab"><a class="current">Add New System to {$user_id|display_names}</a></li>
{/if}
</ul>


<form method="post" action="{$ROOT_URL}/index.php?page=system:add_system" id="add_system_frm" onsubmit="return validate_form(this);">

<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="system_name" value="{$system_name}" id="system_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Assigned Contact</td>
		<td class="fieldValue">
			<div id="user" name="user">
				{if  $company_id != ""}
					{html_select_company_users value=$user_id() company_id=$company_id}
				{else}
					{$user_id|display_names}
					<input type="hidden" name="user_id" value="{$user_id}">
				{/if}
			</div>
		
		</td>
	</tr><tr>
		<td class="formAreaTitle">Serial Number</td>
		<td class="fieldValue"><input type="text" name="system_serial_num" value="{$system_serial_num}" id="system_serial_num"></td>
	</tr><tr>
		<td class="formAreaTitle">Host Name</td>
		<td class="fieldValue"><input type="text" name="system_host_name" value="{$system_host_name}" id="system_host_name"></td>
	</tr><tr>
		<td class="formAreaTitle">IP Address</td>
		<td class="fieldValue"><input type="text" name="system_ip_address" value="{$system_ip_address}" id="system_system_ip_address"></td>
	</tr><tr>
		<td class="formAreaTitle">Manufacture</td>
		<td class="fieldValue"><div id="manufacture">{html_select_system_manufacture name="system_manufacture_id" div="model" value=$system_manufacture_id} <input type="button" onclick="add_manufacture()" value="+"></div>		
	</td>
	</tr><tr>
		<td class="formAreaTitle">Model</td>
		<td class="fieldValue"><input type="text" name="system_model_id" id="system_model_id" value="{$system_model_id}"></td>
	</tr><tr>
		<td class="formAreaTitle">Opreating System</td>
		<td class="fieldValue"><div id="operating_system_man">
			{html_select_operating_system_manufacture value=$operating_system_manufacture_id div="operating_system"} <input type="button" onclick="add_operating_system_man()" value="+">
			</div>
		</td>
	</tr><tr>
		<td class="formAreaTitle">Operating System Version</td>
		<td class="fieldValue"><div id="operating_system">{html_select_opreating_system value=$operating_system_id operating_system_manufacture_id=$system->operating_system_manufacture_id}</div></td>
	</tr><tr>
		<td class="formAreaTitle">Purchase Date</td>
		<td class="fieldValue">{html_select_date prefix="system_purchase_date" start_year=-10}</td>
	</tr><tr>	
		<td class="formAreaTitle">Purchase Price</td>
		<td class="fieldValue"><input type="text" name="system_purchase_price" value="{$system_purchase_price}" id="system_purchase_price" size="10">
	</tr><tr>
		<td colspan="2">
		<input type="hidden" name="company_id" value="{$company_id}">
		
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
