<!-- search_campaign_type -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">

function on_load() {
	display_list_progress();
	load_campaigns();
}

function load_campaigns() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:ajax_load_campaign_type", bodyVars, urlVars, on_list_response,false, "a postVars request");		
}

function add_campaign_type(){
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:add_campaign_type", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_new_campaign_type(){
	var error = false;
	var errorMsg = 'There where errors saving your Campaign Type\n';
	var campaign_type_text = document.getElementById("campaign_type_text").value;
	var campaign_type_active = document.getElementById("campaign_type_active").value;

	if(campaign_type_text == ''){
		error = true;
		errorMsg = errorMsg + '\nYou Must Provide a Capaign Type Name--\n';
		document.getElementById("campaign_type_text").className='formError';
	}

	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',campaign_type_text:campaign_type_text,campaign_type_active:campaign_type_active}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:add_campaign_type", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Lead Type was added');
		display_list_progress();
		load_campaigns();
	
	}
}

function edit_campaign_type(campaign_type_id) {
	urlVars = {}
	bodyVars = {campaign_type_id:campaign_type_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:update_campaign_type", bodyVars, urlVars, on_response,false, "a postVars request");	
}

function update_campaign_type() {

    var campaign_type_text      = document.getElementById("campaign_type_text").value;
    var campaign_type_active    = document.getElementById("campaign_type_active").value;
    var campaign_type_id        = document.getElementById("campaign_type_id").value;
    var error = false;
    var errorMsg = 'There where errors saving your Campaign Type\n';

    if(campaign_type_text == '') {
        errorMsg = errorMsg + '-- Campaign Type Name is required\n --';
        document.getElementById("campaign_type_text").className='formError';
        error = true;
    }
    if(campaign_type_id < 1) {
        errorMsg = errorMsg + '-- Internal Error No Campaign ID\n --';
        error = true;
    }   

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct your errors and re save';
        alert(errorMsg);
    }else{
        urlVars = {}
        bodyVars = {submit:'submit',campaign_type_text:campaign_type_text,campaign_type_id:campaign_type_id,campaign_type_active:campaign_type_active}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:update_campaign_type", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Campaign Type was updated');
        display_list_progress();
        load_campaigns();
    }
}

function delete_campaign_type(campaign_type_id) {
    var answer = confirm ('Are you sure you want to remove this Campaign Type?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {submit:'submit',campaign_type_id:campaign_type_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign_type:delete_campaign_type", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Type was removed');
        display_list_progress();
        load_campaigns()
    } else {

    }
}

function cancel_add_campaign_type() {
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
	<li id="All_sp_tab"><a class="current">Campaign Types</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
						<a href="javascript:add_campaign_type();">Add Campaign Type</a>	
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
