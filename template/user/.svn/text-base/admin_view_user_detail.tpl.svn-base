<!-- adminViewUserDetail -->
{include file="core/header.tpl"}
<input type="hidden" name="user_id" value="{$userObj->getUserID()}" id="user_id">

<script language="javascript" type="text/javascript">
{literal}
function load_page() {
	load_window('Details');
	{/literal}
	{if $user_to_companyObj->fields.company_id < 1}	
		load_window('Address');
	{else}	
		load_window('Account Address');
	{/if}
	{literal}
	
}	

function load_address(address_type) {

	clear_tbs('Address');
	display_progress();
			
	if(address_type == '') {
		var address_type = document.getElementById("select_address_type").value;
	}		
			
	urlVars = {}
	bodyVars = {user_id:user_id,address_type:'Home'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_user_address", bodyVars, urlVars, on_response,false, "a postVars request");
}


// Window Loaders
function load_window(activity,field,sort,next) {
	var user_id = document.getElementById("user_id").value;

	switch (activity){
		case 'Details':
			display_detail_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}	
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_details", bodyVars, urlVars, on_details,false, "a postVars request");		
		break;
		case 'Address':
			clear_tbs('Address');
			display_progress();
			
			if(address_type == '') {
				var address_type = document.getElementById("select_address_type").value;
			}		
			
			urlVars = {}
			bodyVars = {user_id:user_id,address_type:'Home'}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_user_address", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Account Address':
			display_progress();
			if(address_type == '') {
				var address_type = document.getElementById("select_address_type").value;
			}		
			
			urlVars = {}
			bodyVars = {user_id:user_id,address_type:'Home'}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_user_address", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		
		case 'Sytemes':
			clear_tbs('Sytemes');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id,field:field,sort:sort,next:next}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_load_by_user", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Workorders':
			clear_tbs('Workorders');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_load_by_user", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Invoices':
			clear_tbs('Invoices');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}
		break;
		case 'Support':
			clear_tbs('Support');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}
		break;
		case 'Notes':
			clear_tbs('Notes');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_load_by_user", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Files':
			clear_tbs('Files');
			display_progress();
			urlVars = {}
			bodyVars = {user_id:user_id}
		break;
	}
}

function add_note() {
    alert('note');
}

// Edit Windows
function edit_window(activity) {
	var user_id = document.getElementById("user_id").value;
	switch(activity) {
		case 'edit':
            urlVars = {}
            bodyVars = {}
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_edit&user_id=' + user_id, bodyVars, urlVars, on_details,false, "a postVars request");
		break;
		case 'reset_pwd':
            urlVars = {}
            bodyVars = {}
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_reset_pwd&user_id=' + user_id, bodyVars, urlVars, on_details,false, "a postVars request");
		break;
	}
}

function edit_contact() {
    var user_id = document.getElementById("user_id").value;
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_edit_contact&user_id=' + user_id, bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_contact() {
    
    var user_id = document.getElementById("user_id").value;
    var error = false;
	var errorMsg = 'There where errors saving your Contact Information\n';
	var primary_phone = document.getElementById("primary_phone").value;
	var mobile_phone = document.getElementById("mobile_phone").value;
	var secondary_phone = document.getElementById("secondary_phone").value;
  
    var extension =  document.getElementById("extension").value;

    
         // If we have an error stop and show 
        if(error == true) {
            errorMsg = errorMsg + '\nPlease correct the errors and save your Contact';
            alert(errorMsg);
            return false;       
        } else {
            urlVars = {}
            bodyVars = {primary_phone:primary_phone,mobile_phone:mobile_phone,secondary_phone:secondary_phone,user_id:user_id,extension:extension,submit:'save'}
            ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_edit_contact', bodyVars, urlVars, on_response,false, "a postVars request");
            alert('Contact Information was updated');

            {/literal}
            {if $user_to_companyObj->fields.company_id < 1}
                load_window('Address');
            {else}
                load_window('Account Address');
            {/if}
            {literal}
        }


}

