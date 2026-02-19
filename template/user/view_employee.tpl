<!-- view_employee.tpl -->
{include file="core/header.tpl"}

<input type="hidden" name="user_id" id="user_id" value="{$userObj->getUserID()}">

{literal}




<script language="javascript" type="text/javascript">

var user_id = document.getElementById('user_id').value;

function load_page() {
	load_window('Address','','ASC','1');
	load_details();
}

function load_window(activity,field,sort,next){
	clear_tbs(activity);
	display_progress();
	urlVars = {}
	bodyVars = {user_id:user_id,field:field,sort:sort,next:next}
	switch (activity) {
		case 'Address':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_address", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Workorders':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_workorders", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Support':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_support", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Permisions':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_permisions", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Files':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_files", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
	}
}

function load_details() {
	urlVars = {}
	bodyVars = {user_id:user_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_details", bodyVars, urlVars, on_details_load,false, "a postVars request");
}

function edit_window(activity) {
	switch (activity) {
		case 'reset_pwd':
			urlVars = {}
			bodyVars = {user_id:user_id}
		 	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_reset_password&user_id='+user_id", bodyVars, urlVars, on_details_load,false, "a postVars request");
		 
		break;
		case 'edit':
			urlVars = {}
			bodyVars = {user_id:user_id}
		 	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_edit&user_id='+user_id", bodyVars, urlVars, on_details_load,false, "a postVars request");
		 
		break;
		case 'edit_contact':
			urlVars = {}
			bodyVars = {user_id:user_id}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_contact_edit&user_id='+user_id", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
	}
}

function save(activity) {
	switch(activity) {
		case 'reset_pwd':
			var user_password = document.getElementById("user_password").value;
			var user_password2 = document.getElementById("user_password2").value;
			var error = false;
			var errorMsg = 'There where errors changing the password\n';
			if(user_password == '') {
				errorMsg = errorMsg + 'The password can not be blank\n';
				error = true;
			}

			if(user_password != user_password2) {
				errorMsg = errorMsg + 'The passwords do not match\n';
				error = true;
			}

			if(error == true) {
				errorMsg = errorMsg + '\nPlease correct your errors and re save';
				alert(errorMsg);
			}else{
				
	
				urlVars = {}
				bodyVars = {user_id:user_id,user_password:user_password,submit:'submit'}			
				ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_reset_password", bodyVars, urlVars, on_details_load,false, "a postVars request");
				alert('Password was  Reset')
				load_details();
			}
		break;
		case 'perms':
			var perms = 0;

			if(document.getElementById("CAN_READ").checked) {
				perms = perms + 1;
			}
			if(document.getElementById("CAN_PRINT").checked) {
				perms =perms +  2;
			}
			if(document.getElementById("CAN_CREATE").checked) {
				perms = perms + 4;
			}
			if(document.getElementById("CAN_EDIT").checked) {
				perms = perms + 8;
			}
			if(document.getElementById("CAN_DELETE").checked) {
				perms = perms + 16;
			}
			if(document.getElementById("CAN_READ_OTHERS").checked) {
				perms = perms + 32;
			}
			if(document.getElementById("CAN_EDIT_OTHER").checked) {
				perms = perms + 64;
			}
			if(document.getElementById("SUPER_USER").checked) {
				perms = perms + 128;
			}

			if(perms < 1){
				errorMSg = errorMsg + '\nPlease select at least one permission!';
				alert(errorMSg)
			} else {

				if(perms > 254) {
					var answer = confirm	('Your about to assign this user Full Admin. Are you sure you want to do this?');
					if(answer){
						do_post = true;
					} else {
						do_post = false;
						return false;
					}
				}	

				if(do_post = true) {					
					display_progress();
					urlVars = {}
					bodyVars = {user_id:user_id,submit:'save',permissions:perms}				
					ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_permisions", bodyVars, urlVars, on_response,false, "a postVars request");
					alert('New permission level set to: ' +perms);
					load_window('Permisions','','ASC','1');
				}	
			}
		break;
		case 'edit':
			var first_name = document.getElementById('first_name').value;
			var last_name = document.getElementById('last_name').value;
			var email = document.getElementById('email').value;
			var address_street = document.getElementById('address_street').value;
			var address_street_2 = document.getElementById('address_street_2').value;
			var address_city = document.getElementById('address_city').value;
			var address_state = document.getElementById('address_state').value;
			var address_postal_code = document.getElementById('address_postal_code').value;
			var address_id =  document.getElementById('address_id').value;
			var error = false;
			var errorMsg = 'There where errors saving the User Data\n';
			
			
			if(first_name == ''){
				errorMsg = errorMsg + '-- The First Name is required --\n';
				document.getElementById("first_name").className='formError';
				error = true;
			}
			if(last_name == ''){
				errorMsg = errorMsg + '-- The Last Name is required --\n';
				document.getElementById("last_name").className='formError';
				error = true;
			}
			if(email == ''){
				errorMsg = errorMsg + '-- The Email Address is required --\n';
				document.getElementById("email").className='formError';
				error = true;
			}
			if(address_street == '') {
				errorMsg = errorMsg + '-- The Street is required --\n';
				document.getElementById("address_street").className='formError';
				error = true;
			}
			if(address_city == ''){
				errorMsg = errorMsg + '-- The City is required --\n';
				document.getElementById("address_city").className='formError';
				error = true;
			}
			if(address_state == ''){
				errorMsg = errorMsg + '-- The State is required --\n';
				document.getElementById("address_state").className='formError';
				error = true;
			}
			if(address_postal_code == ''){
				errorMsg = errorMsg + '-- The Postal/Zip Code is required --\n';
				document.getElementById("address_postal_code").className='formError';
				error = true;
			}
			
			if(error == true) {
				errorMsg = errorMsg + '\nPlease correct your errors and re save';
				alert(errorMsg);
			}else{
				urlVars = {}
				bodyVars = {user_id:user_id,submit:'save',address_id:address_id,first_name:first_name,last_name:last_name,email:email,address_street:address_street,address_street_2:address_street_2,address_city:address_city,address_state:address_state,address_postal_code:address_postal_code}
				ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_edit", bodyVars, urlVars, on_details_load,false, "a postVars request");
				alert('Employee data was saved')
				load_details();
				load_window('Address','','ASC','1');
			}
				
		break;
		case 'contact':
			var primary_phone = document.getElementById('primary_phone').value;
			var secondary_phone = document.getElementById('secondary_phone').value;
			var mobile_phone = document.getElementById('mobile_phone').value;
			var fax	= document.getElementById('fax').value;
			var extension = document.getElementById('extension').value;
			var yahoo = document.getElementById('yahoo').value;
			var msn = document.getElementById('msn').value;
			var icq = document.getElementById('icq').value;
			var aol = document.getElementById('aol').value;
			
			urlVars = {}
			bodyVars = {user_id:user_id,fax:fax,extension:extension,primary_phone:primary_phone,secondary_phone:secondary_phone,mobile_phone:mobile_phone,yahoo:yahoo,msn:msn,icq:icq,aol:aol,submit:'save'}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_employee_contact_edit", bodyVars, urlVars, on_response,false, "a postVars request");
			alert('Employee data was saved');
			load_window('Address','','ASC','1');
		break;
	}


}

function load_workorder(field,sort,next,workorder_id) {
	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,user_id:user_id }
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_workorders", bodyVars, urlVars, on_response,false, "a postVars request");
}

