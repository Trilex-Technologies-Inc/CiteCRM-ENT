<!-- search_system -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	var upcCode					= document.getElementById("upcCode").value;
	var system_name				= document.getElementById("system_name").value;
	var system_ip_address		= document.getElementById("system_ip_address").value;
	var system_host_name		= document.getElementById("system_host_name").value;
	var system_active			= document.getElementById("system_active").value;
	var system_last_service		= document.getElementById("system_last_service").value;
	var system_last_service_c	= document.getElementById("system_last_service_c").value;

	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,upcCode:upcCode,system_name:system_name,system_ip_address:system_ip_address,system_host_name:system_host_name,system_active:system_active,system_last_service:system_last_service,system_last_service_c:system_last_service}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_search_system", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Accounts', 'width=400px,height=225px,center=1,resize=1,scrolling=1');
}

function search_system(field,sort,next) {
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

<body onload="load_window('system_id','DESC','1')">

<div id="search_box" style="display:none; background-color: #ECECEC;">
<span class="greetUser">Search</span>
	<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
		<tr>
			<td class="small">UPC</td>
			<td class="small"><input type="text" name="upcCode" id="upcCode" value="{$upcCode}"><br>
			UPC format SYSNNNNN
			</td>
		</tr><tr>
			<td class="small">Name</td>
			<td class="small"><input type="text" name="system_name" id="system_name" size="40"></td>
		</tr><tr>
			<td class="small">IP Address</td>
			<td class="small"><input type="text" name="system_ip_address" id="system_ip_address" size="16"></td>
		</tr><tr>
			<td class="small">Host Name</td>
			<td class="small"><input type="text" name="system_host_name" id="system_host_name" size="40"></td>
		</tr><tr>
			<td class="small">Active</td>
			<td class="small">{html_select_yesno fieldName="system_active" value="1"}</td>
		</tr><tr>
			<td class="small">Last Service</td>
			<td class="small">From <input type="text" name="system_last_service" id="system_last_service" size="8"> TO <input type="text" name="system_last_service+c" id="system_last_service_c" size="8"><br>
			Date Format mm/dd/yyy</td>
		</tr><tr>
			<td colspan="2" class="small"><input type="submit" name="submit" value="Search" onclick="search_system('system_id','DESC','1')"></td>
		</tr>
	</table>
	
</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Search Systems</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a></td>
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
