<!-- view_company -->
{include file="core/header.tpl"}
<input type="hidden" name="company_id" value="{$company->get_company_id()}" id="company_id">

<script language="javascript" type="text/javascript">
{literal}

function load_page() {
	load_company_contract();
	load_company_details();
	load_company_address('Address','Service');
}	

// address
function load_company_address(activity,company_address_type){
	var company_id = document.getElementById("company_id").value;
	if(company_address_type == '') {		
		var company_address_type = document.getElementById("select_company_address_type").value;
	}	
	clear_tbs(activity);	
	display_progress();
	urlVars = {}
	bodyVars = {company_id:company_id,company_address_type:company_address_type}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_address", bodyVars, urlVars, on_response,false, "a postVars request");
}


function add_company_address(address_type) {
	clear_tbs('Address');
	var company_id = document.getElementById("company_id").value;
    
    urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_address&_new=1&company_id='+company_id+'&company_address_type='+address_type, bodyVars, urlVars, on_response,false, "a postVars request");
}


function save_address(company_address_type) {
	var company_id = document.getElementById("company_id").value;
	var company_street_1 = document.getElementById("company_street_1").value;
	var company_street_2 = document.getElementById("company_street_2").value;
	var company_city = document.getElementById("company_city").value;
	var state_name = document.getElementById("state_name").value;
	var company_postal_code = document.getElementById("company_postal_code").value;
	urlVars = {}
	bodyVars = {company_id:company_id,company_address_type:company_address_type,company_street_1:company_street_1,company_street_2:company_street_2,company_city:company_city,state_name:state_name,company_postal_code:company_postal_code,submit:'submit',_new:'_new'}	
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_address", bodyVars, urlVars, on_response,false, "a postVars request");
	alert('Address Saved');
	load_company_address('Address',company_address_type);
}

function edit_address(company_address_id){
    urlVars = {}
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_address&company_address_id=' + company_address_id, bodyVars, urlVars, on_response,false, "a postVars request");
}