function update_contact() {
	var user_id = document.getElementById("user_id").value;
	var user_first_name = document.getElementById("user_first_name").value;
	var user_last_name = document.getElementById("user_last_name").value;
	var user_type_id = document.getElementById("user_type_id").value;
	var user_email = document.getElementById("user_email").value;
	var errorMsg ='There where errors Updating the Contact Information\n';
	var error = false;
	
	if(user_first_name == ''){
		error = true;
		var errorMsg = errorMsg + '-- Please provide the First Name --';
		document.getElementById("user_first_name").className='formError';
	}

	if(user_last_name == '') {
		error = true;
		var errorMsg = errorMsg + '-- Please provide the Last Name --';
		document.getElementById("user_last_name").className='formError';
	}
	
	if(error == 'false'){
		errorMsg = errorMsg + '\nPlease correct the errors and re-save';
		alert(errorMsg);
	} else {

		urlVars = {}
		bodyVars = {user_id:user_id,user_first_name:user_first_name,user_last_name:user_last_name,user_type_id:user_type_id,user_email:user_email,submit:'submit'}
		ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_edit&user_id=' + user_id, bodyVars, urlVars, on_details,false, "a postVars request");
		alert('Contact Information was updated');
		load_window('Details');
	}

}


function reset_password() {
	var user_id = document.getElementById("user_id").value;
	var password = document.getElementById("password").value;
	var verify_password = document.getElementById("verify_password").value;
	var errorMsg ='There where errors Changing the Password\n';
	var error = false;
	
	if(password == '') {
		error = true;
		errorMsg = errorMsg + '-- The Passwords can not be empty --\n';
		document.getElementById("password").className='formError';
	}		
	
	
	if(password !=  verify_password) {
		error = true;
		errorMsg = errorMsg + '-- The Passwords Do not Match --\n';
		document.getElementById("password").className='formError';
		document.getElementById("verify_password").className='formError';
	}
	
	if(error) {
		errorMsg = errorMsg + 'Please Fix the errors and Re-Save\n';
		alert(errorMsg);
	} else {
		urlVars = {}
		bodyVars = {user_id:user_id,password:password,submit:'save'}
		ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_user_reset_pwd', bodyVars, urlVars, on_details,false, "a postVars request");	
		alert('Password Was Reset');
		load_window('Details');		
	}
	
	
}


function map_company_address() {
    var user_id = document.getElementById("user_id").value;
    var company_address_id = document.getElementById("company_address_id").value;

    urlVars = {}
	bodyVars = {user_id:user_id,company_address_id:company_address_id}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_map_company_address', bodyVars, urlVars, on_response,false, "a postVars request");

    alert('Address Added');

     {/literal}
	{if $user_to_companyObj->fields.company_id < 1}	
		load_window('Address');
	{else}	
		load_window('Account Address');
	{/if}
	{literal}

}

function on_details(text, headers, callingContext) {
	document.getElementById("details").innerHTML = text;
}

function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function clear_tbs(activity){
	document.getElementById('Address').className='other';	
	document.getElementById('Notes').className='other';
	document.getElementById('Files').className='other';
	document.getElementById(activity).className='current';
}

function display_detail_progress() {
	document.getElementById("details").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}
{/literal}
</script>

<body onload="load_page()">


{if $user_to_companyObj->fields.company_id > 0}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Contact For Account {$user_to_companyObj->fields.company_id|company_name}</a></li>
</ul>
{else}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Contact: </a></li>
</ul>
{/if}
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
            <div id="details"></div>
        </td>
    </tr>
</table>

<br>

{if $user_to_companyObj->fields.company_id < 1}

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_window('Address','Service');" id="Address">Address</a></li>
    <!--
	<li id="Activities_sp_tab"><a  href="javascript:load_window('Sytemes','system_id','ASC','')" id="Sytemes">Systems</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Workorders','workorder_open_date','DESC','');" id="Workorders">Workorders</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Invoices','invoice_id','ASC','')" id="Invoices">Invoices</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Support','','ASC','')" id="Support">Support Calls</a></li>
    -->
	<li id="Activities_sp_tab"><a href="javascript:load_window('Notes','note_create_date','ASC','')" id="Notes">Notes</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Files','file_create_date','ASC','')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>
{else}
	<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_window('Account Address','Service');" id="Account Address" class="current">Address</a></li>
	</ul>
	
	<div id="spaceBox"></div>
	<div id="contentBox"><br></div>
	<a href="/index.php?page=company:view_company&company_id={$user_to_companyObj->fields.company_id}">Back to Account</a>
{/if}
{include file="core/footer.tpl"}