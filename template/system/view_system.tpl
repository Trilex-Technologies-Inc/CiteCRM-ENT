<!-- view_system -->
{include file="core/header.tpl"}
<input type="hidden" name="barcode_string" id="barcode_string" value="SYS{$system->get_system_id()}">

<input type="hidden" id="system_id" value="{$system->get_system_id()}">

<script language="javascript" type="text/javascript">
{literal}

function load_page() {
	load_system_details();
	load_window('Workorders','workorder.workorder_id','ASC','1');
}

function load_system_details() {
	var system_id = document.getElementById('system_id').value;
	display_system_details_progress();
	urlVars = {}
	bodyVars = {system_id:system_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_load_system_details", bodyVars, urlVars, on_system_details_load,false, "a postVars request");
}


function load_window(activity,field,sort,next){
	var system_id = document.getElementById('system_id').value;
	clear_tbs(activity);
	display_progress();
	switch (activity) {
		case 'Workorders':
			urlVars = {}
			bodyVars = {system_id:system_id,field:field,sort:sort,next:next}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_load_system_workorders", bodyVars, urlVars, on_response,false, "a postVars request");
		break;

	}
	
}

function delete_system(system_id){
	var company_id = document.getElementById('company_id').value;
	var answer = confirm ('Are you sure you want to Delete this System?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {system_id:system_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:delete_system", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('The System was Deleted');
		display_system_details_progress();
		window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=company:view_company&company_id="+company_id;
    } else {

    }
}


function load_audit() {
	clear_tbs('SystemAudit');
	var system_id = document.getElementById('system_id').value;
	urlVars = {}
	bodyVars = {system_id:system_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_load_system_audit", bodyVars, urlVars, on_response,false, "a postVars request");
	
}

function add_audit(){
	clear_tbs('SystemAudit');
	var system_id = document.getElementById('system_id').value;
	urlVars = {}
	bodyVars = {system_id:system_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_add_system_audit", bodyVars, urlVars, on_response,false, "a postVars request");
}

function edit_system() {
    var system_id = document.getElementById('system_id').value;
    urlVars = {}
    bodyVars = {system_id:system_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_edit_system", bodyVars, urlVars, on_system_details_load,false, "a postVars request");

}

function update_system() {
    var system_id = document.getElementById('system_id').value;
    var system_name = document.getElementById("system_name").value;
    var system_serial_num = document.getElementById("system_serial_num").value;
    var system_host_name = document.getElementById("system_host_name").value;
    var system_manufacture_id = document.getElementById("system_manufacture_id").value;
    var operating_system_manufacture_id = document.getElementById("operating_system_manufacture_id").value;
    var operating_system_id = document.getElementById("operating_system_id").value;
    var system_ip_address = document.getElementById("system_ip_address").value;
    var system_model_id = document.getElementById("system_model_id").value;
    var system_purchase_date = document.getElementById("system_purchase_date").value;
    var system_purchase_price = document.getElementById("system_purchase_price").value;
    var system_last_service = document.getElementById("system_last_service").value;
    var system_active = document.getElementById("system_active").value;
    var user_id = document.getElementById("system_active").value;

    var error = false;
	var errorMsg = 'There where errors saving your Contact\n';	

    if(system_name == "") {
        errorMsg = errorMsg + '-- Please Provide The System Name! --\n';
		error = true;
        document.getElementById("system_name").className='formError';
    }
    

    if(error == false) {
         urlVars = {}
        bodyVars = {user_id:user_id,system_id:system_id,system_name:system_name,system_serial_num:system_serial_num,system_host_name:system_host_name,system_manufacture_id:system_manufacture_id,operating_system_manufacture_id:operating_system_manufacture_id,operating_system_id:operating_system_id,system_ip_address:system_ip_address,system_model_id:system_model_id,system_purchase_date:system_purchase_date,system_purchase_price:system_purchase_price,system_purchase_price:system_purchase_price,system_last_service:system_last_service,system_active:system_active,submit:'submit'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_edit_system", bodyVars, urlVars, on_system_details_load,false, "a postVars request");
        alert('System Details was updated');
        load_system_details();

    } else {
        errorMsg = errorMsg + '\nPlease correct the errors and save your System Details';
		alert(errorMsg);
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





function load_operating_system() {
	urlVars = {}
	bodyVars = {operating_system_manufacture_id: document.getElementById("operating_system_manufacture_id").value}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system:ajax_fetch_operating_system&escape=1", bodyVars, urlVars, on_response_operating_system,false, "a postVars request");
}


function on_response_operating_system(text, headers, callingContext) {
    document.getElementById("operating_system").innerHTML = text;
}

function on_system_details_load(text, headers, callingContext) {
	document.getElementById("system_details").innerHTML = text;
}

function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}


function clear_tbs(activity){
	document.getElementById('Workorders').className='other';
	document.getElementById('SystemAudit').className='other';
	document.getElementById(activity).className='current';
}

// Progress windows
function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

// SYstem Ifo progress
function display_system_details_progress() {
	document.getElementById("system_details").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function bookmark() {
    var system_id = document.getElementById('system_id').value;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    var bookmark_description = 'System #' + system_id;
    urlVars = {}
    bodyVars = {user_id:user_id,bookmark_type:'System',bookmark_description:bookmark_description,bookmark_type_id:system_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:add_bookmark", bodyVars, urlVars, false ,false, "a postVars request");
    alert('New Bookmark added:' + bookmark_description);
}

{/literal}
</script>

<body onload="load_page()">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">System ID# {$system->get_system_id()}</a></li>
	<li>
		{if $company_id != ""}
			<a href="index.php?page=workorder:add_workorder&company_id={$company_id}&system_id={$system_id}"><img src="images/icons/sinfo_16.gif" alt="New Work Order" border="0" align="middle"> New Workorder</a>
		{else}
			<a href="index.php?page=workorder:add_workorder&user_id={$user_id}&system_id={$system_id}"><img src="images/icons/sinfo_16.gif" alt="New Work" border="0" alt="New Work Order">New Workorder</a>
		{/if}
		<a href="javascript:edit_system()"><img src="images/icons/edit_16.gif" border="0" align="middle" alt="Edit System">Edit</a>
		<a href="javascript:delete_system('{$system_id}')"><img src="images/icons/del_16.gif" border="0" align="middle" alt="Delete System">Delete</a>
        <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark System">&nbsp;Bookmark</a>
	</li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" ><div id="system_details"></div></td>
    </tr>
</table>

<br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Owner</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td valign="top" width="50%">
			<table cellpadding="0" cellspacing="3" class="small">
				<tr>
					<td>
					{if $company->get_company_id() != ""}
						<input type="hidden" id="company_id" value="{$company->get_company_id()}">
						<a href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$company->get_company_id()}">{$company->get_company_name()}</a>
						<br>

						{if $user->getUserID() != ""}
						<br>
						<span class="greetUser">System Assigned To:</span> <a href="/index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}">{$user->getUserFirstName()} {$user->getUserLastName()}</a>
						<br>
						{/if}
					{else}
						<span class="greetUser">System Owned By: </span>
						<a href="{$ROOT_URL}/index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}">{$user->getUserFirstName()} {$user->getUserLastName()}</a>
							<br>

					{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_window('Workorders','','ASC','1')" id="Workorders">Workorders</a></li>
	<li id="All_sp_tab"><a  href="javascript:load_audit();" id="SystemAudit">System Audit</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>


<br>



{include file="core/footer.tpl"}
