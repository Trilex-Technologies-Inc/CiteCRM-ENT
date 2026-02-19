<!-- my_home.tpl -->
{include file="core/header.tpl"}
<input type="hidden" name="user_id" id="user_id" value="{$SESSION_USER_ID}">

<body onload="page_load()">

{literal}
<script type="text/javascript">

var user_id = document.getElementById("user_id").value;

function page_load(){
	load_window('Personal Infomration');
	load_tools('Workorders','workorder_active','DESC','1');
}

// User Window
function load_window(activity) {
	clear_tbs(activity);
	display_user_progress();
	
	urlVars = {}
	bodyVars = {}

	switch(activity) {
		case 'Personal Infomration':			
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_personal", bodyVars, urlVars, on_user_window_load,false, "a postVars request");
		break;
		case 'Address':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_address", bodyVars, urlVars, on_user_window_load,false, "a postVars request");
		break;
		case 'Contact Information':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_contact", bodyVars, urlVars, on_user_window_load,false, "a postVars request");
		break;
		case 'Today':
			var now = new Date()

			var year = now.getFullYear();
			var day = now.getDate();
			var month = now.getMonth() +1;
	
			var string ="page=calendar:view_day&Date_Year="+year+"&Date_Month="+month+"&Date_Day="+day+"&stand_alone=true&hide_options=true";
			
		
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?"+string, bodyVars, urlVars, on_user_window_load,false, "a postVars request");
		break;
	}
}

// Tools
function load_tools(tool,field,sort,next){
	clear_tbs_2(tool);
	display_tools_progress();

	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next}
	switch(tool) {
		case 'Workorders':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_workorders", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Accounts':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_accounts", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Leads':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_leads", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Book Marks':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:load_bookmark_toc", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Documents':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_documents", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Alerts':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_alerts", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Tasks':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_tasks", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
		case 'Files':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_files", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
		break;
	}
}