function update_address() {
	var company_address_id = document.getElementById("company_address_id").value;
	var company_id = document.getElementById("company_id").value;
	var company_address_type = document.getElementById("company_address_type").value;
	var company_street_1 = document.getElementById("company_street_1").value;
	var company_street_2 = document.getElementById("company_street_2").value;
	var company_city = document.getElementById("company_city").value;
	var state_name = document.getElementById("state_name").value;
	var company_postal_code = document.getElementById("company_postal_code").value;
	urlVars = {}
	bodyVars = {company_address_id:company_address_id,company_id:company_id,company_address_type:company_address_type,company_street_1:company_street_1,company_street_2:company_street_2,company_city:company_city,state_name:state_name,company_postal_code:company_postal_code,submit:'submit'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_address", bodyVars, urlVars, on_response,false, "a postVars request");
	alert("Address Updated");
	load_company_address('Address',company_address_type);
}

function edit_company_contact() {
	var company_id = document.getElementById("company_id").value;
    urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_company_contact&company_id=' + company_id, bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_company_contact() {
	var company_id = document.getElementById("company_id").value;
	var business_contact = document.getElementById("business_contact").value;
	var business_email = document.getElementById("business_email").value;
    var business_phone = document.getElementById("business_phone").value;
	var business_fax = document.getElementById("business_fax").value;
    var error = false;
	var errorMsg = 'There where errors saving the Primary Contact\n';	

    

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Contact';
		alert(errorMsg);
        return false;       
    } else {
        urlVars = {}
        bodyVars = {company_id:company_id,business_contact:business_contact,business_email:business_email,business_phone:business_phone,business_fax:business_fax,submit:'new'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_company_contact", bodyVars, urlVars, on_response,false, "a postVars request");
        alert("Contact Information Updated");
        load_company_address('Address','Service');
    }

}


function edit_company_details(){
	var company_id = document.getElementById("company_id").value;
    urlVars = {}
	bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_company_details&company_id=' + company_id,  bodyVars, urlVars, on_details ,false, "a postVars request");
}

function save_company_details() {
	var company_id = document.getElementById("company_id").value;
	var company_name = document.getElementById("company_name").value;
	var company_website = document.getElementById("company_website").value;
	var company_assgned_to = document.getElementById("company_assgned_to").value;
	var company_active = document.getElementById("company_active").value;
	var error = false;
	var errorMsg = 'There where errors saving the Company Information\n';
	
	if(company_name == '') {
		error = true;
		errorMsg = '-- You must provide the Company Name --\n';
	}
	if(company_id == '') {
		error = true;
		errorMsg = '-- Internal Error! NO Company_id --\n';
	}
	
	if(error == false) {	
		urlVars = {}
		bodyVars = {company_id:company_id,company_name:company_name,company_website:company_website,company_assgned_to:company_assgned_to,company_active:company_active,submit:'submit'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_edit_company_details", bodyVars, urlVars, on_details ,false, "a postVars request");
		alert('Company Information has been Updated');
		load_company_details();
	} else {
		errorMsg = errorMsg + 'Please fix the Errors and re-save the company information';
		alert(errorMsg);
	}
}


function load_company_details() {
	var company_id = document.getElementById("company_id").value;
	urlVars = {}
	bodyVars = {company_id:company_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_company_details", bodyVars, urlVars, on_details,false, "a postVars request");
}

// Users
function load_company_users(activity,field,ssort,next) {
	clear_tbs(activity);	
	display_progress();
	urlVars = {}	
	bodyVars = {company_id: document.getElementById("company_id").value,field:field,ssort:ssort,next:next}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_users", bodyVars, urlVars, on_response,false, "a postVars request");
}

// Contacts
function add_user() {
    var company_id = document.getElementById("company_id").value;
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_new_contact&company_id='+company_id, bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_user() {
    var user_first_name = document.getElementById("user_first_name").value;
    var user_last_name = document.getElementById("user_last_name").value;
    var user_email = document.getElementById("user_email").value;
    var user_type_id = document.getElementById("user_type_id").value;
    var company_id = document.getElementById("company_id").value;
    var primary_phone = document.getElementById("primary_phone").value;
    var mobile_phone = document.getElementById("mobile_phone").value;
    var secondary_phone = document.getElementById("secondary_phone").value;

    var company_address_id = document.getElementById("company_address_id").value;

    var user_extension = document.getElementById("user_extension").value;
    var error = false;
    var errorMsg = 'There where errors saving your Contact\n';  

    if(user_first_name == "") {
        errorMsg = errorMsg + '-- Please Provide a First Name --\n';
        error = true;
        document.getElementById("first_name").className='formError';
    }

    if(user_type_id == "") {
        errorMsg = errorMsg + '-- Please Select the Contact Type --\n';
        error = true;
        document.getElementById("user_type_id").className='formError';
    }

    if(company_id < 1) {
        errorMsg = errorMsg + '-- Internal Error No Company ID --\n';
        error = true;
    }

    if(error == false) {
        bodyVars = {user_first_name:user_first_name,user_last_name:user_last_name,user_email:user_email,user_type_id:user_type_id,company_id:company_id,primary_phone:primary_phone,mobile_phone:mobile_phone,secondary_phone:secondary_phone,user_extension:user_extension,company_address_id:company_address_id,submit:'save'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_new_contact", bodyVars, urlVars, on_response,false, "a postVars request");
        alert("Your Contact was Added");
        display_progress();
        load_company_users('Contacts','user_id', 'ASC', '');

    }else{
        errorMsg = errorMsg + '\nPlease correct the errors and re-submit';
        alert(errorMsg);
    }
}

// Systems
function load_company_systems(activity,field,ssort,next) {
	clear_tbs(activity);	
	display_progress();
	urlVars = {}	
	bodyVars = {company_id: document.getElementById("company_id").value,field:field,ssort:ssort,next:next
	}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=system:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");
}

// Workorders
function load_company_workorders(activity,field,ssort,next) {
	clear_tbs(activity);
	display_progress();	
	urlVars = {}	
	bodyVars = {company_id: document.getElementById("company_id").value,field:field,ssort:ssort,next:next}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=workorder:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");
}

// Load Invoices
function load_company_invoices(activity,field,ssort,next) {
	clear_tbs(activity);
	display_progress();
	urlVars = {}
	bodyVars = {company_id: document.getElementById("company_id").value,field:field,ssort:ssort,next:next}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");
}

//Notes
function load_company_notes(activity,field,sort,next) {
	display_progress();
	clear_tbs(activity);
	urlVars = {}
	bodyVars = {company_id: document.getElementById("company_id").value,field:field,sort:sort,next:next}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");
}

// Meeting
function load_company_meeting(activity,field,sort,next) {
    display_progress();
    clear_tbs(activity);
    urlVars = {}
    bodyVars = {company_id: document.getElementById("company_id").value,field:field,sort:sort,next:next} 
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_meeting:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");  
}

function add_meeting() {
	display_progress();
	urlVars = {}
    bodyVars = {company_id: document.getElementById("company_id").value}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_meeting:ajax_new_meeting", bodyVars, urlVars, on_response,false, "a postVars request");  
}

function save_meeting(){
	var activity = document.getElementById("activity").value;
	var company_id = document.getElementById("company_id").value;
	var startMonth = document.getElementById("startMonth").value;
	var startDay = document.getElementById("startDay").value;
	var startYear = document.getElementById("startYear").value;
	var startHour = document.getElementById("startHour").value;
	var startMinute = document.getElementById("startMinute").value;
	var endMonth = document.getElementById("endMonth").value;
	var endDay = document.getElementById("endDay").value;
	var endYear = document.getElementById("endYear").value;
	var endHour = document.getElementById("endHour").value;
	var endMinute = document.getElementById("endMinute").value;
	var company_meeting_active = document.getElementById("company_meeting_active").value;
	var company_meeting_subject = document.getElementById("company_meeting_subject").value;
    var company_meeting_text = document.getElementById("company_meeting_text").value;
    var user_id = document.getElementById("user_id").value;
    
    var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

	var error;
	var errorMsg;
	urlVars = {}
	bodyVars = {submit:'submit',user_id:user_id,activity:activity,company_id:company_id,startMonth:startMonth,startDay:startDay,startYear:startYear,startHour:startHour,startMinute:startMinute,endMonth:endMonth,endDay:endDay,endYear:endYear,endHour:endHour,endMinute:endMinute,company_meeting_active:company_meeting_active,company_meeting_subject:company_meeting_subject,company_meeting_text:company_meeting_text}

    var check_start = Date.UTC(startYear, startMonth, startDay, startHour, startMinute, 0); 
	var check_end = Date.UTC(endYear, endMonth, endDay, endHour, endMinute, 0);

	var busines_start = Date.UTC(startYear,startMonth,startDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startYear, startMonth, startDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);

	error = 'false';
	errorMsg = 'There where errors processing your form\n';

	if(document.getElementById("company_meeting_subject").value == ''){
		error = 'true';
		errorMsg = errorMsg + '-- You must provide the Subject --\n';
		document.getElementById("company_meeting_subject").className='formError';
	}
    

    // Validate Start and End times
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Date is less than or equal to Start Date --\n';
        document.getElementById("endMonth").className='formError';
        document.getElementById("endDay").className='formError';
        document.getElementById("endYear").className='formError';
        document.getElementById("endHour").className='formError';
        document.getElementById("endMinute").className='formError';
		
	}


    // Validate end time is not greater than Business CLose date
        var do_post = true;
		if(check_start < busines_start) {
			var start_answer = confirm ('Are you sure you want to set the Start Time before the Company Opens?');

			if(start_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}
					

		// Validate end time is not greater than Business CLose date
		if(check_end > bussines_end) {

			var end_answer = confirm ('Are you sure you want to set the End Time After the Company Closes?\n If you want to set the Event to span multiple days it is recomended that you set start and End times for each day the event is to take place. This way the event will show on each day.\n\nClick Cancel to go back and edit the End Time');

			if(end_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}		



	if(error == 'false') {

        if(do_post == true) {
        	
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_meeting:ajax_new_meeting", bodyVars, urlVars, on_response,false, "a postVars request");
            alert('Your Meeting has been recorded');
            load_company_meeting('Meeting','','ASC','');
        }


	} else {
		errorMsg = errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
	}
	
}

function edit_meeting_window(company_meeting_id) {
	display_progress();
	urlVars = {}
    bodyVars = {company_meeting_id:company_meeting_id} 
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_meeting:ajax_edit_meeting", bodyVars, urlVars, on_response,false, "a postVars request");  	
}

function update_meeting(){
	var company_id = document.getElementById("company_id").value;
	var startMonth = document.getElementById("startMonth").value;
	var startDay = document.getElementById("startDay").value;
	var startYear = document.getElementById("startYear").value;
	var startHour = document.getElementById("startHour").value;
	var startMinute = document.getElementById("startMinute").value;
	var endMonth = document.getElementById("endMonth").value;
	var endDay = document.getElementById("endDay").value;
	var endYear = document.getElementById("endYear").value;
	var endHour = document.getElementById("endHour").value;
	var endMinute = document.getElementById("endMinute").value;
	var company_meeting_active = document.getElementById("company_meeting_active").value;
	var company_meeting_subject = document.getElementById("company_meeting_subject").value;
    var company_meeting_text = document.getElementById("company_meeting_text").value;
    var company_meeting_id = document.getElementById("company_meeting_id").value;
    
    var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

	var error;
	var errorMsg;
	urlVars = {}
	bodyVars = {submit:'submit',company_meeting_id:company_meeting_id,company_id:company_id,startMonth:startMonth,startDay:startDay,startYear:startYear,startHour:startHour,startMinute:startMinute,endMonth:endMonth,endDay:endDay,endYear:endYear,endHour:endHour,endMinute:endMinute,company_meeting_active:company_meeting_active,company_meeting_subject:company_meeting_subject,company_meeting_text:company_meeting_text}

    var check_start = Date.UTC(startYear, startMonth, startDay, startHour, startMinute, 0); 
	var check_end = Date.UTC(endYear, endMonth, endDay, endHour, endMinute, 0);

	var busines_start = Date.UTC(startYear,startMonth,startDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startYear, startMonth, startDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);

	error = 'false';
	errorMsg = 'There where errors processing your form\n';

	if(document.getElementById("company_meeting_subject").value == ''){
		error = 'true';
		errorMsg = errorMsg + '-- You must provide the Subject --\n';
		document.getElementById("company_meeting_subject").className='formError';
	}
    

    // Validate Start and End times
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Date is less than or equal to Start Date --\n';
        document.getElementById("endMonth").className='formError';
        document.getElementById("endDay").className='formError';
        document.getElementById("endYear").className='formError';
        document.getElementById("endHour").className='formError';
        document.getElementById("endMinute").className='formError';
		
	}


    // Validate end time is not greater than Business CLose date
        var do_post = true;
		if(check_start < busines_start) {
			var start_answer = confirm ('Are you sure you want to set the Start Time before the Company Opens?');

			if(start_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}
					

		// Validate end time is not greater than Business CLose date
		if(check_end > bussines_end) {

			var end_answer = confirm ('Are you sure you want to set the End Time After the Company Closes?\n If you want to set the Event to span multiple days it is recomended that you set start and End times for each day the event is to take place. This way the event will show on each day.\n\nClick Cancel to go back and edit the End Time');

			if(end_answer){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
		}		



	if(error == 'false') {

        if(do_post == true) {
        	
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_meeting:ajax_edit_meeting", bodyVars, urlVars, on_response,false, "a postVars request");
            alert('Your Meeting has been recorded');
            load_company_meeting('Meeting','','ASC','');
        }


	} else {
		errorMsg = errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
	}
	
	
	
}

// Tasks
function load_company_task(activity,field,sort,next) {
    display_progress();
    clear_tbs(activity);
    urlVars = {}
    bodyVars = {company_id: document.getElementById("company_id").value,field:field,sort:sort,next:next} 
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:ajax_load_by_company", bodyVars, urlVars, on_response,false, "a postVars request");  
}

function add_task() {
	display_progress();
	urlVars = {}
    bodyVars = {}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:ajax_new_task", bodyVars, urlVars, on_response,false, "a postVars request");   	
}

function add_task_category(){
	document.getElementById("add_task_category").innerHTML = "<input type=\"text\" name=\"company_task_category\" id=\"company_task_category\" size=\"30\"> <input type=\"hidden\" name=\"add_category\" id=\"add_category\" value=\"1\"><input type=\"button\" id=\"cancel_add_category\" value=\"-\" onclick=\"cancel_add_category()\">";	
}

function cancel_add_category(){
	document.getElementById("add_task_category").innerHTML = "{/literal}{html_select_company_task|escape:'javascript'}{literal} <input type=\"hidden\" name=\"add_category\" id=\"add_category\" value=\"0\"> <input type=\"button\" name=\"add\" id=\"add\" value=\"+\" onclick=\"add_task_category()\">";	
}

function save_company_task(){
	var company_id = document.getElementById("company_id").value;
	var company_task_name = document.getElementById("company_task_name").value;
	var company_task_category = document.getElementById("company_task_category").value;
	var add_category = document.getElementById("add_category").value;
	
	var due_day = document.getElementById("due_day").value;
	var due_month = document.getElementById("due_month").value;
	var due_year = document.getElementById("due_year").value;
	var due_hour = document.getElementById("due_hour").value;
	var due_minute = document.getElementById("due_minute").value;
	var alarm_value = document.getElementById("alarm_value").value;
	var alarm_unit = document.getElementById("alarm_unit").value;
	var company_task_priority = document.getElementById("company_task_priority").value;
	var company_task_status = document.getElementById("company_task_status").value;
	var company_task_text = document.getElementById("company_task_text").value;
	
	if(document.task.alarm[1].checked == true){
		var alarm = 1;	
	} else {
		var alarm = 0;
	}
	
	if(document.task.due_type[1].checked == true){
		var due_type_none = 1;
	} else {
		var due_type_none = 0;
	}
	
	if(document.task.due_am_pm_am[1].checked == true){
		var due_am_pm_am = "PM";
	} else {
		due_am_pm_am = "AM";
	}
	
	
	display_progress();
	urlVars = {}
    bodyVars = {company_task_text:company_task_text,company_task_status:company_task_status,company_task_priority:company_task_priority,alarm_value:alarm_value,alarm_unit:alarm_unit,alarm:alarm,due_am_pm_am:due_am_pm_am,due_minute:due_minute,due_hour:due_hour,due_year:due_year,due_month:due_month,due_day:due_day,due_type_none:due_type_none,add_category:add_category,company_task_category:company_task_category,company_task_name:company_task_name,company_id:company_id,submit:'submit'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:ajax_new_task", bodyVars, urlVars, on_response,false, "a postVars request"); 
	alert('The Task was saved');
	javascript:load_company_task('Task','','ASC','')  	

}

function edit_task(task_id){
	display_progress();
	urlVars = {}
	bodyVars = {task_id:task_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:ajax_edit_task", bodyVars, urlVars, on_response,false, "a postVars request"); 
	
}

function update_company_task(){
	var company_id = document.getElementById("company_id").value;
	var company_task_name = document.getElementById("company_task_name").value;
	var company_task_category = document.getElementById("company_task_category").value;
	var add_category = document.getElementById("add_category").value;
	
	var due_day = document.getElementById("due_day").value;
	var due_month = document.getElementById("due_month").value;
	var due_year = document.getElementById("due_year").value;
	var due_hour = document.getElementById("due_hour").value;
	var due_minute = document.getElementById("due_minute").value;
	var alarm_value = document.getElementById("alarm_value").value;
	var alarm_unit = document.getElementById("alarm_unit").value;
	var company_task_priority = document.getElementById("company_task_priority").value;
	var company_task_status = document.getElementById("company_task_status").value;
	var company_task_text = document.getElementById("company_task_text").value;
	var company_task_id = document.getElementById("company_task_id").value;
	var company_task_create = document.getElementById("company_task_create").value;
	var company_task_create_by = document.getElementById("company_task_create_by").value;
	
	if(document.task.alarm[1].checked == true){
		var alarm = 1;	
	} else {
		var alarm = 0;
	}
	
	if(document.task.due_type[1].checked == true){
		var due_type_none = 1;
	} else {
		var due_type_none = 0;
	}
	
	if(document.task.due_am_pm_am[1].checked == true){
		var due_am_pm_am = "PM";
	} else {
		due_am_pm_am = "AM";
	}
	
	
	display_progress();
	urlVars = {}
    bodyVars = {company_task_create_by:company_task_create_by,company_task_create:company_task_create,company_task_id:company_task_id,company_task_text:company_task_text,company_task_status:company_task_status,company_task_priority:company_task_priority,alarm_value:alarm_value,alarm_unit:alarm_unit,alarm:alarm,due_am_pm_am:due_am_pm_am,due_minute:due_minute,due_hour:due_hour,due_year:due_year,due_month:due_month,due_day:due_day,due_type_none:due_type_none,add_category:add_category,company_task_category:company_task_category,company_task_name:company_task_name,company_id:company_id,submit:'submit'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:ajax_edit_task", bodyVars, urlVars, on_response,false, "a postVars request"); 
	alert('The Task was updated');
	edit_task(company_task_id);
	
}

// Notes
function add_note(activity){
	var company_id = document.getElementById("company_id").value;
	clear_tbs(activity);
    urlVars = {}
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_new_note&note_type=company_id&note_type_id='+company_id,bodyVars, urlVars, on_response,false, "a postVars request");
}

function edit_note(note_id) {
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_edit_note&note_id=' + note_id, bodyVars, urlVars, on_response,false, "a postVars request");

}


// Contract
function load_company_contract() {
	display_contract_progress();
	var company_id = document.getElementById("company_id").value;
	urlVars = {}
	bodyVars = {company_id:company_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_load_contract", bodyVars, urlVars, on_contract,false, "a postVars request");
}

function select_contract() {
	var contract_type_id = document.getElementById("contract_type_id").value;
	urlVars = {}
	bodyVars = {contract_type_id:contract_type_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=contract_to_company:ajax_load_contract_options", bodyVars, urlVars, on_contract,false, "a postVars request");
}

function save_new_contract() {
	var company_id = document.getElementById("company_id").value;
	var contract_type_id = document.getElementById("contract_type_id").value;
	var contract_to_company_start_date = document.getElementById("contract_to_company_start_date").value;
	var contract_to_company_amount = document.getElementById("contract_to_company_amount").value;
	var contract_to_company_term = document.getElementById("contract_to_company_term").value;
	var contract_to_company_increament = document.getElementById("contract_to_company_increament").value;
	var contract_to_company_covered_labor = document.getElementById("contract_to_company_covered_labor").value;
    var contract_to_company_covered_labor_rate = document.getElementById("contract_to_company_covered_labor_rate").value;
    var contract_to_company_non_covered_labor_rate = document.getElementById("contract_to_company_non_covered_labor_rate").value;
    var contract_to_company_call_min = document.getElementById("contract_to_company_call_min").value;
    var contract_to_company_call_covered_rate = document.getElementById("contract_to_company_call_covered_rate").value;
    var contract_to_company_call_non_covered_rate = document.getElementById("contract_to_company_call_non_covered_rate").value;


	var submit = document.getElementById("submit").value;
	urlVars = {}
	bodyVars = {company_id:company_id,
        contract_type_id:contract_type_id,
        contract_to_company_start_date:contract_to_company_start_date,
        contract_to_company_amount:contract_to_company_amount,
        contract_to_company_term:contract_to_company_term,
        contract_to_company_increament:contract_to_company_increament,
        contract_to_company_covered_labor:contract_to_company_covered_labor,
        contract_to_company_covered_labor_rate:contract_to_company_covered_labor_rate,
        contract_to_company_non_covered_labor_rate:contract_to_company_non_covered_labor_rate,
        contract_to_company_call_min:contract_to_company_call_min,
        contract_to_company_call_covered_rate:contract_to_company_call_covered_rate,
        contract_to_company_call_non_covered_rate:contract_to_company_call_non_covered_rate,
        submit:submit
    }
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=contract_to_company:ajax_load_contract_options", bodyVars, urlVars, on_contract,false, "a postVars request");
	alert('Contract Added to Account');
	load_company_contract();	
}


function save_note(){
	var note_type = document.getElementById("note_type").value;
	var note_type_id = document.getElementById("note_type_id").value;
	var note_text = document.getElementById("note_text").value;
    var note_subject = document.getElementById("note_subject").value;
	var submit = document.getElementById("submit").value;
	var error = false;
	var errorMsg = 'There where errors saving your Note\n';	
	// Validate note_type
	if(note_type == "") {
		error = true;
		errorMsg = errorMsg + '-- No note type specified. This is a system error please report it! --\n';
        document.getElementById("note_type").className='formError';
	}
	// validate note_type_id
	if(note_type_id == "") {
		error = true;
		errorMsg = errorMsg + '-- No Note Type ID specified. This is a system error please report it! --\n';
	}
    if(note_subject == "") {
        error = true;
		errorMsg = errorMsg + '-- Subject is Required --\n';
        document.getElementById("note_subject").className='formError';
    }
	if(note_text == ""){
		error = true;
		errorMsg = errorMsg + '-- Your note is empty! --\n';
        document.getElementById("note_text").className='formError';
	}
	if(error == false) {
		urlVars = {}
		bodyVars = {note_type:note_type,note_type_id:note_type_id,note_text:note_text,note_subject:note_subject,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_new_note", bodyVars, urlVars, on_response,false, "a postVars request");		
		alert('Your Note was saved.');
		load_company_notes('Notes','note_create_date','DESC','');
	} else {
		errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		alert(errorMsg);
	}	
}

function update_note() {
    var note_id = document.getElementById("note_id").value;
    var note_subject = document.getElementById("note_subject").value;
    var note_text = document.getElementById("note_text").value;
    var error = false;
	var errorMsg = 'There where errors saving your Note\n';
    if(document.getElementById("delete").checked) {
        var do_delete = '1';
    } else {
         var do_delete = '0';
    }
    if(note_id == "") {
        error = true;
		errorMsg = errorMsg + '-- No note ID. This is a system error please report it! --\n';
    }
    if(note_subject == "") {
        error = true;
		errorMsg = errorMsg + '-- Subject is Required --\n';
        document.getElementById("note_subject").className='formError';
    }
	if(note_text == ""){
		error = true;
		errorMsg = errorMsg + '-- Your note is empty! --\n';
        document.getElementById("note_text").className='formError';
	}
	if(error == false) {
		urlVars = {}
		bodyVars = {note_id:note_id,note_subject:note_subject,note_text:note_text,do_delete:do_delete,submit:'update'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_edit_note", bodyVars, urlVars, on_response,false, "a postVars request");
        if(do_delete == true) {
            alert('The note was Deleted');
        } else {
            alert('The note was Updated');
        }
        load_company_notes('Notes','note_create_date','DESC','');

	} else {
		errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		alert(errorMsg);
	}
}


// Calls

function load_company_calls(activity,field,sort,next) {
	var support_call_type = 'company_id';
	var support_call_type_id = document.getElementById("company_id").value;
	clear_tbs(activity);
	display_progress();
	bodyVars = {support_call_type:support_call_type,support_call_type_id:support_call_type_id,field:field,sort:sort,next:next}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_load_support_calls", bodyVars, urlVars, on_response,false, "a postVars request");
}

function start_call() {
	var support_call_type = 'company_id';
	var support_call_type_id = document.getElementById("company_id").value;
	
	bodyVars = {support_call_type:support_call_type,support_call_type_id:support_call_type_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_start_support_call", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_call(){
	var support_call_type = 'company_id';
	var support_call_type_id = document.getElementById("company_id").value;
	
	var startMonth = document.getElementById("startMonth").value;
	var startDay = document.getElementById("startDay").value;
	var startYear = document.getElementById("startYear").value;
	var startHour = document.getElementById("startHour").value;
	var startMinute = document.getElementById("startMinute").value;
	var endMonth = document.getElementById("endMonth").value;
	var endDay = document.getElementById("endDay").value;
	var endYear = document.getElementById("endYear").value;
	var endHour = document.getElementById("endHour").value;
	var endMinute = document.getElementById("endMinute").value;
	
	var isBillable = document.getElementById("isBillable").value;
	var support_call_notes = document.getElementById("support_call_notes").value;
	
	var check_start = Date.UTC(startYear, startMonth, startDay, startHour, startMinute, 0); 
	var check_end = Date.UTC(endYear, endMonth, endDay, endHour, endMinute, 0);
	var error = 'false';
	var errorMsg = 'There where errors saving your call\n';
	
	
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Time is less than or equal to Start Time --\n';
        document.getElementById("endMonth").className='formError';
        document.getElementById("endDay").className='formError';
        document.getElementById("endYear").className='formError';
        document.getElementById("endHour").className='formError';
        document.getElementById("endMinute").className='formError';		
	}
	
	if(support_call_notes == ''){
		error = true;
		errorMsg = errorMsg + '-- You must provide the call details --\n';
        document.getElementById("support_call_notes").className='formError';
	} else {
		 document.getElementById("support_call_notes").className='';
	}
	
	if(error == 'false') {	
		bodyVars = {endMinute:endMinute,endHour:endHour,endYear:endYear,endDay:endDay,endMonth:endMonth,startMinute:startMinute,startHour:startHour,startYear:startYear,startDay:startDay,startMonth:startMonth,support_call_notes:support_call_notes,isBillable:isBillable,support_call_type:support_call_type,support_call_type_id:support_call_type_id,submit:'submit'}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_end_support_call", bodyVars, urlVars, on_response,false, "a postVars request");
		alert('You call was saved');
		javascript:load_company_calls('Support','','ASC','');
	}else{
		errorMsg = errorMsg + '\nPlease correct the errors and re-submit';
		alert(errorMsg);	
	}
}

function view_call(support_call_id) {
	bodyVars = {support_call_id:support_call_id}	
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_view_support_call", bodyVars, urlVars, on_response,false, "a postVars request");
		
}

function update_call_time(){
    bodyVars = {}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_update_current_time", bodyVars, urlVars, on_update_call_time,false, "a postVars request");
}

function on_update_call_time(text, headers, callingContext){
    document.getElementById("call_end").innerHTML = text;
}

//files
function load_files(activity,field,sort,next) {
	var file_type = 'company_id';
	var file_type_id = document.getElementById("company_id").value;	
	clear_tbs(activity);	
	display_progress();
	bodyVars = {file_type_id:file_type_id,file_type: file_type,field:field,sort:sort,next:next}	
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_load_file", bodyVars, urlVars, on_response,false, "a postVars request");
}

function add_file(activity){
	var company_id = document.getElementById("company_id").value;
	clear_tbs(activity);
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_new_file&file_type=company_id&file_type_id='+company_id,bodyVars, urlVars, on_response,false, "a postVars request");
}

function delete_file(file_id) {
	 var answer = confirm ('Are you sure you want to Delete this File?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {file_id:file_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:delete_file", bodyVars, urlVars, on_response,false, "a postVars request");
        alert('The File was deleted');
        display_progress();
        load_files('Files','file_create_date','ASC','1');
    } else {

    }
	
}



// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function on_contract(text, headers, callingContext) {
	document.getElementById("contractBox").innerHTML = text;
}

function on_details(text, headers, callingContext) {
	document.getElementById("detailsBox").innerHTML = text;
}

function start_timer(text, headers, callingContext) {
	document.getElementById("timerBox").innerHTML = text;
	document.getElementById("noCallRunning").innerHTML = '';
}

function clear_tbs(activity){
	document.getElementById('Address').className='other';
	document.getElementById('Contacts').className='other';
	document.getElementById('Sytemes').className='other';
	document.getElementById('Workorders').className='other';
	document.getElementById('Invoices').className='other';
	document.getElementById('Support').className='other';	
	document.getElementById('Notes').className='other';
	document.getElementById('Files').className='other';
    document.getElementById('Meeting').className='other';
    document.getElementById('Task').className='other';
	document.getElementById(activity).className='current';

}

function upload_file() {

	parent.fileWindow.hide();
	progressWindow=dhtmlmodal.open('progressBox', 'div', 'progress_bar', 'Uploading File', 'width=400px,height=100px,center=1,resize=0,scrolling=0');	
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function display_contract_progress() {
	document.getElementById("contractBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function bookmark() {
    var company_id = document.getElementById("company_id").value;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    var bookmark_description ='{/literal}{$company->get_company_name()|escape:'javascript'}{literal}' + ' Company';
    urlVars = {}
    bodyVars = {user_id:user_id,bookmark_type:'Account',bookmark_description:bookmark_description,bookmark_type_id:company_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:add_bookmark", bodyVars, urlVars, false ,false, "a postVars request");
    alert('New Bookmark added:' + bookmark_description);
}

function open_calendar(){
	var now = new Date()
	var year = now.getFullYear();
	var day = now.getDate();
	var month = now.getMonth() +1;
	var url ="{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:view_day&Date_Year="+year+"&Date_Month="+month+"&Date_Day="+day+"&stand_alone=true&display_close=true";
			
	window.open(url,"Window1","menubar=no,width=700,height=400,toolbar=no,location=no,titlebar=no");
}
</script>
{/literal}


<body onload="load_page()">


<div id="timerBox"></div>

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

<div id="mainBox">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Account:  {$company->get_company_name()}</a></li>
	<li>
		<a href="javascript:edit_company_details()"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" align="middle" alt="Edit Account">&nbsp;Edit</a>
		<a href="{$ROOT_URL}/index.php?page=workorder:add_workorder&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/sinfo_16.gif" border="0" align="middle" alt="Create New Workorder">&nbsp;Workorder</a>
		<a href="javascript:add_user()"><img src="{$ROOT_URL}/images/icons/user_16.gif" border="0" align="middle" alt="Add Contact to Account">&nbsp;Contact</a>
		<a href="{$ROOT_URL}/index.php?page=system:add_system&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/save_16.gif" border="0" align="middle" alt="Add System to Account">&nbsp;System</a>
		<a href="javascript:add_note('Notes');"><img src="images/icons/notep_16.gif" border="0" align="middle" alt="Add a Note">&nbsp;Note</a>
		<a href="javascript:add_file('Files');"><img src="images/icons/open_16.gif" border="0" align="middle" alt="add A File">&nbsp;File</a>
		<a href="javascript:start_call('Support');"><img src="images/icons/phone_16.gif" border="0" align="middle" alt="Start A Call">&nbsp;Call</a>
	</li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >

			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td valign="top" class="data" width="250"><div id="detailsBox"></div></td>
					<td valign="top" class="small"><div id="contractBox"></div></td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<br>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="javascript:load_company_address('Address','Service');" id="Address">Address</a></li>
	<li id="Marketing_sp_tab"><a  href="javascript:load_company_users('Contacts','user_id', 'ASC', '');" id="Contacts">Contacts</a></li>
	<li id="Activities_sp_tab"><a  href="javascript:load_company_systems('Sytemes','system_id','ASC','')" id="Sytemes">Systems</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_company_workorders('Workorders','workorder_open_date','DESC','');" id="Workorders">Workorders</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_company_invoices('Invoices','invoice_id','ASC','')" id="Invoices">Statements</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_company_calls('Support','','ASC','')" id="Support">Calls</a></li>
    <li id="Activities_sp_tab"><a href="javascript:load_company_meeting('Meeting','','ASC','')" id="Meeting">Meetings</a></li>
    <li id="Activities_sp_tab"><a href="javascript:load_company_task('Task','','ASC','')" id="Task">Tasks</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_company_notes('Notes','note_create_date','DESC','')" id="Notes">Notes</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_files('Files','file_create_date','ASC','')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>

</div>
{include file="core/footer.tpl"}
