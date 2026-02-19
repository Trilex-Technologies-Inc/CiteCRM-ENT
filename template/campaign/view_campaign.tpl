<!-- view_campaign -->
{include file="core/header.tpl"}

{literal}
<script type="text/javascript">
function page_load() {
    load_details();
    load_window('open_leads');
}

function load_details() {
    details_progress();
    var campaign_id = {/literal}{$campaignObj->get_campaign_id()}{literal}
    urlVars = {}
    bodyVars = {campaign_id:campaign_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign:ajax_load_campaign_details", bodyVars, urlVars, display_details,false, "a postVars request");
}

function load_window(window){
	var campaign_id = {/literal}{$campaignObj->get_campaign_id()}{literal};
	clear_tbs(window);
	display_progress();
	switch (window) {
		case 'open_leads':
			urlVars = {}
    		bodyVars = {campaign_id:campaign_id,lead_status:'open_leads'}
    		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign:ajax_load_lead_by_status", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'conversions':
			urlVars = {}
    		bodyVars = {campaign_id:campaign_id,lead_status:'conversions'}
    		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign:ajax_load_lead_by_status", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'analytics':
			urlVars = {}
    		bodyVars = {campaign_id:campaign_id}
    		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=campaign:ajax_load_analytics", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		
	}
	
}

function display_details(text, headers, callingContext) {
    document.getElementById("detailsBox").innerHTML = text;
}

function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function details_progress() {
    document.getElementById("detailsBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function display_progress() {
    document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function clear_tbs(activity){
	document.getElementById('open_leads').className='other';
	document.getElementById('conversions').className='other';
	document.getElementById('analytics').className='other';
	document.getElementById(activity).className='current';
}

</script>
{/literal}

<body onload="page_load();">

<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a class="current">Campaign {$campaignObj->get_campaign_name()}</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" >
            <div id="detailsBox"></div>
        </td>
    </tr>
</table>


<br>
<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a href="javascript:load_window('open_leads')" id="open_leads">Open Leads</a></li>
    <li id="All_sp_tab"><a href="javascript:load_window('conversions')" id="conversions">Conversions</a></li>
    <li id="All_sp_tab"><a href="javascript:load_window('analytics')" id="analytics">Analytics </a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>
<br>
</div>
{include file="core/footer.tpl"}
