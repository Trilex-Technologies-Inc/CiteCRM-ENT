<!-- search_billing_rates -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function on_load() {
	display_list_progress();
	load_billing_rates();
}

function load_billing_rates() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:ajax_load_billing_rates", bodyVars, urlVars, on_list_response,false, "a postVars request");
}



function add_billing_rate() {
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:add_billing_rates", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_new_billing_rate() {
	var billing_rate_text = document.getElementById("billing_rate_text").value;
	var billing_rate_amount = document.getElementById("billing_rate_amount").value;
	var billing_rate_active = document.getElementById("billing_rate_active").value;
	var error = false;
	var errorMsg = 'There where errors saving your Billing Rate\n';
	
	if(billing_rate_text == '') {
		errorMsg = errorMsg + '-- Billing Rate Name  is required\n --';
		document.getElementById("billing_rate_text").className='formError';
		error = true;
	}	
	if(billing_rate_amount == '') {
		errorMsg = errorMsg + '-- Billing Rate Amount is required\n --';
		document.getElementById("billing_rate_amount").className='formError';
		error = true;
	}
	
	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',billing_rate_text:billing_rate_text,billing_rate_amount:billing_rate_amount,billing_rate_active:billing_rate_active}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:add_billing_rates", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Billing Rate was Added');
		display_list_progress();
		load_billing_rates();
	}
}

function save_billing_rate() {
	var billing_rate_text = document.getElementById("billing_rate_text").value;
	var billing_rate_amount = document.getElementById("billing_rate_amount").value;
	var billing_rate_active = document.getElementById("billing_rate_active").value;
	var billing_rates_id = document.getElementById("billing_rates_id").value;
	
	var error = false;
	var errorMsg = 'There where errors saving your Billing Rate\n';
	
	if(billing_rate_text == '') {
		errorMsg = errorMsg + '-- Billing Rate Name  is required\n --';
		document.getElementById("billing_rate_text").className='formError';
		error = true;
	}	
	if(billing_rate_amount == '') {
		errorMsg = errorMsg + '-- Billing Rate Amount is required\n --';
		document.getElementById("billing_rate_amount").className='formError';
		error = true;
	}
	if(billing_rates_id == '') {
		errorMsg = errorMsg + '-- Internal Error No Billing Rate ID\n --';
		document.getElementById("billing_rates_id").className='formError';
		error = true;
	}
	
	if(error == true) {
		errorMsg = errorMsg + '\nPlease correct your errors and re save';
		alert(errorMsg);
	}else{
		urlVars = {}
		bodyVars = {submit:'submit',billing_rate_text:billing_rate_text,billing_rate_amount:billing_rate_amount,billing_rate_active:billing_rate_active,billing_rates_id:billing_rates_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:update_billing_rates", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Your Billing Rate was updated');
		display_list_progress();
		load_billing_rates();
	}
	
	
}


function edit_billing_rate(billing_rate_id) {
	urlVars = {}
	bodyVars = {billing_rate_id:billing_rate_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:update_billing_rates", bodyVars, urlVars, on_response,false, "a postVars request");
}

function delete_billing_rate(billing_rates_id){
	var answer = confirm ('Are you sure you want to remove this Billing Rate?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {submit:'submit',billing_rates_id:billing_rates_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=billing_rates:delete_billing_rates", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('The Billing Rate was removed');
        display_list_progress();
        load_billing_rates();
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
	<li id="All_sp_tab"><a class="current">Billing Rates</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
						<a href="javascript:add_billing_rate();">Add Billing Rate</a>	
						<div id="contentBox"></div>
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
