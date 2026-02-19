<!-- search_payment_option -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function on_load() {
	display_progress();
	load_payment_options()
}

function load_payment_options(){
	
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=payment_option:ajax_load_payment_option", bodyVars, urlVars, on_response,false, "a postVars request");
}

function edit_edit_payment_option(payment_option_id,payment_option_active) {
	
	if(payment_option_active == 1){
		payment_option_active = 0;
	} else {
		payment_option_active = 1;
	}
	
	urlVars = {}
	bodyVars = {payment_option_active:payment_option_active,payment_option_id:payment_option_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=payment_option:update_payment_option", bodyVars, urlVars, on_response,false, "a postVars request");
	alert('Payment Option was updated');
	load_payment_options()
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

</script>
{/literal}

<body onload="on_load();">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Payment Options</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><br></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>	
<div id="contentBox"></div>

<br>
<span class="small">Double click row to Activate/Deactivate.</span>




{include file="core/footer.tpl"}
