<!-- load_all.tpl -->
{include file="core/header.tpl"}

<script language="javascript" type="text/javascript">
{literal}

function load_page() {
    view_all()
}

function add_service_frm() {
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars("index.php?page=service:ajax_add_service_frm", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_new_service() {
    var service_name = document.getElementById("service_name").value;
    var service_amount = document.getElementById("service_amount").value;
    var service_active = document.getElementById("service_active").value;
    var errorMsg ='There where errors saving your Service\n';
    var error = false;

    if(service_name == '') {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Service Name --\n';
        document.getElementById("service_name").className='formError';
    }

    if(service_amount == '') {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Service Amount --\n';
        document.getElementById("service_amount").className='formError';
    }

    if(error){
        errorMsg = errorMsg + '\nPlease correct the errors and re-save your Service';
        alert(errorMsg);
    } else {
        urlVars = {}
        bodyVars = {service_name:service_name,service_amount:service_amount,service_active:service_active,submit:'save'}
        ajaxCaller.postVars("index.php?page=service:ajax_add_service_frm", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your new Service was Saved.');
        load_page();
    }
}

function update_service() {
	var service_name = document.getElementById("service_name").value;
    var service_amount = document.getElementById("service_amount").value;
    var service_active = document.getElementById("service_active").value;
    var service_id = document.getElementById("service_id").value;
    var errorMsg ='There where errors saving your Service\n';
    var error = false;

    if(service_name == '') {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Service Name --\n';
        document.getElementById("service_name").className='formError';
    }

    if(service_amount == '') {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Service Amount --\n';
        document.getElementById("service_amount").className='formError';
    }

    if(error){
        errorMsg = errorMsg + '\nPlease correct the errors and re-save your Service';
        alert(errorMsg);
    } else {
        urlVars = {}
        bodyVars = {service_id:service_id,service_name:service_name,service_amount:service_amount,service_active:service_active,submit:'save'}
        ajaxCaller.postVars("index.php?page=service:ajax_view", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Service was Updated.');
        load_page();
    }
}

function delete_service() {
	var service_id = document.getElementById("service_id").value;
	var answer = confirm ('Are you sure you want to remove this Flat Rate Service?\n');
    if(answer){	
		urlVars = {}
        bodyVars = {service_id:service_id}	
		ajaxCaller.postVars("index.php?page=service:ajax_delete_service", bodyVars, urlVars, on_response,false, "a postVars request");
	    alert('Your Service was Deleted.');
	    load_page();
	} else {
		
	}
}


function view_all() {
    display_progress();
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars("index.php?page=service:ajax_load_all", bodyVars, urlVars, on_list_response,false, "a postVars request");
}

function view(service_id) {
    urlVars = {}
    bodyVars = {service_id:service_id}
    ajaxCaller.postVars("index.php?page=service:ajax_view", bodyVars, urlVars, on_response,false, "a postVars request");
}

function cancel() {
	 document.getElementById("contentBox").innerHTML = '';
}

function on_response(text, headers, callingContext) {
    document.getElementById("contentBox").innerHTML = text;
}

function on_list_response(text, headers, callingContext) {
	document.getElementById("listBox").innerHTML = text;
}

function display_progress() {
    document.getElementById("listBox").innerHTML = "Loading <img src=/images/theme/progressbar1.gif align=middle>";
}



{/literal}
</script>
<body onload="load_page()">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Flat Rate Services</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:add_service_frm();" style="padding-left:12px; padding-top:10px;">Add New Service</a><div id="contentBox" style="padding-left:12px;padding-right:12px;"></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>


<br>
<div id="listBox"></div>


{include file="core/footer.tpl"}