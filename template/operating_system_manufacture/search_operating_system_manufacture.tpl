<!-- search_operating_system_manufacture -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

// Load
function load_window(field,sort,next) {
	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_search_operating_system_manufacture", bodyVars, urlVars, on_response,false, "a postVars request");

}

function search_manufacture(){
	var operating_system_manufacture_name = document.getElementById("search_operating_manufacture_name").value;
	parent.searchWindow.hide();
	display_progress();
	urlVars = {}
	bodyVars = {operating_system_manufacture_name:operating_system_manufacture_name}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_search_operating_system_manufacture", bodyVars, urlVars, on_response,false, "a postVars request");

}

// Add Manufacture
function add_manufacture() {
	edit_progress()
	urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_add_operating_system_manufacture", bodyVars, urlVars, on_edit,false, "a postVars request");

}

function save_new_manufacture(){
	var operating_system_manufacture_name = document.getElementById("operating_system_manufacture_name").value;
	var operating_system_manufacture_website = document.getElementById("operating_system_manufacture_website").value;
	var operating_system_manufacture_active = document.getElementById("operating_system_manufacture_active").value;	
	var error = false;
	var errorMsg = 'There where errors saving the Operating System Manufacture\n';
	
	if(operating_system_manufacture_name == ''){
		errorMsg = errorMsg + '-- Please Provide a Operating System Manufacture Name --\n';
        error = true;
        document.getElementById("operating_system_manufacture_name").className='formError';
	}
	
	if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save';
		alert(errorMsg);
        return false;       
    } else {
		edit_progress()
		urlVars = {}
		bodyVars = {operating_system_manufacture_name:operating_system_manufacture_name,operating_system_manufacture_website:operating_system_manufacture_website,operating_system_manufacture_active:operating_system_manufacture_active,submit:'save'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_add_operating_system_manufacture", bodyVars, urlVars, on_edit,false, "a postVars request");
		alert('The Operating System Manufacture was Saved');
		load_window('operating_system_manufacture_name','ASC','1')
	}
	
}

// Edit Manufacture
function edit_manufacture(operating_system_manufacture_id){
	edit_progress()
	urlVars = {}
	bodyVars = {operating_system_manufacture_id:operating_system_manufacture_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_edit_operating_system_manufacture", bodyVars, urlVars, on_edit,false, "a postVars request");
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_load_operating_system", bodyVars, urlVars, on_response,false, "a postVars request");

}

function save_edit_manufacture(){
	var operating_system_manufacture_name = document.getElementById("operating_system_manufacture_name").value;
	var operating_system_manufacture_website = document.getElementById("operating_system_manufacture_website").value;
	var operating_system_manufacture_active = document.getElementById("operating_system_manufacture_active").value;	
	var operating_system_manufacture_id = document.getElementById("operating_system_manufacture_id").value;
	var error = false;
	var errorMsg = 'There where errors saving the Operating System Manufacture\n';
	
	if(operating_system_manufacture_name == ''){
		errorMsg = errorMsg + '-- Please Provide a Operating System Manufacture Name --\n';
        error = true;
        document.getElementById("operating_system_manufacture_name").className='formError';
	}
	
	if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save';
		alert(errorMsg);
        return false;       
    } else {
		edit_progress()
		urlVars = {}
		bodyVars = {operating_system_manufacture_id:operating_system_manufacture_id,operating_system_manufacture_name:operating_system_manufacture_name,operating_system_manufacture_website:operating_system_manufacture_website,operating_system_manufacture_active:operating_system_manufacture_active,submit:'save'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=operating_system_manufacture:ajax_edit_operating_system_manufacture", bodyVars, urlVars, on_edit,false, "a postVars request");
		alert('The Operating System Manufacture was Saved');
		edit_manufacture(operating_system_manufacture_id)
	}
	

}

// delete manufacture
function delete_manufacture(){

}

function cancel(){
	document.getElementById("edit_box").innerHTML = "";
	load_window('operating_system_manufacture_name','ASC','1')
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search', 'width=400px,height=160px,center=1,resize=1,scrolling=1');
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function edit_progress() {
	document.getElementById("edit_box").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function on_edit(text, headers, callingContext) {
	document.getElementById("edit_box").innerHTML = text;
}
</script>
{/literal}
<div id="search_box" style="display:none; background-color: #ECECEC;">
<span class="greetUser">Search</span>
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="search_operating_manufacture_name" id="search_operating_manufacture_name" size="40"></td>
	</tr></tr>
		<td class="formAreaTitle"><input type="button" name="search" value="Search" onclick="search_manufacture()"></td>
		<td class="fieldValue"></td>
	</tr>
</table>
</div>

<body onload="load_window('operating_system_manufacture_name','ASC','1')">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Operating System Manufactures</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a> <a href="javascript:add_manufacture()">Add Operating System Manufacture</a></td>
					<td></td>
				</tr><tr>
					<td class="data"><div id="edit_box"></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>	
<div id="contentBox"></div>

{include file="core/footer.tpl"}
