<!-- search_leads.tpl -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	var company_id			= document.getElementById("company_id").value;
	var lead_campaign		= document.getElementById("lead_campaign").value;
	var lead_assigned_user	= document.getElementById("lead_assigned_user").value;
	var lead_referer		= document.getElementById("lead_referer").value;
	var lead_status_id		= document.getElementById("lead_status_id").value;
	var lead_type_id		= document.getElementById("lead_type_id").value;
	var lead_create_date	= document.getElementById("lead_create_date").value;
	var lead_create_date_c	= document.getElementById("lead_create_date_c").value;

	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,company_id:company_id,lead_campaign:lead_campaign,lead_assigned_user:lead_assigned_user,lead_referer:lead_referer,lead_status_id:lead_status_id,lead_type_id:lead_type_id,lead_create_date:lead_create_date,lead_create_date_c:lead_create_date_c}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_search_leads", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Leads', 'width=400px,height=245px,center=1,resize=1,scrolling=1');
}

function search_leads(field,sort,next) {
	parent.searchWindow.hide();
	load_window(field,sort,next)
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={$ROOT_URL}/images/theme/progressbar1.gif align=middle>";
}
</script>
{/literal}

<body onload="load_window('lead_id','DESC','1')">

<div id="search_box" style="display:none; background-color: #ECECEC;">
<span class="greetUser">Search</span>
	
<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="small">Account</td>
		<td class="small"><input type="text" name="company_id" id="company_id"></td>
	</tr><tr>
		<td class="small">Campaign</td>
		<td class="small"><input type="text" name="lead_campaign" id="lead_campaign"></td>
	</tr><tr>
		<td class="small">Assigned</td>
		<td class="small">{html_select_employee fieldName=lead_assigned_user}</td>
	</tr><tr>
		<td class="small">Referer</td>
		<td class="small"><input type="text" name="lead_referer" id="lead_referer"></td>
	</tr><tr>	
		<td class="small">Status</td>
		<td class="small">{html_select_lead_status value=$lead_status_id}</td>
	</tr><tr>
		<td class="small">Type</td>
		<td class="small">{html_select_lead_type value=$lead_type_id}</td>	
	</tr><tr>
		<td class="small">Date Created</td>
		<td class="small">From <input type="text" name="lead_create_date" id="lead_create_date" size="10"> To <input type="text" name="lead_create_date_c" id="lead_create_date_c" size="10">
			Date Format mm/dd/yyyy</td>
	</tr><tr>
		<td colspan="2" class="small"><input type="submit" name="submit" value="Search" id="submit" onclick="search_leads('lead_id','DESC','1')"></td>
	</tr>
</table>
</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Search Leads</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a> <a href="{$ROOT_URL}/index.php?page=leads:add">Add New Lead</a></td>
					<td>
					</td>
				</tr>
			</table>
		</d>
	</tr>
</table>

<br>	
<div id="contentBox"></div>


{include file="core/footer.tpl"}