function add_file(activity){
	var user_id = document.getElementById("user_id").value;
	clear_tbs(activity);
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_new_file&file_type=user_id&employee=1&file_type_id='+user_id,bodyVars, urlVars, on_response,false, "a postVars request");
}

function delete_file(file_id) {
    var answer = confirm ('Are you sure you want to remove File ID, ' + file_id + ' From the workorder?\n');
	if(answer){
		urlVars = {	}
		bodyVars = {file_id:file_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:delete_file", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('File #'+file_id+' was removed');
	    load_window('Files','file_create_date','ASC','');   
	} else {
	   
	}

}



function load_files(activity,field,sort,next) {
	
	display_progress();
	urlVars = {}
	bodyVars = {user_id:user_id,field:field,sort:sort,next:next}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_load_employee_files", bodyVars, urlVars, on_response,false, "a postVars request");
}

function delete_employee(){
	urlVars = {}
	bodyVars = {user_id:user_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_suspend_employee", bodyVars, urlVars, on_details_load,false, "a postVars request");
	
}

function suspend_employee() {
	var answer = confirm ('Are you sure you want to Suspend this Employee?\n');
	var suspension_reason = document.getElementById("suspension_reason").value;
		var user_id = document.getElementById("user_id").value;
	if(answer){
		urlVars = {	}
		bodyVars = {user_id:user_id,suspension_reason:suspension_reason,submit:'1'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_suspend_employee", bodyVars, urlVars, on_details_load,false, "a postVars request");
		alert('Employee has been suspended and can no longer log in to the CRM');
		load_details();
	
	} else {
	   
	}
}

function un_delete_employee(){
	var answer = confirm ('Are you sure you want to Un - Suspend this Employee?\n');
	if(answer){
		urlVars = {	}
		bodyVars = {user_id:user_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=user:ajax_un_suspend_employee", bodyVars, urlVars, on_details_load,false, "a postVars request");
		alert('Employee has been un-suspended and can now log in to the CRM');
		load_details();
	
	} else {
	   
	}
}

function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function on_details_load(text, headers, callingContext) {
	document.getElementById("empDetails").innerHTML = text;
}

function clear_tbs(activity){
	document.getElementById('Address').className='other';
	document.getElementById('Workorders').className='other';
	document.getElementById('Support').className='other';
	document.getElementById('Permisions').className='other';
	document.getElementById('Files').className='other';
	document.getElementById(activity).className='current';
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

</script>
{/literal}


<body onload="load_page()">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Employee {$userObj->getUserFirstName()} {$userObj->getUserLastName()}</a></li>
</ul>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-data">
			<div id="empDetails"></div>
		</td>
	</tr>
</table>

<br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a        href="javascript:load_window('Address','','ASC','1');" id="Address">Address</a></li>
	<li id="Marketing_sp_tab"><a  href="javascript:load_window('Workorders','','DESC','1');" id="Workorders">Workorders</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Support','','ASC','1');" id="Support">Support Calls</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Permisions','','DESC','1');" id="Permisions">Permisions</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Files','file_create_date','ASC','')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>
{include file="core/footer.tpl}