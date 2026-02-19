<!-- search_contract_type -->
{include file="core/header.tpl"}


{literal}
<script type="text/javascript">

function searchContract() {
	display_progress()
	var urlVars;
	var bodyVars;

	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=contract_type:ajax_search_contract_type", bodyVars, urlVars, display_pannel,false, "a postVars request");
}


function add_contract_type(){
    urlVars = {};
    bodyVars = {};
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=contract_type:ajax_add_contract_type", bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function save_contract_type(){
	var error = false;
	var errorMsg = 'There where errors saving your Contract\n';	
	var contract_type_name = document.getElementById("contract_type_name").value;
	var contract_type_rate = document.getElementById("contract_type_rate").value;
	var contract_type_term = document.getElementById("contract_type_term").value;

     if(contract_type_name == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Contract Name! --\n';
        document.getElementById("contract_type_name").className='formError';
     }

     if(contract_type_rate == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Rate Per Month! --\n';
        document.getElementById("contract_type_rate").className='formError';
     }

    if(contract_type_term == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Contract Term! --\n';
        document.getElementById("contract_type_term").className='formError';
     }

   

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Contract';
		alert(errorMsg);
        return false;       
    } 
	
	
}

function display_progress() {
	document.getElementById("listBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}



// Window Display
function display_pannel(text, headers, callingContext) {
	document.getElementById("listBox").innerHTML = text;
}


</script>
{/literal}


<body onload="searchContract()">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Contract Types</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
						<a href="javascript:add_contract_type();">Add Contract Type</a>	
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


{include file="core/footer.tpl"}