function delete_file(file_id) {
    var answer = confirm ('Are you sure you want to remove File ID, ' + file_id + ' From the workorder?\n');
    if(answer){
        urlVars = { }
        bodyVars = {file_id:file_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:delete_file", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('File #'+file_id+' was removed');
        javascript:load_tools('Files','file_id','ASC','1')
    } else {
       
    }

}


function add_file(activity){
   var user_id = document.getElementById("user_id").value;
   bodyVars = {}
   ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_new_file&file_type=user_id&file_type_id='+user_id,bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
}

function loadAlertById(alert_id) {
	display_tools_progress();
	urlVars = {}
	bodyVars = {alert_id:alert_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=alert:ajax_load_alert", bodyVars, urlVars, on_tools_window_load,false, "a postVars request");
}
// Address
function edit_address(address_id){
	display_user_progress();
	urlVars = {}
	bodyVars = {address_id:address_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_employee", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
}

function save_address(){
	var address_street = document.getElementById("address_street").value;
	var address_street_2 = document.getElementById("address_street_2").value;
	var address_city = document.getElementById("address_city").value;
	var address_state = document.getElementById("address_state").value;
	var address_postal_code = document.getElementById("address_postal_code").value;
	var address_id = document.getElementById("address_id").value;
	var user_id = document.getElementById("user_id").value;
	var error = false;
	var errorMsg = 'There where errors saving the Address\n';
	
	if(address_street == "") {
		errorMsg = errorMsg + '-- Please Provide the Street Address --\n';
        error = true;
        document.getElementById("address_street").className='formError';
	}
	if(address_city == "") {
		errorMsg = errorMsg + '-- Please Provide the City --\n';
        error = true;
        document.getElementById("address_city").className='formError';
	}
	if(address_state == "") {
		errorMsg = errorMsg + '-- Please Provide the State --\n';
        error = true;
        document.getElementById("address_state").className='formError';
	}
	if(address_postal_code == "") {
		errorMsg = errorMsg + '-- Please Provide the Postal Code --\n';
        error = true;
        document.getElementById("address_postal_code").className='formError';
	}
	
	if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save';
		alert(errorMsg);
        return false;       
    } else {
		display_user_progress();
		urlVars = {}
		bodyVars = {address_id:address_id,user_id:user_id,address_street:address_street,address_street_2:address_street_2,address_city:address_city,address_state:address_state,address_postal_code:address_postal_code,submit:'save'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_employee", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
		alert('Your Address was saved.');
		load_window('Address');
	}
	
}
// Personal
function edit_personal(){
	var user_id = document.getElementById("user_id").value;
	display_user_progress();
	urlVars = {}
	bodyVars = {user_id:user_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_personal", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
}

function save_personal(){
	var user_id = document.getElementById("user_id").value;
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var email = document.getElementById("email").value;
	var error = false;
	var errorMsg = 'There where errors saving your Personal Information\n';
	
	if(first_name == "") {
		errorMsg = errorMsg + '-- Please Provide Your First Name --\n';
        error = true;
        document.getElementById("first_name").className='formError';
	}
	if(last_name == "") {
		errorMsg = errorMsg + '-- Please Provide Your Last Name --\n';
        error = true;
        document.getElementById("last_name").className='formError';
	}
	if(email == "") {
		errorMsg = errorMsg + '-- Please Provide Your Email Address --\n';
        error = true;
        document.getElementById("email").className='formError';
	}
	
	if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save';
		alert(errorMsg);
        return false;       
    } else {
		display_user_progress();
		urlVars = {}
		bodyVars = {user_id:user_id,first_name:first_name,last_name:last_name,email:email,submit:'save'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_personal", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
		alert('Your Personal Information has been saved. If you changed you email address your login has also changed to the email address you provided');
		javascript:load_window('Personal Infomration');
	}
}

function edit_passwd(){
	var user_id = document.getElementById("user_id").value;
	display_user_progress();
	urlVars = {}
	bodyVars = {user_id:user_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_password", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
}

function save_password() {
	var user_id = document.getElementById("user_id").value;
	var user_password = document.getElementById("user_password").value;
	var user_password2 = document.getElementById("user_password2").value;
	
	var error = false;
	var errorMsg = 'There where errors saving your Password\n';
	
	if(user_password != user_password2) {
		errorMsg = errorMsg + '-- The Passwords Do not match --\n';
        error = true;
        document.getElementById("user_password2").className='formError';
	}
	
	if(user_password == '') {
		errorMsg = errorMsg + '-- The Password can not be empty --\n';
        error = true;
        document.getElementById("user_password").className='formError';
	}
	
	if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save';
		alert(errorMsg);
        return false;       
    } else {
		display_user_progress();
		urlVars = {}
		bodyVars = {user_id:user_id,user_password:user_password,submit:'save'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_edit_password", bodyVars, urlVars, on_user_window_load,false, "a postVars request");	
		alert('Your Password has been chaged. Please Log out and re-login for the changes to take affect.');
		load_window('Personal Infomration');
	}
}

// Contact
function edit_contact(){
	display_user_progress();
	urlVars = {}
	bodyVars = {user_id:user_id,edit:'edit'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_contact", bodyVars, urlVars, on_user_window_load,false, "a postVars request");		
}
function save_contact() {
	var primary_phone = document.getElementById("primary_phone").value;
	var secondary_phone = document.getElementById("secondary_phone").value;
	var mobile_phone = document.getElementById("mobile_phone").value;
	var fax = document.getElementById("fax").value;
	var yahoo = document.getElementById("yahoo").value;
	var msn = document.getElementById("msn").value;
	var icq = document.getElementById("icq").value;
	var aol = document.getElementById("aol").value;
	var extension = document.getElementById("extension").value;
	var user_id = document.getElementById("user_id").value;
	
	urlVars = {}
	bodyVars = {user_id:user_id,primary_phone:primary_phone,secondary_phone:secondary_phone,mobile_phone:mobile_phone,fax:fax,yahoo:yahoo,msn:msn,icq:icq,aol:aol,extension:extension,submit:'submit'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_contact", bodyVars, urlVars, on_user_window_load,false, "a postVars request");		
	alert('Your Contact Information was saved');
	load_window('Contact Information');
}

// Ajax User Window Load
function on_user_window_load(text, headers, callingContext) {
	document.getElementById("userBox").innerHTML = text;
}

function on_tools_window_load(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

// Tabs
function clear_tbs(activity){
	document.getElementById('Personal Infomration').className='other';
	document.getElementById('Address').className='other';
	document.getElementById('Contact Information').className='other';
	document.getElementById('Today').className='other';
	document.getElementById(activity).className='current';
}

function clear_tbs_2(tool){
	document.getElementById('Workorders').className='other';
	document.getElementById('Accounts').className='other';
	document.getElementById('Leads').className='other';
	document.getElementById('Book Marks').className='other';
	document.getElementById('Alerts').className='other';
	document.getElementById('Files').className='other';
	document.getElementById(tool).className='current';
}

// Progress windows
function display_tools_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function display_user_progress() {
	document.getElementById("userBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}


function load_bookmark_type(bookmark_type){
    switch_folder(bookmark_type);
    clear_box()
    var box = 'box_' + bookmark_type;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';

    urlVars = {}
	bodyVars = {bookmark_type:bookmark_type,user_id:user_id}
    switch (box) {
        case 'box_Lead' :
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Leads ,false, "a postVars request");
        break;
        case 'box_Account':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Accounts ,false, "a postVars request");
        break
        case 'box_Contact':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Contacts ,false, "a postVars request");
        break
        case 'box_Work Order':
              ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Workorders ,false, "a postVars request");
        break
        case 'box_System':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Systems ,false, "a postVars request");
        break
        case 'box_Invoice':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Invoices ,false, "a postVars request");
        break
        case 'box_Product':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Products ,false, "a postVars request");
        break
        case 'box_Web':
             ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_load_bookmarks", bodyVars, urlVars, box_Web ,false, "a postVars request");
        break

    }

}

function markAlertRead(alert_id) {
	urlVars = {}
	bodyVars = {alert_id:alert_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=alert:mark_read", bodyVars, urlVars, markAlertReturn ,false, "a postVars request");
}

function markAlertReturn(text, headers, callingContext) {
	document.getElementById("alertBox").innerHTML = text;
	window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=user:my_home";

}


function editAlert(alert_id) {
	urlVars = {}
	bodyVars = {alert_id:alert_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=alert:ajax_edit_alert", bodyVars, urlVars, on_tools_window_load ,false, "a postVars request");
}


function box_Leads(text, headers, callingContext) {
    document.getElementById("box_Leads").innerHTML = text;    
}
function box_Accounts(text, headers, callingContext) {
    document.getElementById("box_Accounts").innerHTML = text;
}
function box_Contacts(text, headers, callingContext) {
    document.getElementById("box_Contacts").innerHTML = text;
}
function box_Workorders(text, headers, callingContext) {
    document.getElementById("box_Workorders").innerHTML = text;
}
function box_Systems(text, headers, callingContext) {
    document.getElementById("box_Systems").innerHTML = text;
}
function box_Invoices(text, headers, callingContext) {
    document.getElementById("box_Invoices").innerHTML = text;
}
function box_Products(text, headers, callingContext) {
    document.getElementById("box_Products").innerHTML = text;
}
function box_Web(text, headers, callingContext) {
    document.getElementById("box_Web").innerHTML = text;
}

function clear_box() {
    document.getElementById("box_Leads").innerHTML = '';
    document.getElementById("box_Accounts").innerHTML = '';
    document.getElementById("box_Contacts").innerHTML = '';
    document.getElementById("box_Workorders").innerHTML = '';
    document.getElementById("box_Systems").innerHTML = '';
    document.getElementById("box_Invoices").innerHTML = '';
    document.getElementById("box_Products").innerHTML = '';
    document.getElementById("box_Web").innerHTML = '';
}


function switch_folder(bookmark_type){
    document.getElementById('Lead').src = '/images/icons/foldr_16.gif';
    document.getElementById('Account').src = '/images/icons/foldr_16.gif';
    document.getElementById('Contact').src = '/images/icons/foldr_16.gif';
    document.getElementById('Work Order').src = '/images/icons/foldr_16.gif';
    document.getElementById('System').src = '/images/icons/foldr_16.gif';
    document.getElementById('Invoice').src = '/images/icons/foldr_16.gif';
    document.getElementById('Product').src = '/images/icons/foldr_16.gif';
    document.getElementById('Web').src = '/images/icons/foldr_16.gif';
    document.getElementById(bookmark_type).src = '/images/icons/impt_16.gif';
}

function delete_bookmark(bookmark_id){
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    load_tools('Book Marks','field','sort','next');
    urlVars = {}
    bodyVars = {bookmark_id:bookmark_id,user_id:user_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:ajax_delete_bookmark", bodyVars, urlVars, box_Leads ,false, "a postVars request");
    alert('Bookmark was Removed.');

}


</script>
{/literal}

{if $isAlert == true}
<div id="alertBox">
	<table class="formError" width="100%">
		<tr>
			<td>
				<table>
					<tr>
						<td class="errorText">You have an Alert from {$alertObj->get_alert_create_by()|display_names}!!</td>
					</tr><tr>
						<td class="small">{$alertObj->get_alert_subject()}</td>
					</tr><tr>
						<td class="small">{$alertObj->get_alert_text()}</td>
					</tr><tr>
						<td class="small">Alert Ends {$alertObj->get_alert_end_date()|date_format:$DATE_FORMAT} <a href="javascript:markAlertRead('{$alertObj->get_alert_id()}')">Mark Read</a></td>
					</tr>
				</table>
					
			</td>
		</tr>
	</table>
	<br>
</div>	
{/if}

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_window('Personal Infomration')" id="Personal Infomration">Personal Infomration</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Address')" id="Address">Address</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Contact Information')" id="Contact Information">Contact Information</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Today')" id="Today">Today</a></li>
</ul>
<div id="spaceBox"></div>
<div id="userBox"><br></div>

<br><br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_tools('Workorders','workorder_active','DESC','1')" id="Workorders">Workorders</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_tools('Accounts','field','sort','next')" id="Accounts">Accounts</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_tools('Leads','lead_id','ASC','1')" id="Leads">Leads</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_tools('Book Marks','bookmark_id','ASC','1')" id="Book Marks">Book Marks</a></li>
	
	<li id="Activities_sp_tab"><a href="javascript:load_tools('Alerts','alert.alert_id','ASC','1')" id="Alerts">Alerts</a></li>
	
	<li id="Activities_sp_tab"><a href="javascript:load_tools('Files','file_id','ASC','1')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>


{include file="core/footer.tpl"}