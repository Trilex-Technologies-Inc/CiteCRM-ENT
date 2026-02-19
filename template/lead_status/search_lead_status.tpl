<!-- search_lead_status -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function on_load() {
    display_list_progress();
    load_lead_status();
}

function load_lead_status(){
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:ajax_load_lead_status", bodyVars, urlVars, on_list_response,false, "a postVars request");    
}

function add_lead_status() {
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:add_lead_status", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_lead_status() {
    var error = false;
    var errorMsg = 'There where errors saving your Lead Status\n';
    var lead_status_text    =  document.getElementById("lead_status_text").value;
    var lead_status_active  =  document.getElementById("lead_status_active").value;

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct your errors and re save';
        alert(errorMsg);
    }else{
        urlVars = {}
        bodyVars = {submit:'submit',lead_status_text:lead_status_text,lead_status_active:lead_status_active}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:add_lead_status", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Status was added');
        display_list_progress();
        load_lead_status();
    }
    
}


function edit_lead_status(lead_status_id) {
    urlVars = {}
    bodyVars = {lead_status_id:lead_status_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:update_lead_status", bodyVars, urlVars, on_response,false, "a postVars request");
}

function update_lead_status() {
    var error = false;
    var errorMsg = 'There where errors saving your Lead Status\n';
    var lead_status_text    = document.getElementById("lead_status_text").value;
    var lead_status_active  = document.getElementById("lead_status_active").value;
    var lead_status_id      = document.getElementById("lead_status_id").value;

    if(lead_status_text == '') {
        errorMsg = errorMsg + '-- Lead Status Name is required\n --';
        document.getElementById("lead_status_text").className='formError';
        error = true;
    }

    if(lead_status_id < 1) {
        errorMsg = errorMsg + '-- Internal Error No ID\n --';
        error = true;
    }

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct your errors and re save';
        alert(errorMsg);
    }else{    
        urlVars = {}
        bodyVars = {submit:'submit',lead_status_id:lead_status_id,lead_status_text:lead_status_text,lead_status_active:lead_status_active}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:update_lead_status", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead status was updated');
        load_lead_status()
    }

}

function delete_lead_status(lead_status_id){
    var answer = confirm ('Are you sure you want to remove this Lead Status?\n');
    if(answer){ 
        urlVars = {}
        bodyVars = {submit:'submit',lead_status_id:lead_status_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=lead_status:delete_lead_status", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('Your Lead Status was removed');
        display_list_progress();
        load_lead_status();
    } else {

    }

}

function cancel_edit(){
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

<body onload="on_load()">

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a class="current">Lead Status</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
    <tr>
        <td class="productListing-data">
            <table cellpadding="0" cellspacing="0"  width="100%">
                <tr>
                    <td class="data" >
                        <a href="javascript:add_lead_status();">Add Lead Status</a>  
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
<br>



{include file="core/footer.tpl"}
