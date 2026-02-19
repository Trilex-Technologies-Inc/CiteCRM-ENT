<!-- search_user_type -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">
function on_load() {
	display_list_progress();
	load_contact_types();
}


function load_contact_types() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:ajax_load_user_type", bodyVars, urlVars, on_list_response,false, "a postVars request");	
}

function add_contact_type() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:add_user_type", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_new_user_type(){
	var error = false;
	var errorMsg = 'There where errors saving your Contact Type\n';
	var user_type_text = document.getElementById("user_type_text").value;
	
	if(user_type_text == '') {
		errorMsg = errorMsg + '-- Contact Type  is required\n --';
		document.getElementById("user_type_text").className='formError';
		error = true;
	}
	
	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',user_type_text:user_type_text}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:add_user_type", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Contact Type was added');
		display_list_progress();
		load_contact_types();
	
	}

}

function edit_user_type(user_type_id) {
	if(user_type_id == '1' || user_type_id == '3'){
		if(user_type_id == '1'){
			alert('You can Not Edit the Employee Contact Type. It is required by the system');
		}
		if(user_type_id == '3'){
			alert('You can Not Edit the Account Contact Type. It is required by the system');
		}
	} else {
		urlVars = {}
		bodyVars = {user_type_id:user_type_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:update_user_type", bodyVars, urlVars, on_response,false, "a postVars request");	
	}
		
}

function save_user_type() {
	var user_type_text = document.getElementById("user_type_text").value;
	var user_type_id = document.getElementById("user_type_id").value;
	var error = false;
	var errorMsg = 'There where errors saving your Contact Type\n';
	
	if(user_type_text == '') {
		errorMsg = errorMsg + '-- Contact Type  is required\n --';
		document.getElementById("user_type_text").className='formError';
		error = true;
	}
	
	if(user_type_id < 1) {
		errorMsg = errorMsg + '-- Internal Error No Contact Type ID --\n'
		document.getElementById("user_type_id").className='formError';
		error = true;			
		
	}
	
	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',user_type_text:user_type_text,user_type_id:user_type_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:update_user_type", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Contact Type was added');
		display_list_progress();
		load_contact_types();
	
	}
}

function delete_user_type(user_type_id) {
	var answer = confirm ('Are you sure you want to remove this Contact Type?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {submit:'submit',user_type_id:user_type_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user_type:delete_user_type", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Type was removed');
        display_list_progress();
        load_contact_types();
    } else {

    }
	
}

function cancel_edit() {
	document.getElementById("contentBox").innerHTML = "";
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}
function on_list_response(text, headers, callingContext) {
	document.getElementById("listBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}
function display_list_progress() {
	document.getElementById("listBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}
</script>
{/literal}

<body onload="on_load();">


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Contact Types</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
						<a href="javascript:add_contact_type();">Add Contact Type</a>	
						<div id="contentBox"></div>
					</td>
					<td>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>	
<div id="listBox"></div>

<br>
<span class="small">Double click row to edit.</span>
	




{include file="core/footer.tpl"}
