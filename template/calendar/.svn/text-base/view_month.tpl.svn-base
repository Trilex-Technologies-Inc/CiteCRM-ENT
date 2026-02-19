<!-- view_month.tpl -->
{include file="core/header.tpl"}
<link rel="stylesheet" href="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.css" type="text/css" />
<link rel="stylesheet" href="{$ROOT_URL}/java/dhtmlwindow/modalfiles/modal.css" type="text/css" />

<script language="javascript" src="{$ROOT_URL}java/ajaxCaller1.js" type="text/javascript"></script>
<script language="javascript" src="{$ROOT_URL}java/util.js" type="text/javascript"></script>
<script type="text/javascript" src="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.js"></script>
<script type="text/javascript" src="{$ROOT_URL}/java/dhtmlwindow/modalfiles/modal.js"></script>

<script language="javascript" type="text/javascript">
{literal}

// Load Invoices
function load_event(event_id,etitle) {
	display_progress();
	urlVars = {}
	bodyVars = {event_id:event_id}		
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_load_event", bodyVars, urlVars, on_response,false, "a postVars request");
	document.getElementById("title").innerHTML = 'Event: '+etitle;
}

function load_day(month,day,year,field,sort,next) {	
	display_progress()

	urlVars = {}
	bodyVars = {month:month,day:day,year:year,field:field,sort:sort,next:next}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_load_day", bodyVars, urlVars, on_response,false, "a postVars request");
	document.getElementById("title").innerHTML = 'Date: '+month+"/"+day+"/"+year;
}

function load_new_event_form(year,month,day){	
	urlVars = {}
	bodyVars = {month:month,day:day,year:year}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_load_new_event", bodyVars, urlVars, open_new_event_window,false, "a postVars request");	
}


function edit_event(calendar_id){
    urlVars = {}
	bodyVars = {calendar_id:calendar_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_edit_event", bodyVars, urlVars, on_response,false, "a postVars request");
}

function save_new_event() {
	var calendar_title 		= document.getElementById("calendar_title").value;
	var calendar_text 		= document.getElementById("calendar_text").value;
	var calendar_private	= document.getElementById("calendar_private").value;
	var Submit				= document.getElementById("calendar_private").value;

	var startDateMonth		= document.getElementById("startDateMonth").value;
	var startDateDay		= document.getElementById("startDateDay").value;
	var startDateYear		= document.getElementById("startDateYear").value;
	var startTimeHour		= document.getElementById("startTimeHour").value;
	var startTimeMinute		= document.getElementById("startTimeMinute").value;

	var endDateMonth		= document.getElementById("endDateMonth").value;
	var endDateDay			= document.getElementById("endDateDay").value;
	var endDateYear			= document.getElementById("endDateYear").value;
	var endTimeHour			= document.getElementById("endTimeHour").value;
	var endTimeMinute		= document.getElementById("endTimeMinute").value;

	var user_id				= document.getElementById("user_id").value;

	var error				= false;
	var errorMsg			= 'There where errors saving your Event:\n';

	var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

	var do_post 			= true;

	urlVars = {}
	bodyVars = {
		calendar_title:calendar_title,
		calendar_text:calendar_text,
		calendar_private:calendar_private,
		user_id:user_id,
		startDateMonth:startDateMonth,
		startDateDay:startDateDay,
		startDateYear:startDateYear,
		startTimeHour:startTimeHour,
		startTimeMinute:startTimeMinute,
		endDateMonth:endDateMonth,
		endDateDay:endDateDay,
		endDateYear:endDateYear,
		endTimeHour:endTimeHour,
		endTimeMinute:endTimeMinute,
		Submit:Submit
	}
	
	
	
	var check_start = Date.UTC(startDateYear, startDateMonth, startDateDay, startTimeHour, startTimeMinute, 0); 
	var check_end = Date.UTC(endDateYear, endDateMonth, endDateDay, endTimeHour, endTimeMinute, 0);

	var busines_start = Date.UTC(startDateYear,startDateMonth,startDateDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startDateYear, startDateMonth, startDateDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);


	// Validate Start and End times
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Date is less than or equal to Start Date --\n';
		
	}

	// Validate Title
	if(calendar_title == '') {
		error = true;
		errorMsg = errorMsg + '-- Please provide the Event Title --\n';
	}

	// Validate Descripton
	if(calendar_text == '') {
		error = true;
		errorMsg = errorMsg + '-- Please provide a Descripton of your Event --\n';	
	}

	// If we have an Error
	if(error == true) {
		errorMsg = errorMsg + '\nPlease corect the errors and save your event';
		alert(errorMsg);
	} else {
		
		// Validate end time is not greater than Business CLose date
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


		// If do post is set then post it
		if(do_post == true) {
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_load_new_event", bodyVars, urlVars, open_new_event_window,false, "a postVars request");	
			alert('New Event Added');
			window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:view_month&year="+startDateYear+"&month="+startDateMonth+"&day="+startDateDay;
		}
		
	}

}

