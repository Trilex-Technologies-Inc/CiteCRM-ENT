<!-- search_lead_type -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function on_load() {
	display_list_progress();
	load_leads()
}


function load_leads() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:ajax_load_lead_type", bodyVars, urlVars, on_list_response,false, "a postVars request");	
}


function add_lead(){
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:add_lead_type", bodyVars, urlVars, on_response,false, "a postVars request");
}

function cancel_add_lead() {
	document.getElementById("contentBox").innerHTML = "";
}

function save_new_lead(){
	var lead_type_text = document.getElementById("lead_type_text").value;
	var lead_type_active = document.getElementById("lead_type_active").value;
	var error = false;
	var errorMsg = 'There where errors saving your Lead Type\n';
	
	if(lead_type_text == '') {
		errorMsg = errorMsg + '-- Lead Type Name is required\n --';
		document.getElementById("lead_type_text").className='formError';
		error = true;
	}
	
	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',lead_type_text:lead_type_text,lead_type_active:lead_type_active}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:add_lead_type", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Lead Type was added');
		display_list_progress();
		load_leads();
	
	}
	
}

function edit_lead_type(lead_type_id) {
	urlVars = {}
	bodyVars = {lead_type_id:lead_type_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:update_lead_type", bodyVars, urlVars, on_response,false, "a postVars request");	
}

function update_lead_type() {

    var lead_type_text      = document.getElementById("lead_type_text_1").value;
    var lead_type_active    = document.getElementById("lead_type_active").value;
    var lead_type_id        = document.getElementById("lead_type_id").value;
    var error = false;
    var errorMsg = 'There where errors saving your Lead Type\n';

    if(lead_type_text == '') {
        errorMsg = errorMsg + '-- Lead Type Name is required\n --';
        document.getElementById("lead_type_text_1").className='formError';
        error = true;
    }
    if(lead_type_id < 1) {
        errorMsg = errorMsg + '-- Internal Error No Lead ID\n --';
        error = true;
    }   

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct your errors and re save';
        alert(errorMsg);
    }else{
        urlVars = {}
        bodyVars = {submit:'submit',lead_type_text:lead_type_text,lead_type_active:lead_type_active,lead_type_id:lead_type_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:update_lead_type", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Type was updated');
        display_list_progress();
        load_leads();
    }
}


function delete_lead_type(lead_type_id) {
    var answer = confirm ('Are you sure you want to remove this Lead Type?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {submit:'submit',lead_type_id:lead_type_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_type:delete_lead_type", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Type was removed');
        display_list_progress();
        load_leads();
    } else {

    }
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
	<li id="All_sp_tab"><a class="current">Lead Types</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
						<a href="javascript:add_lead();">Add Lead Type</a>	
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
