<!-- search_workorder -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	var upcCode					= document.getElementById("upcCode").value;
	var workorder_id			= document.getElementById("workorder_id").value;
	var workorder_status		= document.getElementById("workorder_status").value;
	var workorder_assigned_to	= document.getElementById("workorder_assigned_to").value;
	var workorder_active		= document.getElementById("workorder_active").value;
	var workorder_open_date		= document.getElementById("workorder_open_date").value;
	var workorder_open_date_c	= document.getElementById("workorder_open_date_c").value;
	var workorder_close_date	= document.getElementById("workorder_close_date").value;
	var  workorder_close_date_c	= document.getElementById("workorder_close_date_c").value;

	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,upcCode:upcCode,workorder_id:workorder_id,workorder_status:workorder_status,workorder_assigned_to:workorder_assigned_to,workorder_active:workorder_active,workorder_open_date:workorder_open_date,workorder_open_date_c:workorder_open_date_c,workorder_close_date:workorder_close_date,workorder_close_date_c:workorder_close_date_c}
	ajaxCaller.postVars("index.php?page=workorder:ajax_search_workorder", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Workorders', 'width=400px,height=255px,center=1,resize=1,scrolling=1');
    document.getElementById("upcCode").focus();
}

function search_workorder(field,sort,next) {
	parent.searchWindow.hide();
	load_window(field,sort,next)
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src=/images/theme/progressbar1.gif align=middle>";
}
</script>
{/literal}

<body onload="load_window('workorder_id','DESC','1')">

<div id="search_box" style="display:none; background-color: #ECECEC;">

<span class="greetUser">Search</span>
	<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
		<tr>
			<td class="small">UPC</td>
			<td class="small"><input type="text" name="upcCode" id="upcCode" value="{$upcCode}" onchange="search_workorder('workorder_id','DESC','1')"></td>
		</tr><tr>	
			<td class="small">ID</td>
			<td class="small"><input type="text" name="workorder_id" id="workorder_id" value="{$workorder_id}"></td>
		</tr><tr>
			</tr><tr>	
			<td class="small">Status</td>
			<td class="small">{html_select_workorder_status fieldName="workorder_status" value=0}</td>
		</tr><tr>
			<td class="small">Assigned</td>
			<td class="small">{html_select_employee fieldName="workorder_assigned_to" value=0}</td>
		</tr><tr>	
			<td class="small">Active</td>
			<td class="small">
				<select id="workorder_active">
					<option value="">All</option>
					<option value="1">Yes</option>
					<option value="0">No</option>
				</select>
			</td>
		</tr><tr>
			<td class="small">Opened</td>
			<td class="small">From <input type="text" name="workorder_open_date" id="workorder_open_date" size="8"> To <input type="text" name="workorder_open_date_c" id="workorder_open_date_c" size="8"><br>
				Date must be in format mm/dd/yyy
			 </td>
		</tr><tr>
			<td class="small">Closed</td>
			<td class="small">From <input type="text" name="workorder_close_date" id="workorder_close_date" size="8"> To <input type="text" name="workorder_close_date_c" id="workorder_close_date_c" size="8"><br>
				Date must be in format mm/dd/yyy
			</td>
		</tr><tr>
			<td colspan="2" class="small"><input type="submit" name="submit" value="Search" onclick="search_workorder('workorder_id','DESC','1')"></td>
	</tr>
	</table>

</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Workorders</a></li>
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
