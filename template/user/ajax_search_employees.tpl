<!-- ajax_load_employees.tpl -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	display_progress();
	var email		= document.getElementById("email").value;
	var first_name	= document.getElementById("first_name").value;
	var last_name	= document.getElementById("last_name").value;
	var user_status	= document.getElementById("user_status").value;

	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,email:email,first_name:first_name,last_name:last_name,user_status:user_status}
	ajaxCaller.postVars("index.php?page=user:ajax_load_employees", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Employees', 'width=400px,height=220px,center=1,resize=1,scrolling=1');
}

function search_users(field,sort,next) {
	parent.searchWindow.hide();
	load_window(field,sort,next)
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

<body onload="load_window('user_id','ASC','1')">

<div id="search_box" style="display:none; background-color: #ECECEC;">
<span class="greetUser">Search</span>
	<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="small">Email</td>
		<td class="small"><input type="text" name="email" id="email" value="{$email}"></td>
	</tr><tr>
		<td class="small">First</td>
		<td class="small"><input type="text" name="first_name" id="first_name" value="{$first_name}"></td>
	</tr><tr>
		<td class="small">Last</td>
		<td class="small"><input type="text" name="last_name" id="last_name" value="{$last_name}"></td>
	</tr><tr>
		<td class="small">Status</td>
		<td class="small">{html_select_user_status user_status="user_status"}</td>
	</tr><tr>	
		<td colspan="2" class="small">
			<input type="submit" name="submit" value="Search" onclick="search_users('user_id','ASC','1')"></td>
	</tr>
</table>
</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Search Employees</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a> || <a href="{$ROOT_URL}/index.php?page=user:add_employee">Add New</a></td>
					<td>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>	
<div id="contentBox"></div>



{include file="core/footer.tpl"}