function update_event() {
    var calendar_id         = document.getElementById("calendar_id").value;
	var calendar_title 		= document.getElementById("calendar_title").value;
	var calendar_text 		= document.getElementById("calendar_text").value;
	var calendar_private	= document.getElementById("calendar_private").value;
	var Submit				= document.getElementById("calendar_private").value;

	var startDateMonth		= document.getElementById("startDateMonth").value;
	var startDateDay		= document.getElementById("startDateDay").value;
	var startDateYear		= document.getElementById("startDateYear").value;
	var startTimeHour		= document.getElementById("startTimeHour").value;
	var startTimeMinute		= document.getElementById("startTimeMinute").value;

	var endDateMonth		= document.getElementById("endDateMonth").value;
	var endDateDay			= document.getElementById("endDateDay").value;
	var endDateYear			= document.getElementById("endDateYear").value;
	var endTimeHour			= document.getElementById("endTimeHour").value;
	var endTimeMinute		= document.getElementById("endTimeMinute").value;

	var user_id				= document.getElementById("user_id").value;

	var error				= false;
	var errorMsg			= 'There where errors saving your Event:\n';

	var COMPANY_START_HOUR  = {/literal}{$COMPANY_START_HOUR}{literal};
	var COMPANY_START_MIN	= {/literal}{$COMPANY_START_MIN}{literal};
	var COMPANY_END_HOUR	= {/literal}{$COMPANY_END_HOUR}{literal};
	var COMPANY_END_MIN		= {/literal}{$COMPANY_END_MIN}{literal};

	
    if(document.getElementById("delete").checked) {
        var do_delete = '1';
    } else {
         var do_delete = '0';
    }

    var do_post = true;

	urlVars = {}
	bodyVars = {
        calendar_id:calendar_id,
		calendar_title:calendar_title,
		calendar_text:calendar_text,
		calendar_private:calendar_private,
		user_id:user_id,
		startDateMonth:startDateMonth,
		startDateDay:startDateDay,
		startDateYear:startDateYear,
		startTimeHour:startTimeHour,
		startTimeMinute:startTimeMinute,
		endDateMonth:endDateMonth,
		endDateDay:endDateDay,
		endDateYear:endDateYear,
		endTimeHour:endTimeHour,
		endTimeMinute:endTimeMinute,
        do_delete:do_delete,
		submit:'save'
	}
	
	
	
	var check_start = Date.UTC(startDateYear, startDateMonth, startDateDay, startTimeHour, startTimeMinute, 0); 
	var check_end = Date.UTC(endDateYear, endDateMonth, endDateDay, endTimeHour, endTimeMinute, 0);

	var busines_start = Date.UTC(startDateYear,startDateMonth,startDateDay,COMPANY_START_HOUR,COMPANY_START_MIN,0);
	var bussines_end = Date.UTC(startDateYear, startDateMonth, startDateDay,COMPANY_END_HOUR,COMPANY_END_MIN,0);


	// Validate Start and End times
	if(check_start >= check_end) {
		error = true;
		errorMsg = errorMsg + '-- End Date is less than or equal to Start Date --\n';
		
	}

	// Validate Title
	if(calendar_title == '') {
		error = true;
		errorMsg = errorMsg + '-- Please provide the Event Title --\n';
	}

	// Validate Descripton
	if(calendar_text == '') {
		error = true;
		errorMsg = errorMsg + '-- Please provide a Descripton of your Event --\n';	
	}

	// If we have an Error
	if(error == true) {
		errorMsg = errorMsg + '\nPlease corect the errors and save your event';
		alert(errorMsg);
	} else {
		
		// Validate end time is not greater than Business CLose date
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

        if(do_delete == true) {
            var delete_event = confirm ('Are you sure you want to delete this Event?');

            if(delete_event){
				var do_post = true;
			} else {
				var do_post = false;
				return false;
			}
        }


		// If do post is set then post it
		if(do_post == true) {
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:ajax_edit_event", bodyVars, urlVars, on_response,false, "a postVars request");
            if(do_delete == true) {
                alert('Event was deleted');
            } else {
			 alert('Event was updated');
            }
			window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=calendar:view_month&year="+startDateYear+"&month="+startDateMonth+"&day="+startDateDay;
		}
		
	}

}


function cancel_new_event() {
	document.getElementById("new_event_window").innerHTML = "";
}


// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function open_new_event_window(text, headers, callingContext) {
	document.getElementById("new_event_window").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}

</script>
{/literal}
 	
<body onload="load_day('{$month}','{$day}','{$year}','calendar_hour','ASC','1')">

<div>
	{if $view_private == '0'}
		<a href="{$ROOT_URL}/index.php?page=calendar:view_month&year={$year}&month={$month}&day={$day}&view_private=1">View My Calendar</a> 
	{else}
		<a href="{$ROOT_URL}/index.php?page=calendar:view_month&year={$year}&month={$month}&day={$day}&view_private=0">View Group Calendar</a>
	{/if}

	|| <a href="javascript:load_new_event_form('{$year}','{$month}','{$day}');">New Event</a>

</div>
<div id="new_event_window"></div>
<br>
{$html}


<br>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current"><span id="title">Date</span></a></li>
	
</ul>
<div id="spaceBox"></div>
<div id="contentBox"><br></div>

{include file="core/footer.tpl"}
