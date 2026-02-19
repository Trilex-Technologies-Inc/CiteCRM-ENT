<!-- view_workorder -->
{include file="core/header.tpl"}
<input type="hidden" name="workorder_id" value="{$workorder->get_workorder_id()}" id="workorder_id">
<input type="hidden" name="edit" id="edit" value="{$edit}">
<input type="hidden" name="company_id" id="company_id" value="{$company_id}">
<input type="hidden" name="user_id" id="user_id" value="{$user_id}">

<script language="javascript" type="text/javascript">
{literal}

//page load
function page_load() {
	load_workorder_info()
	load_description();
	load_scope();
	load_window('Notes','last_modified','DESC','1');
}

// Load Windows
function load_window(activity,field,sort,next){
	var workorder_id = document.getElementById("workorder_id").value;
	var edit = document.getElementById("edit").value;
	clear_tbs(activity);
	display_progress();
	urlVars = {}
		bodyVars = {workorder_id:workorder_id,edit:edit,field:field,sort:sort,next:next}
	switch(activity) {
		case 'Systems':			
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_systems", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Notes':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_notes", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Parts':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_products", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Time':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_time", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Files':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_files", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Service':
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_service", bodyVars, urlVars, on_response,false, "a postVars request");
		break;
	}
}

function load_workorder_info() {
	workorder_info_progress()
	var workorder_id = document.getElementById("workorder_id").value;
	urlVars = {}
	bodyVars = {workorder_id:workorder_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_load_workorder_info", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
}

function load_description() {
	//description_progress();
	var workorder_id = document.getElementById("workorder_id").value;
	urlVars = {}
	bodyVars = {workorder_id:workorder_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_description", bodyVars, urlVars, on_description_load,false, "a postVars request");
}

function load_scope() {
	scope_progress();
	var workorder_id = document.getElementById("workorder_id").value;
	urlVars = {}
	bodyVars = {workorder_id:workorder_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_scope", bodyVars, urlVars, on_scope_load,false, "a postVars request");
}

// status
function updateStatus() {
	var status_id = document.getElementById("workorder_status").value;
	var workorder_id = document.getElementById("workorder_id").value;
	switch(status_id) {			
		case '1': // New
			urlVars = {}
			bodyVars = {workorder_id:workorder_id,status_id:status_id}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
			workorder_info_progress()
			alert('Workorder Status Updated');
			load_workorder_info()
		break;

		case '2': // Assign
			assignWindow=dhtmlmodal.open('noteBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status&status_id=2', 'Set Workorder to Waiting For Parts', 'width=400px,height=125px,center=1,resize=1,scrolling=1');
		break;

		case '3': // waiting for parts			
			waitingWindow=dhtmlmodal.open('noteBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status&status_id=3', 'Set Workorder to Waiting For Parts', 'width=400px,height=310px,center=1,resize=1,scrolling=1');
		break;
		case '4': // On Hold
			waitingWindow=dhtmlmodal.open('noteBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status&status_id=4', 'Set Workorder to On Hold', 'width=400px,height=315px,center=1,resize=1,scrolling=1');
		break;
		case '5': // completed 
			window.location='{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:complete_workorder&workorder_id='+workorder_id;
		break;		
		case '6': //suspend
			waitingWindow=dhtmlmodal.open('noteBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status&status_id=6', 'Suspend Workorder', 'width=400px,height=310px,center=1,resize=1,scrolling=1');
		break;

		case '8': // Customer Aproval
			urlVars = {}
			bodyVars = {workorder_id:workorder_id,status_id:status_id}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
			workorder_info_progress()
			alert('Workorder Status Updated');
			load_workorder_info()
		break;

		

	}

	//window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status&workorder_id={/literal}{$workorder_id}{literal}&status_id=" + statusID;
}

// Add Windows 
function add_window(activity){
	var workorder_id = document.getElementById("workorder_id").value;
	clear_tbs(activity);
	switch(activity) {
		case 'Notes':
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder_note:ajax_add_workorder_note', bodyVars, urlVars, on_response,false, "a postVars request");
		break
		case 'Time':
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_workorder_time',bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'Systems':
			var company_id = document.getElementById("company_id").value;
			var user_id = document.getElementById("user_id").value;
			
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_system_to_workorder&user_id='+user_id+'&company_id='+company_id, bodyVars, urlVars, on_response,false, "a postVars request");
		break;
		case 'parts':
			parent.addPartWindow.hide();
		break;
		case 'Service':
				
			ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_workorder_service',bodyVars, urlVars, on_response,false, "a postVars request");
		break;
	
	}	
}

function add_file(activity){
	var workorder_id = document.getElementById("workorder_id").value;
	clear_tbs(activity);
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_new_file&file_type=workorder_id&file_type_id='+workorder_id,bodyVars, urlVars, on_response,false, "a postVars request");
}


function add_parts(categoryId,field,sort,next) {	
	var  workorder_id = document.getElementById("workorder_id").value;
	
	clear_tbs('Parts');
	display_progress();
	urlVars = {}
	bodyVars = {parent_id:categoryId,workorder_id:workorder_id,field:field,sort:sort,next:next}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:add_part", bodyVars, urlVars, on_response,false, "a postVars request");
}


// Save status
function save_status() {
	var status_save_id = document.getElementById("status_save_id").value;

	switch(status_save_id) {

		case '3': // awaiting parts
			var workorder_note_text = document.getElementById("workorder_note_text").value;
			var workorder_id = document.getElementById("workorder_id").value;
			var errorMsg ='There where errors saving your Status\n';
			var error = false;

			if(workorder_note_text == '') {
				error = true;
				errorMsg = errorMsg + '-- Please provide the Some information about the Part Order --\n';
                document.getElementById("workorder_note_text").className='formError';
			}

			if(error){
				errorMsg = errorMsg + '\nPlease correct the errors and save your Status';
				alert(errorMsg);
			} else {
				parent.waitingWindow.hide();
				urlVars = {}
				bodyVars = {workorder_id:workorder_id,status_id:status_save_id,workorder_note_text:workorder_note_text,submit:true}
				ajaxCaller.postVars("/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
				workorder_info_progress()
				alert('Workorder Status Updated');
				load_workorder_info();
				load_window('Notes','last_modified','DESC','1');				
			}

		break
		// Assign
		case '2':
			var workorder_assigned_to = document.getElementById("workorder_assigned_to").value;
			var workorder_id = document.getElementById("workorder_id").value;
			var errorMsg ='There where errors saving your Status\n';
			var error = false;

			if(workorder_assigned_to == '') {
				error = true;
				errorMsg = errorMsg + '-- Please select an Employee to Assign the workorder to --\n';
                document.getElementById("workorder_assigned_to").className='formError';
			}

			if(error){
				errorMsg = errorMsg + '\nPlease correct the errors and save your Status';
				alert(errorMsg);
			} else {
				parent.assignWindow.hide();
				urlVars = {}
				bodyVars = {workorder_id:workorder_id,status_id:status_save_id,workorder_assigned_to:workorder_assigned_to,submit:true}
				ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
				workorder_info_progress()
				alert('Workorder Status Updated');
				load_workorder_info();
				load_window('Notes','last_modified','DESC','1');				
			}
		
		break;
		case '4': // On Hold
			var workorder_note_text = document.getElementById("workorder_note_text").value;
			var workorder_id = document.getElementById("workorder_id").value;
			var errorMsg ='There where errors saving your Status\n';
			var error = false;

			if(workorder_note_text == '') {
				error = true;
				errorMsg = errorMsg + '-- Please provide the Reason the Workorder is being put On Hold --\n';
                document.getElementById("workorder_note_text").className='formError';
			}

			if(error){
				errorMsg = errorMsg + '\nPlease correct the errors and save your Status';
				alert(errorMsg);
			} else {
				parent.waitingWindow.hide();
				urlVars = {}
				bodyVars = {workorder_id:workorder_id,status_id:status_save_id,workorder_note_text:workorder_note_text,submit:true}
				ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
				workorder_info_progress()
				alert('Workorder Status Updated');
				load_workorder_info();
				load_window('Notes','last_modified','DESC','1');				
			}
		break;

		case '6': // Suspend
			var workorder_note_text = document.getElementById("workorder_note_text").value;
			var workorder_id = document.getElementById("workorder_id").value;
			var errorMsg ='There where errors saving your Status\n';
			var error = false;

			if(workorder_note_text == '') {
				error = true;
				errorMsg = errorMsg + '-- Please provide the Reason for Suspending the Workorder --\n';
                document.getElementById("workorder_note_text").className='formError';
			}

			if(error){
				errorMsg = errorMsg + '\nPlease correct the errors and save your Status';
				alert(errorMsg);
			} else {
				parent.waitingWindow.hide();
				urlVars = {}
				bodyVars = {workorder_id:workorder_id,status_id:status_save_id,workorder_note_text:workorder_note_text,submit:true}
				ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:update_status", bodyVars, urlVars, on_workorder_info_load,false, "a postVars request");
				workorder_info_progress()
				alert('Workorder Status Updated');
				load_workorder_info();
				load_window('Notes','last_modified','DESC','1');				
			}
		break;

	}
	
}

// Save Note
function submit_note(){
	var workorder_note_text = document.getElementById("workorder_note_text").value;
    var workorder_subject = document.getElementById("workorder_subject").value;
	var workorder_id = document.getElementById("workorder_id").value;
	var submit = document.getElementById("submit").value;
	var errorMsg ='There where errors saving your Note\n';
	var error = false;


	if(workorder_note_text == '') {
		error = true;
		errorMsg = errorMsg + '-- Please provide the Note Details --\n';
        document.getElementById("workorder_note_text").className='formError';
	}

    if(workorder_subject == "") {
        error = true;
		errorMsg = errorMsg + '-- Please provide the Note Subject --\n';
        document.getElementById("workorder_subject").className='formError';
    }

	if(error){
		errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		alert(errorMsg);
	} else {
		urlVars = {}
		bodyVars = {workorder_id:workorder_id,workorder_note_text:workorder_note_text,workorder_subject:workorder_subject,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder_note:ajax_add_workorder_note", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('New Note Added')
		load_window('Notes','last_modified','DESC','1');
	}
}

// Save System
function submit_system() {
	var workorder_id = document.getElementById("workorder_id").value;
	var system_id = document.getElementById("new_system").value;
	var submit = true;
	var errorMsg = 'There where errors adding the system\n';
	var error = false;

	// Check if we have a system
	if(system_id == '') {
		error = true;
		errorMsg = errorMsg  + '-- Please select a System --\n';
        document.getElementById("system_id").className='formError';
	}

	if(workorder_id == '') {
		error = true;
		errorMsg = errorMsg  + '-- Internal Error no Workorder ID to map System to! --\n';
	}
	
	if(error){
		errorMSg = errorMsg + '\nPlease correct the errors and add your System';
		alert(errorMSg)
	} else {
		display_progress();		
		urlVars = {}
		bodyVars = {workorder_id:workorder_id,system_id:system_id,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_system_to_workorder", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('System # '+system_id+' was Added');
		load_window('Systems','system.system_id','ASC','1');
	}
}


// Save Parts
function add_parts_to_workorder(productID) {
	var system_id = document.getElementById("system_id").value;
	var product_id = productID;
	var product_qty = document.getElementById("qty_" + product_id).value;
	var max = document.getElementById("max_"+product_id).value;
	var workorder_id = document.getElementById("workorder_id").value;
	var Submit = document.getElementById("submit").value;
	var errorMsg = 'There where errors adding your part to the Workorder\n';
	var error = false;
	var do_post = true;

	if(product_qty == ''){
		error = true;
		errorMsg = errorMsg + '-- You must enter a quantity --\n';
        document.getElementById("product_qty").className='formError';
	}

	if(workorder_id == ''){
		error = true;
		errorMsg = errorMsg  + '-- Internal Error no Workorder ID to map Part to! --\n';
	}

	if(product_id == '') {
		error = true;
		errorMsg = errorMsg  + '-- Internal Error no Product ID to map to Workorder! --\n';
	}

	if(product_qty > max) {
		error = true;
		errorMsg = errorMsg  + '-- You have selected more product: '+product_qty+' than available. Max available: '+max; 
        document.getElementById("product_qty").className='formError';
	}

	if(error){
		errorMSg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMSg)
	} else {

		if(system_id == '0') {
			var answer = confirm	('You did not select a System. Are you sure you want to do this?');
			if(answer){
				do_post = true;
			} else {
				do_post = false;
				return false;
			}
		}

		if(do_post = true) {
			display_progress();
			urlVars = {	}
			bodyVars = {system_id:system_id,product_id:product_id,product_qty:product_qty,workorder_id:workorder_id,Submit:Submit}		
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:add_part", bodyVars, urlVars, on_response,false, "a postVars request");
			alert('Part Was Added to Workorder');
			load_window('Parts','product.product_id','ASC','1');
		}
	}

}

function add_new_product() {
    display_progress();
    var workorder_id = document.getElementById("workorder_id").value;

    urlVars = { }
    bodyVars = {workorder_id:workorder_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_new_product", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_workorder_service(){
	clear_tbs('Service');
	var service_qty = document.getElementById("service_qty").value;
	var service_id = document.getElementById("service_id").value;
	var workorder_id = document.getElementById("workorder_id").value;
	var errorMsg = 'There where errors adding your Flate Rate Service to the Workorder\n';
	var error = false;
	
	if(service_qty < 1){
		error = true;
		errorMsg = errorMsg + '-- You must enter a Quantity --\n';
        document.getElementById("service_qty").className='formError';
	}
	if(service_id < 1){
		error = true;
		errorMsg = errorMsg + '-- You must Select a Service --\n';
        document.getElementById("service_id").className='formError';
	}
	
	if(error){
		errorMSg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMSg)
	} else {		
		urlVars = {}		
		bodyVars = {workorder_id:workorder_id,service_qty:service_qty,service_id:service_id,submit:'submit'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_workorder_service", bodyVars, urlVars,  on_response,false, "a postVars request");
		alert('Flat Rate Service was Saved');
		load_window('Service','workorder_service_id','ASC','1');
	}	
}

function save_workorder_time() {
	clear_tbs('Time');
	var startDateMonth	= document.getElementById("startDateMonth").value;
	var startDateDay	= document.getElementById("startDateDay").value;
	var startDateYear	= document.getElementById("startDateYear").value;
	var startTimeHour	= document.getElementById("startTimeHour").value;
	var startTimeMinute = document.getElementById("startTimeMinute").value;
	var endTimeHour		= document.getElementById("endTimeHour").value;
	var endTimeMinute	= document.getElementById("endTimeMinute").value;
	var workorder_id	= document.getElementById("workorder_id").value;
	var user_id			= document.getElementById("user_id").value;
    var workorder_time_description = document.getElementById("workorder_time_description").value;
	var submit			= document.getElementById("submit").value;
    var workorder_time_rate = document.getElementById("workorder_time_rate").value;
	var errorMsg = 'There where errors adding your part to the Workorder\n';
	var error = false;

	if(startDateMonth < 1){
		error = true;
		errorMsg = errorMsg + '-- You must select a Month --\n';
        document.getElementById("startDateMonth").className='formError';
	}

	if(startDateDay < 1){
		error = true;
		errorMsg = errorMsg + '-- You must select a Day --\n';
        document.getElementById("startDateDay").className='formError';
	}

	if(startDateYear < 1){
		error = true;
		errorMsg = errorMsg + '-- You must select a Year --\n';
        document.getElementById("startDateYear").className='formError';
	}
	
	if(endTimeHour < 1 &&  endTimeMinute < 1 ){
		error = true;
		errorMsg = errorMsg + '-- You must enter the amount of Hours Worked --\n';
        document.getElementById("endTimeHour").className='formError';
	}

	if(workorder_id < 1 ) {
		error = true;
		errorMsg = errorMsg + '-- System Error! No workorder id to map time to --\n';
        document.getElementById("workorder_id").className='formError';
	}

    if(workorder_time_rate < 1) {
        error = true;
		errorMsg = errorMsg + '-- Select the Labor Rate! --\n';
        document.getElementById("workorder_time_rate").className='formError';
    }

    if(workorder_time_description == "") {
        error = true;
		errorMsg = errorMsg + '-- You must provide a Labor Description! --\n';
        document.getElementById("workorder_time_description").className='formError';
    }

	if(error){
		errorMSg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMSg)
	} else {		
		urlVars = {	}
		bodyVars = {startDateMonth:startDateMonth,startDateDay:startDateDay,startDateYear:startDateYear,startTimeHour:startTimeHour,startTimeMinute:startTimeMinute,endTimeHour:endTimeHour,endTimeMinute:endTimeMinute,workorder_id:workorder_id,user_id:user_id,workorder_time_rate:workorder_time_rate,workorder_time_description:workorder_time_description,submit:submit}

		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_add_workorder_time", bodyVars, urlVars,  on_response,false, "a postVars request");
		alert('Workorder Time was saved');
		load_window('Time','workorder_time_start','ASC','1');
	}


}

// Update
function edit_workorder_note(workorder_note_id) {
	clear_tbs('Notes');	
	if(workorder_note_id) {

		ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder_note:update_workorder_note&workorder_note_id='+workorder_note_id , bodyVars, urlVars,  on_response,false, "a postVars request");

	} else {
        var error = false;
	    var errorMsg = 'There where errors saving your Note\n';

		var workorder_note_id = document.getElementById("workorder_note_id").value;
		var submit = document.getElementById("submit").value;
		var workorder_note_text = document.getElementById("workorder_note_text").value;
        var workorder_note_subject = document.getElementById("workorder_note_subject").value;

        if(document.getElementById("delete").checked) {
            var do_delete = '1';
        } else {
            var do_delete = '0';
        }

        if(workorder_note_subject =="") {
            error = true;
             document.getElementById("workorder_note_subject").className='formError';
		     errorMsg = errorMsg + '-- Note Subject is Required! --\n';
        }

        if(workorder_note_text == "") {
             error = true;
             document.getElementById("workorder_note_text").className='formError';
		     errorMsg = errorMsg + '-- Note text is Required! --\n';
        }


        if(error == false) {        
            urlVars = {}	
            bodyVars = {workorder_note_id:workorder_note_id,submit:submit,workorder_note_text:workorder_note_text,do_delete:do_delete,workorder_note_subject:workorder_note_subject}		
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder_note:update_workorder_note", bodyVars, urlVars, on_response,false, "a postVars request");
            if(do_delete == true) {
                alert('Note was deleted');
            } else {
                alert('Note was updated');
            }           
            load_window('Notes','last_modified','DESC','1');
        } else {
            errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		    alert(errorMsg);
        }
	}
	
}

function edit_description() {
	var workorder_id = document.getElementById("workorder_id").value;
	var edit_description = true;
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_description&workorder_id='+workorder_id+'&edit_description=1',bodyVars, urlVars, on_description_load,false, "a postVars request");
}

function edit_scope() {
	var workorder_id = document.getElementById("workorder_id").value;
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_scope&workorder_id='+workorder_id+'&edit_scope=1', bodyVars, urlVars, on_scope_load,false, "a postVars request");
}

function update_description() {
	var workorder_id = document.getElementById("workorder_id").value;
	var workorder_desription = document.getElementById("workorder_desription").value;
	var submit = true;
	var error = false;
	var errorMsg = 'There where errors Updateing the Workorder Description\n';

	if(workorder_desription == '') {
		error = true;
		errorMsg = errorMsg + '-- The Workorder Description can not be empty!	 --\n';	
        document.getElementById("workorder_desription").className='formError';	
	}

	if(error) {
		errorMSg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMSg)
	} else {
		urlVars = {}
		bodyVars = {workorder_id:workorder_id,workorder_desription:workorder_desription,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_description", bodyVars, urlVars, on_description_load,false, "a postVars request");
		alert('Your Description was saved');
		load_description();
	}

}

function update_scope() {
	var workorder_id = document.getElementById("workorder_id").value;
	var workorder_scope = document.getElementById("workorder_scope").value;
	var submit = true;
	var error = false;
	var errorMsg = 'There where errors Updateing the Workorder Scope\n';
	
	if(workorder_scope == '') {
		error = true;
		errorMsg = errorMsg + '-- The Workorder Scope can not be empty!	 --\n';	
        document.getElementById("workorder_scope").className='formError';	
	}

	if(error) {
		errorMSg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMSg)
	} else {
		urlVars = {}
		bodyVars = {workorder_id:workorder_id,workorder_scope:workorder_scope,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_view_workorder_scope", bodyVars, urlVars, on_scope_load,false, "a postVars request");
		alert('Your Scope was saved');
		load_scope();
	}
}

function setSchedual() {

	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_set_schedual&workorder_id='+workorder_id+'&edit_scope=1', bodyVars, urlVars, display_schedual_window,false, "a postVars request");

}

function submit_schedual() {
	var startDateMonth = document.getElementById("startDateMonth").value;
	var startDateDay = document.getElementById("startDateDay").value;
	var startDateYear = document.getElementById("startDateYear").value;
	var startTimeHour = document.getElementById("startTimeHour").value;
	var startTimeMinute = document.getElementById("startTimeMinute").value;
	var endDateMonth = document.getElementById("endDateMonth").value;
	var endDateDay = document.getElementById("endDateDay").value;
	var endDateYear = document.getElementById("endDateYear").value;
	var endTimeHour = document.getElementById("endTimeHour").value;
	var endTimeMinute = document.getElementById("endTimeMinute").value;
	var workorder_id = document.getElementById("workorder_id").value;
	var inc_sat	= document.getElementById("inc_sat").value;
	var after_hours = document.getElementById("after_hours").value;
	var error = false;
	var errorMsg = 'There where errors saving your Schedual:\n';

	var COMPANY_START_HOUR = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN = {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR = {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN	= {/literal}{$COMPANY_END_MIN}{literal};

	var check_start = Date.UTC(startDateYear, startDateMonth, startDateDay, startTimeHour, startTimeMinute, 0); 
	var check_end = Date.UTC(endDateYear, endDateMonth, endDateDay, endTimeHour, endTimeMinute, 0);

	var busines_start = Date.UTC(startDateYear,startDateMonth,startDateDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startDateYear, startDateMonth, startDateDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);
	
	var do_post = true;

	// Validate Start and End times
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Date is less than or equal to Start Date --\n';
        document.getElementById("endDateMonth").className='formError';
        document.getElementById("endDateDay").className='formError';
        document.getElementById("endDateYear").className='formError';	
        document.getElementById("endTimeHour").className='formError';
        document.getElementById("endTimeMinute").className='formError';	
	}

	if(error == true) {
		errorMsg = errorMsg + '\nPlease corect the errors and save your Schedual';
		alert(errorMsg);
	} else {

		// Validate end time is not greater than Business CLose date
		if(check_start < busines_start && after_hours < 1) {
			var start_answer = confirm ('Are you sure you want to set the Start Time before the Company Opens?');
			if(start_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}
					
		// Validate end time is not greater than Business CLose date
		if(check_end > bussines_end && after_hours < 1) {
			var end_answer = confirm ('Are you sure you want to set the End Time After the Company Closes?\n');
			if(end_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}		
	
		if(do_post == true) {

			urlVars = {	}
			bodyVars = {startDateMonth:startDateMonth,startDateDay:startDateDay,startDateYear:startDateYear,startTimeHour:startTimeHour,startTimeMinute:startTimeMinute,endDateMonth:endDateMonth,endDateDay:endDateDay,endDateYear:endDateYear,endTimeHour:endTimeHour,endTimeMinute:endTimeMinute,workorder_id:workorder_id,inc_sat:inc_sat,after_hours:after_hours,submit:true}
	
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_set_schedual", bodyVars, urlVars, display_schedual_window,false, "a postVars request");
			load_window('Notes','last_modified','DESC','1');
		}
	}
}


// Delete
function delete_note(note, note_id) {	
	var answer = confirm ('Are you sure you want to Delete note \n' + note);	
	if(answer){
		display_progress()
		urlVars = {	}		
		bodyVars = {workorder_note_id: note_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder_note:delete_workorder_note", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Note # '+note_id+' was removed');
		load_window('Notes','last_modified','DESC','1');
	} else {
		return false;
	}	
}


function delete_product_from_workorder(product_id) {
	var workorder_id =document.getElementById("workorder_id").value;
	var answer = confirm ('Are you sure you want to Delete product #' + product_id);	
	if(answer){
		display_progress()
		urlVars = {	}	
		bodyVars = {product_id:product_id,workorder_id:workorder_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:delete_product_from_workorder", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('Product #' + product_id + ' was removed');
		load_window('Parts','product.product_id','ASC','1');
	} else {
		return false;
	}
}

function delete_system_from_workorder(system_id, workorder_id) {
	var answer = confirm ('Are you sure you want to remove System #' + system_id + ' From the workorder?\n');
	if(answer){
		display_progress()
		urlVars = {	}
		bodyVars = {system_id:system_id,workorder_id:workorder_id}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:delete_system_from_workorder", bodyVars, urlVars, on_response,false, "a postVars request");				
		alert('System #' + system_id + ' was removed');
		load_window('Systems','system.system_id','ASC','1');
	} else {
		return false;
	}
}

function delete_workorder_time(workorder_time,start,end) {
	var answer = confirm ('Are you sure you want to remove Workorder Time, ' + start + ' TO ' + end + ' From the workorder?\n');
	if(answer){
		urlVars = {	}
			bodyVars = {workorder_time: workorder_time}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_delete_workorder_time", bodyVars, urlVars, on_response,false, "a postVars request");
	       load_window('Time','workorder_time_start','DESC','1');
	} else {
	   
	}
}

function upload_file() {

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

function open_calendar(){
	var now = new Date()
	var year = now.getFullYear();
	var day = now.getDate();
	var month = now.getMonth() +1;
	var url ="{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:view_day&Date_Year="+year+"&Date_Month="+month+"&Date_Day="+day+"&stand_alone=true&display_close=true";
			
	window.open(url,"Window1","menubar=no,width=700,height=400,toolbar=no");
}

function updateHidden() {
	document.getElementById("product_system_id").value = document.getElementById("part_system_id").value;
}


// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function on_description_load(text, headers, callingContext) {
	document.getElementById("wo_description").innerHTML = text;
}

function on_scope_load(text, headers, callingContext) {
	document.getElementById("scope").innerHTML = text;
}

function on_workorder_info_load(text, headers, callingContext) {
	document.getElementById("workorder_info").innerHTML = text;
}

function display_schedual_window(text, headers, callingContex) {
	document.getElementById("schedual_window").innerHTML = text;
}

function clear_tbs(activity){
	document.getElementById('Systems').className='other';
	document.getElementById('Notes').className='other';
	document.getElementById('Parts').className='other';
	document.getElementById('Time').className='other';
	document.getElementById('Files').className='other';
    document.getElementById('Service').className='other';
	document.getElementById(activity).className='current';
}

// Progress windows
function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function workorder_info_progress() {
	document.getElementById("workorder_info").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function description_progress() {
	document.getElementById("wo_description").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function scope_progress() {
	document.getElementById("scope").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function bookmark() {
    var workorder_id = document.getElementById("workorder_id").value;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    var bookmark_description = 'Workorder #' + workorder_id
    urlVars = {}
    bodyVars = {user_id:user_id,bookmark_type:'Work Order',bookmark_description:bookmark_description,bookmark_type_id:workorder_id}
    ajaxCaller.postVars("index.php?page=bookmark:add_bookmark", bodyVars, urlVars, false ,false, "a postVars request");
    alert('New Bookmark added:' + bookmark_description);

}

</script>
{/literal}


<body onload="page_load()">

<div id="progress_bar" style="display:none; background-color: #ECECEC;">
	<center>
		Please wait while we upload your file.
		<table>
			<tr>
				<td>	
					<img src="{$ROOT_URL}/images/theme/progressbar1.gif">
				</td>
			</tr>
		</table>
	</center>
</div>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Work Order #{$workorder->get_workorder_id()}</a></li>
	<li>
	{if $edit}
			<a href="javascript:add_window('Time');"><img src="images/icons/hist_16.gif" border="0" align="middle" alt="Add Workorder Labor">&nbsp;Add Work Time</a>
			<a href="javascript:add_window('Systems');"><img src="images/icons/save_16.gif" border="0" align="middle" alt="Add System to Work Order">&nbsp;Add System</a>
			<a href="javascript:add_parts('0','product_id','ASC','0');"><img src="images/icons/cart_16.gif" border="0" align="middle" alt="Add Parts To Work Order">&nbsp;Add Parts</a>
		
		{/if}
		<a href="javascript:add_window('Files');"><img src="images/icons/open_16.gif" border="0" align="middle" alt="Add File">&nbsp;Add File</a>
		<a href="{$ROOT_URL}/index.php?page=workorder:print_workorder&workorder_id={$workorder_id}"><img src="images/icons/print_16.gif" border="0" align="middle" alt="Print">&nbsp;Print</a>
        <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark">&nbsp;Bookmark</a>
	
	
	</li>
</ul>

{if $company->get_company_id() != ""}
	<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
		<tr>
			<td class="productListing-data">
                <table width="100%" class="small">
                    <tr>
                        <td>

                            <a href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$company->get_company_id()}">{$company->get_company_name()}</a><br>
                            {$company_address->get_company_street_1()}<br>
                            {if $company_address->get_company_street_2() !=""}
                                {$company_address->get_company_street_2()}<br>
                            {/if}
                            {$company_address->get_company_city()}, {$company_address->get_company_state()|state_name} {$company_address->get_company_postal_code()}
                            <a href="#" onclick="window.open('{$ROOT_URL}/index.php?page=core:map&toAddress={$company_address->get_company_street_1()} {$company_address->get_company_city()}, {$company_address->get_company_state()|state_name} {$company_address->get_company_postal_code()} ','mywindow','scrollbars=1,menubar=1,resizable=1,width=650,height=550');">Map</a><br>
                            <br><br>
                            {if $workorder->get_workorder_start_time() > 0}
                                <div id="schedual_window">
                                    Scheduled For: <b>{$workorder->get_workorder_start_time()|link_date_time}</b> T0:  <b>{$workorder->get_workorder_end_time()|link_date_time}</b>
                                      <a href="javascript:setSchedual()">Edit</a>                   
                                </div>
                                
                            {else}
                                <div id="schedual_window">
                                    <a href="javascript:setSchedual()">Set Scheduled</a>
                                </div>
                            {/if}
                        </td>
                        <td width="5"><br></td>
                        <td>{fetch_workorder_totals workorder_id=$workorder->get_workorder_id()}


                        </td>
                    </tr>
                </table>

			</td>
            
		</tr>
	</table>
    
{/if}

{* User Work order *}
{if $user != ""}
	<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
		<tr>
			<td class="productListing-data">
			     <table width="100%" class="small">
                    <tr>
                        <td>
                            <a href="{$ROOT_URL}/index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}">{$user->getUserID()|display_names}</a><br>
                            {$user_address->getAddressStreet()}<br>
                            {if $user_address->getAddressStreet2() !=""}
                                {$user_address->getAddressStreet2()}<br>
                            {/if}
                            {$user_address->getAddressCity()}, {$user_address->getAddressState()} {$user_address->getAddressPostalCode()}<br>
                        
                            <br><br>
                        
                            {if $workorder->get_workorder_start_time() > 0}
                                <div id="schedual_window">
                                    Scheduled For: <b>{$workorder->get_workorder_start_time()|link_date_time}</b> T0: <b>{$workorder->get_workorder_end_time()|link_date_time}</b>
                                    {if $edit}
                                        <a href="javascript:setSchedual()">Edit</a>
                                    {/if}
                                </div>
                            {else}
                                <div id="schedual_window">
                                    <a href="javascript:setSchedual()">Set Scheduled</a>
                                </div>
                            {/if}
                 
                        </td>
                        <td width="5"><br></td>
                        <td>{fetch_workorder_totals workorder_id=$workorder->get_workorder_id()}</td>
                    </tr>
                </table>
            </td>
		</tr>
	</table>
{/if}

<br>

{* Top Info *}

<div id="workorder_info"></div>



<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Scope</a></li>
</ul>
<table cellpadding="5" cellspacing="0" class="productListing"" width="100%">
	<tr>
		<td class="productListing-data">
			<table width="100%" class="small">
				<tr>
					<td><div id="scope"></div></td>
				</tr>
			</table>

		</td>
	</tr>
</table>
<br>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Description</a></li>
</ul>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-data" wrap>
			
			<table width="100%" class="small">
				<tr>
					<td><div id="wo_description"></div></td>
				</tr>
			</table>

		</td>
	</tr>	
</table>
<br>

{if $workorder->get_workorder_active() == 0}
<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a class="current">Resolution</a></li>
</ul>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
    <tr>
        <td class="productListing-data" wrap>
            
            <table width="100%" class="small">
                <tr>
                    <td>
                        <table class="small">
                            <tr>
                                <td><b>Date Closed</b></td>
                                <td>{$workorder->get_workorder_close_date()|date_format:$DATE_TIME_FORMAT}</td>
                                <td><b>Closed By</b></td>
                                <td>{$workorder->get_workorder_close_by()|display_names}</td>
                            </tr><tr>
                                <td colspan="4">{$workorder->get_workorder_resolution()}</td>
                            </tr>
                        </table>
                        </td>
                </tr>
            </table>

        </td>
    </tr>   
</table>
<br>
{/if}


<br><br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a        href="javascript:load_window('Systems','system.system_id','ASC','1');" id="Systems">Systems</a></li>
	<li id="Marketing_sp_tab"><a  href="javascript:load_window('Notes','last_modified','DESC','1');" id="Notes">Notes</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Parts','product.product_id','ASC','1');" id="Parts">Parts</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Time','workorder_time_start','DESC','1');" id="Time">Labor</a></li>
    <li id="Activities_sp_tab"><a href="javascript:load_window('Service','','DESC','1');" id="Service">Service</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_window('Files','file_create_date','ASC','')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>





</body>
{include file="core/footer.tpl"}
