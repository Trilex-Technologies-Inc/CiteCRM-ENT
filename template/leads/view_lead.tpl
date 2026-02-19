<!-- view_lead.tpl -->
{include file="core/header.tpl"}

{literal}
<script type="text/javascript">
//page load
function page_load() {
	load_details();
	load_activity('Call');
}

function load_details() {
	var lead_id = document.getElementById("lead_id").value
	details_progress()
	urlVars = {}
	bodyVars = {lead_id:lead_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_lead_details", bodyVars, urlVars, display_details,false, "a postVars request");
}

function edit_lead() {
	var lead_id = document.getElementById("lead_id").value;
    details_progress()
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_lead&lead_id='+lead_id, bodyVars, urlVars, display_details,false, "a postVars request");
}

function save_lead_details() {
	var lead_id = document.getElementById("lead_id").value;
	var campaign_type_id = document.getElementById("campaign_type_id").value;
	var lead_assigned_user = document.getElementById("lead_assigned_user").value;
	var lead_status_id = document.getElementById("lead_status_id").value;
	var lead_type_id = document.getElementById("lead_type_id").value;
	var company_name = document.getElementById("company_name").value;
	var lead_referer = document.getElementById("lead_referer").value;
	var company_street_1 = document.getElementById("company_street_1").value;
	var company_street_2 = document.getElementById("company_street_2").value;
	var company_city = document.getElementById("company_city").value;
	var state_id = document.getElementById("state_id").value;
	var company_country	= document.getElementById("company_country").value;
	var company_postal_code = document.getElementById("company_postal_code").value;
	var company_id = '{/literal}{$leadObj->get_company_id()}{literal}';
	var company_address_id = document.getElementById("company_address_id").value;
	var company_email = document.getElementById("company_email").value;
	var company_contact = document.getElementById("company_contact").value;
    var business_phone = document.getElementById("business_phone").value;
    var business_fax = document.getElementById("business_fax").value
   
    var error = false;
	var errorMsg = 'There where errors saving your Lead\n';

     if(company_name == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Account Name ! --\n';
        document.getElementById("company_name").className='formError';
    }

    if(company_contact == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Contact Name ! --\n';
            document.getElementById("company_contact").className='formError';
    }

    

   
    if(error == false) {

        urlVars = {}
        bodyVars = {lead_id:lead_id,campaign_type_id:campaign_type_id,lead_assigned_user:lead_assigned_user,lead_status_id:lead_status_id,lead_type_id:lead_type_id,company_name:company_name,lead_referer:lead_referer,company_street_1:company_street_1,company_street_2:company_street_2,company_city:company_city,state_id:state_id,company_country:company_country,company_postal_code:company_postal_code,company_id:company_id,company_address_id:company_address_id,company_email:company_email,company_contact:company_contact,business_phone:business_phone,business_fax:business_fax,submit:'submit'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_lead", bodyVars, urlVars, display_details,false, "a postVars request");
        alert('Lead was Updated');
        load_details();
    } else {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Lead Details';
		alert(errorMsg);
    }
    
}

function openCall(id){
	//Open a modal window populated with the contents of a hidden DIV, and assign the result to a global variable called "emailwindow"
	emailwindow=dhtmlmodal.open('CallBox', 'div', id, 'Call Details', 'width=400px,height=400px,center=1,resize=1,scrolling=0')
}

function convertLead() {
	var lead_id = document.getElementById("lead_id").value;
	convertWindow=dhtmlmodal.open('convertBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=leads:convert&lead_id='+lead_id, 'Covert Lead', 'width=400px,height=400px,center=1,resize=1,scrolling=1')
}

function convert(){
	var lead_id =  document.getElementById("lead_id").value;
	urlVars = {}
	bodyVars = {Submit:'submit',lead_id:lead_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:convert", bodyVars, urlVars, display_pannel,false, "a postVars request");
	alert('Coverted Lead to Account');	
	// Do conversion
	parent.convertWindow.hide();
	//redirect
	window.location = '{/literal}{$ROOT_URL}{literal}//index.php?page=company:search_company';
}

// Notes
function load_notes(activity,field,sort,next) {
	var lead_id = document.getElementById("lead_id").value;
	clear_tbs(activity);
	display_progress();
	urlVars = {}
	bodyVars = {lead_id:lead_id ,field:field,sort:sort,next:next}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_load_by_lead", bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function add_note(activity){
	var company_id = document.getElementById("lead_id").value;
	clear_tbs(activity);
    display_progress();
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_new_note&note_type=lead_id&note_type_id='+company_id, bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function edit_note(note_id) {
    clear_tbs('Notes');
    display_progress();
    urlVars = {}
    bodyVars = {}
    ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_edit_note&note_id=' + note_id, bodyVars, urlVars, display_pannel,false, "a postVars request");
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
	}
	// validate note_type_id
	if(note_type_id == "") {
		error = true;
		errorMsg = errorMsg + '-- No Note Type ID specified. This is a system error please report it! --\n';
	}
	if(note_text == ""){
		error = true;
        document.getElementById("note_text").className='formError';
		errorMsg = errorMsg + '-- Note Description is Required! --\n';
        
	}
    if(note_subject == "") {
        error = true;
        document.getElementById("note_subject").className='formError';
		errorMsg = errorMsg + '-- Note Subject is Required! --\n';
    }

	if(error == false) {		
		urlVars = {}
		bodyVars = {note_type:note_type,note_type_id:note_type_id,note_text:note_text,note_subject:note_subject,submit:submit}
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_new_note", bodyVars, urlVars, display_pannel,false, "a postVars request");		
		alert('Your Note was saved.');
		load_notes('Notes','note_create_date','ASC','');
	} else {
		errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		alert(errorMsg);
	}
}

function update_note() {
    var note_id = document.getElementById("note_id").value;
    var note_subject = document.getElementById("note_subject").value;
    var note_text = document.getElementById("note_text").value;

    if(document.getElementById("delete").checked) {
        var do_delete = '1';
    } else {
         var do_delete = '0';
    }
    

    var error = false;
	var errorMsg = 'There where errors saving your Note\n';

    if(note_id == "") {
        error = true;
		errorMsg = errorMsg + '-- No note ID. This is a system error please report it! --\n';

    }

    if(note_subject == "") {
        error = true;
        document.getElementById("note_subject").className='formError';
		errorMsg = errorMsg + '-- Note Subject is Required! --\n';
    }

	if(note_text == ""){
		error = true;
        document.getElementById("note_text").className='formError';
		errorMsg = errorMsg + '-- Note Description is Required! --\n';
	}
	if(error == false) {
	
		urlVars = {}
		bodyVars = {note_id:note_id,note_subject:note_subject,note_text:note_text,do_delete:do_delete,submit:'update'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=note:ajax_edit_note", bodyVars, urlVars, on_response,false, "a postVars request");
        if(do_delete == '1') {
            alert('The Note was deleted');
        } else {
            alert('The Note was updated');
        }
        load_notes('Notes','note_create_date','DESC','');
	} else {
		errorMsg = errorMsg + '\nPlease correct the errors and save your Note';
		alert(errorMsg);
	}
}

function bookmark() {
    var lead_id = document.getElementById("lead_id").value;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    var bookmark_description ='{/literal}{$leadObj->get_company_id()|company_name}{literal}' + ' Lead';
    urlVars = {}
    bodyVars = {user_id:user_id,bookmark_type:'Lead',bookmark_description:bookmark_description,bookmark_type_id:lead_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:add_bookmark", bodyVars, urlVars, false ,false, "a postVars request");
    alert('New Bookmark added:' + bookmark_description);

}

function newMail() {


}

// Add Activity
function add_activity(activity_type) {
    display_progress();
	var lead_id = document.getElementById("lead_id").value;
	var activity = activity_type;
	urlVars = {}
	bodyVars = {lead_id:lead_id,activity:activity}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:add_activity", bodyVars, urlVars, display_pannel,false, "a postVars request");
}


function load_activity(activity) {
	var lead_id = document.getElementById("lead_id").value
	clear_tbs(activity)
	display_progress();
	urlVars = {}
	bodyVars = {lead_id:lead_id ,activity:activity}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_load_activity", bodyVars, urlVars, display_pannel,false, "a postVars request");
}


function add_call(){
	var lead_id = document.getElementById("lead_id").value;
	var lead_call_text = document.getElementById("lead_call_text").value;
	var lead_call_subject = document.getElementById("lead_call_subject").value;
	var activity = document.getElementById("activity").value;
	var Date_Month = document.getElementById("Date_Month").value;
	var Date_Day = document.getElementById("Date_Day").value;
	var Date_Year = document.getElementById("Date_Year").value;
	var startHour = document.getElementById("startHour").value;
	var startMinute = document.getElementById("startMinute").value;
	var endHour = document.getElementById("endHour").value;
	var endMinute = document.getElementById("endMinute").value;
	var add_to_calendar = document.getElementById("add_to_calendar").value;
	var user_id = document.getElementById("user_id").value;
	var error;
	var errorMsg;
	urlVars = {}
	bodyVars = {user_id:user_id,add_to_calendar:add_to_calendar,lead_id:lead_id ,Submit:'submit',lead_id:lead_id,lead_call_text:lead_call_text,lead_call_subject:lead_call_subject,activity:activity,Date_Month:Date_Month,Date_Day:Date_Day,Date_Year:Date_Year,startHour:startHour,startMinute:startMinute,endHour:endHour,endMinute:endMinute}

	error = 'false';
	errorMsg = 'There where errors processing your form\n';

	if(lead_call_text == '') {
		errorMsg = errorMsg + '-- You must provide the Call Details --\n';
		document.getElementById("lead_call_text").className='formError';
		error ='true';
	} 

	if(document.getElementById("lead_call_subject").value == '') {
		errorMsg = errorMsg + '-- You must provide the Call Subject -- \n';
		document.getElementById("lead_call_subject").className='formError';
		error ='true';
	}
    if(endMinute + endHour < 1) {
        errorMsg = errorMsg + '-- You must set the Call Duration -- \n';
        document.getElementById("endMinute").className='formError';
        document.getElementById("endHour").className='formError';
        error ='true';
    }

	if(error == 'false') {
		ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:add_activity", bodyVars, urlVars, display_pannel,false, "a postVars request");
		alert('Your Call has been recorded');
		load_activity('Call');
	} else {
		errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);
	}
}

function load_edit_call_window(lead_call_id) { 
    var lead_id = document.getElementById("lead_id").value
	clear_tbs('Call');
    display_progress();
    urlVars = {}
	bodyVars = {lead_call_id:lead_call_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_call", bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function update_call() {
    var lead_call_id = document.getElementById("lead_call_id").value;

    var Date_Month = document.getElementById("Date_Month").value;
	var Date_Day = document.getElementById("Date_Day").value;
	var Date_Year = document.getElementById("Date_Year").value;
	var startHour = document.getElementById("startHour").value;
	var startMinute = document.getElementById("startMinute").value;
    var endDay  = document.getElementById("endDay").value;
    var endMonth  = document.getElementById("endMonth").value;
    var endYear  = document.getElementById("endYear").value;
	var endHour = document.getElementById("endHour").value;
	var endMinute = document.getElementById("endMinute").value;
	var user_id = document.getElementById("user_id").value;
	var add_to_calendar = document.getElementById("add_to_calendar").value;
	
    var lead_call_subject = document.getElementById("lead_call_subject").value;
    var lead_call_text = document.getElementById("lead_call_text").value;
    var error;
	var errorMsg;

    error = 'false';
	errorMsg = 'There where errors processing your form\n';

    if(lead_call_id < 1) {
        errorMsg = errorMsg + '-- Server Error No Lead Call ID --\n';
		error ='true';
    }
    if(lead_call_subject == "") {
        errorMsg = errorMsg + '-- You must provide the Call Subject --\n';
		document.getElementById("lead_call_subject").className='formError';
		error ='true';
    }
    if(lead_call_text == '') {
		errorMsg = errorMsg + '-- You must provide the Call Details --\n';
		document.getElementById("lead_call_text").className='formError';
		error ='true';
	}

    if(document.getElementById("delete").checked) {
        var do_delete = '1';
    } else {
         var do_delete = '0';
    }


    if(error == 'false') {
        clear_tbs('Call');
        urlVars = {}
        bodyVars = {lead_call_id:lead_call_id,user_id:user_id,add_to_calendar:add_to_calendar,Date_Month:Date_Month,Date_Day:Date_Day,Date_Year:Date_Year,startHour:startHour,startMinute:startMinute,endDay:endDay,endMonth:endMonth,endYear:endYear,endHour:endHour,endMinute:endMinute,
        lead_call_subject:lead_call_subject,lead_call_text:lead_call_text,do_delete:do_delete,submit:'submit'}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_call", bodyVars, urlVars, display_pannel,false, "a postVars request");

        if(do_delete == true) {
            alert('Call Record Was Deleted');
        } else {
            alert('Call Record was Updated');
        }
        display_progress();
        load_activity('Call');

    } else {
        errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
    }
}

function add_meeting() {
	var activity = document.getElementById("activity").value;
	var lead_id = document.getElementById("lead_id").value;
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
	var lead_meeting_active = document.getElementById("lead_meeting_active").value;
	var lead_meeting_subject = document.getElementById("lead_meeting_subject").value;
    var lead_meeting_text = document.getElementById("lead_meeting_text").value;
    var user_id = document.getElementById("user_id").value;
    var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

	var error;
	var errorMsg;
	urlVars = {}
	bodyVars = {Submit: 'submit',user_id:user_id,activity:activity,lead_id:lead_id,startMonth:startMonth,startDay:startDay,startYear:startYear,startHour:startHour,startMinute:startMinute,endMonth:endMonth,endDay:endDay,endYear:endYear,endHour:endHour,endMinute:endMinute,lead_meeting_active:lead_meeting_active,lead_meeting_subject:lead_meeting_subject,lead_meeting_text:lead_meeting_text}

    var check_start = Date.UTC(startYear, startMonth, startDay, startHour, startMinute, 0); 
	var check_end = Date.UTC(endYear, endMonth, endDay, endHour, endMinute, 0);

	var busines_start = Date.UTC(startYear,startMonth,startDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startYear, startMonth, startDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);

	error = 'false';
	errorMsg = 'There where errors processing your form\n';

	if(document.getElementById("lead_meeting_subject").value == ''){
		error = 'true';
		errorMsg = errorMsg + '-- You must provide the Subject --\n';
		document.getElementById("lead_meeting_subject").className='formError';
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
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:add_activity", bodyVars, urlVars, display_pannel,false, "a postVars request");
            alert('Your Meeting has been recorded');
            load_activity('Meeting');
        }


	} else {
		errorMsg = errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
	}
}

function load_edit_meeting_window(lead_meeting_id) {
	clear_tbs('Meeting');
    display_progress();
    urlVars = {}
	bodyVars = {lead_meeting_id:lead_meeting_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_meeting", bodyVars, urlVars, display_pannel,false, "a postVars request");

}

function update_meeting() {

    var lead_meeting_id = document.getElementById("lead_meeting_id").value;
    var lead_id = document.getElementById("lead_id").value;
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
	var lead_meeting_subject = document.getElementById("lead_meeting_subject").value;
	var user_id = document.getElementById("user_id").value;
    var lead_meeting_text = document.getElementById("lead_meeting_text").value;
    
    var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

    if(document.getElementById("delete").checked) {
        var do_delete = '1';
    } else {
         var do_delete = '0';
    }

	var error;
	var errorMsg;

	urlVars = {}
	bodyVars = {submit: 'submit',user_id:user_id,lead_meeting_id:lead_meeting_id,lead_id:lead_id,startMonth:startMonth,startDay:startDay,startYear:startYear,startHour:startHour,startMinute:startMinute,endMonth:endMonth,endDay:endDay,endYear:endYear,endHour:endHour,endMinute:endMinute,lead_meeting_subject:lead_meeting_subject,lead_meeting_text:lead_meeting_text,do_delete:do_delete}

    var check_start = Date.UTC(startYear, startMonth, startDay, startHour, startMinute, 0); 
	var check_end = Date.UTC(endYear, endMonth, endDay, endHour, endMinute, 0);

	var busines_start = Date.UTC(startYear,startMonth,startDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startYear, startMonth, startDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);

	error = 'false';
	errorMsg = 'There where errors processing your form\n';

    if(lead_meeting_id < 1 ) {
        error = 'true';
		errorMsg = errorMsg + '-- Server Error! No Leed Meeting ID --\n';
    }

	if(document.getElementById("lead_meeting_subject").value == ''){
		error = 'true';
		errorMsg = errorMsg + '-- You must provide the Subject --\n';
		document.getElementById("lead_meeting_subject").className='formError';
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
				do_post = true;
			} else {
				do_post = false;
				return false;
			}
		} 
					

		// Validate end time is not greater than Business CLose date
		if(check_end > bussines_end) {

			var end_answer = confirm ('Are you sure you want to set the End Time After the Company Closes?\n If you want to set the Event to span multiple days it is recomended that you set start and End times for each day the event is to take place. This way the event will show on each day.\n\nClick Cancel to go back and edit the End Time');

			if(end_answer){
				do_post = true;
			} else {
				do_post = false;
				return false;
			}
		} 



	if(error == 'false') {

        if(do_post == true) {
            ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=leads:ajax_edit_meeting", bodyVars, urlVars, display_pannel,false, "a postVars request");
            alert('Your Meeting was Updated');
            load_activity('Meeting');
        }


	} else {
		errorMsg = errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
	}

}

// Email
function add_email(){
	var error;
	var errorMsg;
	urlVars = {}
	bodyVars = {Submit: document.getElementById("submit").value,activity: document.getElementById("activity").value,lead_id: document.getElementById("lead_id").value,email_to: document.getElementById("email_to").value,email_name: document.getElementById("email_name").value,email_text: document.getElementById("email_text").value,email_subject: document.getElementById("email_subject").value}
	error = 'false';
	errorMsg = 'There where errors processing your form\n';
	if(document.getElementById("email_text").value == ''){
		errorMsg = errorMsg + '-- You can not send an empty email --\n';
		document.getElementById("email_text").className='formError';
		error = 'true';
	}
	if(document.getElementById("email_subject").value == ''){
		errorMsg = errorMsg + '-- You need a subject --\n';
		document.getElementById("email_subject").className='formError';
		error = 'true';
	}
	if(error == 'false') {
		ajaxCaller.postVars("index.php?page=leads:add_activity", bodyVars, urlVars, display_pannel,false, "a postVars request");
		alert('Your Email has been sent');
		load_activity('Email');
	} else {
		errorMsg = errorMsg + 'Please correct the errors and resubmit the form.'; 		
		alert(errorMsg);	
	}
}

function add_email_user(){
	document.getElementById("selectBox").innerHTML = "<b>Email Address</b> <input type=text name=email_address size=30> <b>Name</b> <input type=text name=email_name size=30> <input type=hidden name=add_new_user value=1>";
	
}

//files
function load_files(activity,field,sort,next) {

	var file_type = 'lead_id';
	var file_type_id = document.getElementById("lead_id").value;
	clear_tbs(activity);	
	display_progress();
	bodyVars = {file_type_id:file_type_id,file_type: file_type,field:field,sort:sort,next:next}	
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_load_file", bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function add_file(activity){
	var lead_id = document.getElementById("lead_id").value;
	clear_tbs(activity);
    bodyVars = {}
	ajaxCaller.postVars('{/literal}{$ROOT_URL}{literal}/index.php?page=file:ajax_new_file&file_type=lead_id&file_type_id='+lead_id,bodyVars, urlVars, display_pannel,false, "a postVars request");
}

function delete_file(file_id) {
	 var answer = confirm ('Are you sure you want to Delete this File?\n');
    if(answer){	
	    urlVars = {}
        bodyVars = {file_id:file_id}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=file:delete_file", bodyVars, urlVars, display_pannel,false, "a postVars request");
        alert('The File was deleted');
        display_progress();
        load_files('Files','file_create_date','ASC','1');
    } else {

    }
	
}


// Window Display
function display_pannel(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_details(text, headers, callingContext) {
	document.getElementById("detailsBox").innerHTML = text;
}

function details_progress() {
	document.getElementById("detailsBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

function clear_tbs(activity) {
	document.getElementById('Call').className='other';
	document.getElementById('Meeting').className='other';
	document.getElementById('Email').className='other';
	document.getElementById('Notes').className='other';
	document.getElementById('Files').className='other';
	document.getElementById(activity).className='current';
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


<body onload="page_load();">

<div id="box"></div>

<input type="hidden" name="lead_id" value="{$leadObj->get_lead_id()}" id="lead_id">


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Lead Information</a></li>
	<li>
	{if $edit}
		<a href="javascript:edit_lead();"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" align="middle" alt="Edit Lead">&nbsp;Edit</a>
		<a href="javascript:add_activity('Call');"><img src="{$ROOT_URL}/images/icons/phone_16.gif" border="0" align="middle" alt="Start Tech Support Call">&nbsp;Call</a>
		<a href="javascript:add_activity('Meeting');"><img src="{$ROOT_URL}/images/icons/group_16.gif" border="0" align="middle" alt="Record a Meeting">&nbsp;Meeting</a>
		<a href="javascript:add_activity('Email');"><img src="{$ROOT_URL}/images/icons/mail_16.gif" border="0" align="middle" alt="Email Client">&nbsp;Email</a>
		<a href="javascript:add_note('Notes');"><img src="{$ROOT_URL}/images/icons/notep_16.gif" border="0" align="middle" alt="Add Note">&nbsp;Add Note</a>
		<a href="javascript:convertLead();"><img src="{$ROOT_URL}/images/icons/copy_16.gif" border="0" align="middle" "alt="Convert Lead to Account">&nbsp;Convert</a>
        <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark Lead">&nbsp;Bookmark</a>
	{/if}	
	</li>
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
	<li id="All_sp_tab"><a  href="javascript:load_activity('Call');" id="Call">Calls</a></li>
	<li id="Marketing_sp_tab"><a  href="javascript:load_activity('Meeting');" id="Meeting">Meetings</a></li>
	<li id="Activities_sp_tab"><a  href="javascript:load_activity('Email');" id="Email">Emails</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_notes('Notes','note_create_date','DESC','1')" id="Notes">Notes</a></li>
	<li id="Activities_sp_tab"><a href="javascript:load_files('Files','file_create_date','ASC','1')" id="Files">Files</a></li>
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>
<br>
</div>
{include file="core/footer.tpl"}