{if $SESSION_ADMIN != 1}

	{display_box_top title=$translate_text_main_menu}
						
	{display_main_nav assign=menuNav}
						
	{foreach from=$menuNav item=result}						
		<div style='height:5px; line-height:5px; background: url({$ROOT_URL}/images/theme/m_price.jpg) center repeat-x;'></div>
		<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/?page={$result->getPageSetupName()}"><img src='{$ROOT_URL}/images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>{$result->getPageSetupDisplayName()}</a>
	{/foreach}
	<div style='height:5px; line-height:5px; background: url({$ROOT_URL}/images/theme/m_price.jpg) center repeat-x;'></div>
						
	{display_box_bottom	}				
						
	{display_box_top title=$translate_text_contact}
		{$SITE_NAME}<br>
        {$COMPANY_STREET_1}<br>
		{if $COMPANY_STREET_2 != ""}
        	{$COMPANY_STREET_}<br>
        {/if}
		{$COMPANY_CITY}, {$COMPANY_STATE} {$COMPANY_POSTAL_CODE} {$COMPANY_COUNTRY}<br>
        {$COMPANY_PHONE}
		{display_box_bottom	}
												
{else}



<table width="220" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="81"   class="bg1">
			<div id="calendar-container"></div>
				<link rel="stylesheet" type="text/css" media="all" href="include/jscalendar/calendar-blue.css" title="win2k-1" />
				<script type="text/javascript" src="{$ROOT_URL}/include/jscalendar/calendar_stripped.js"></script>
				<script type="text/javascript" src="{$ROOT_URL}/include/jscalendar/lang/calendar-english.js"></script>
				<script type="text/javascript" src="{$ROOT_URL}/include/jscalendar/calendar-setup_stripped.js"></script>
				{literal}
    				<script type="text/javascript">
					function dateChanged(calendar) {
    									// Beware that this function is called even if the end-user only
   										 // changed the month/year.  In order to determine if a date was
										// clicked you can use the dateClicked property of the calendar:
											if (calendar.dateClicked) {
											// OK, a date was clicked, redirect to /yyyy/mm/dd/admin.php
											var y = calendar.date.getFullYear();
											var M = calendar.date.getMonth();  
											var m = M + 1;   // integer, 0..11
											var d = calendar.date.getDate();      // integer, 1..31
											// redirect...
											window.location = "{/literal}{$ROOT_URL}{literal}?page=calendar:view_month&year="+y+"&month="+m+"&day="+d;
											}
								};
				 				Calendar.setup(
										{
												 flat         : "calendar-container",
					 						 	flatCallback : dateChanged
											}
				 			 		);
						</script>
					{/literal}
		</td>
	</tr>
</table>
<br>

{display_box_top title="On-line Help"}
    {fetch_help license_key="1t087-nfpzg-wpx9j-m3tnr-264bx" module=$MODULE page=$PAGE}


<br>

<form name="search" action="{$ROOT_URL}/index.php?page=core:search" method="post">
<select name="search_type">
    <option value="company_name">Account</option>
    <option value="campaign_name">Campaign</option>
    <option value="user_name">Contact</option>
    <option value="invoice_id">Invoice ID</option>
    <option value="lead_name">Lead</option>
    <option value="product_name">Product</option>
    <option value="system_id">System ID</option>
    <option value="workorder_id">Workorder ID</option>
</select> <b>Quick Search</b><br>
<input type="text" name="search_text" value="{$search_text}" size="30"><input type="submit" value="Go" name="submit">

</form>
<br>


{literal}
	<script language="JavaScript">
	function startit(){
		document.write("<a href='' style='color:#737373;text-decoration:none'>Session expires in <b id='countDownText'>"+countDownTime+" </b> seconds</a>");
		countDown();
		sessionCountDown();
	}
	
	function reset_session(){
			parent.sessWindow.hide();
			countDown();
			// ajax call to reload the session
			urlVars = {}
			bodyVars = {}
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=core:sess_reload", bodyVars, urlVars, on_response,false, "a postVars request");
			// reset Counter
			stopCount();
		}

	// AJAX Responses
	function on_response(text, headers, callingContext) {
		document.getElementById("sessBox").innerHTML = text;
	}

	startit();
	
	
	var secs
	var timerID = null
	var timerRunning = false
	var delay = 1000

function InitializeTimer(){
    // Set the length of the timer, in seconds
    {/literal}
    	{if $SESSION_SET_ALARM_INTERVAL > 0}   	
			secs = {$SESSION_SET_ALARM_INTERVAL}
    	{else}
    		secs = 29
    	{/if}
    {literal}
    
    
    
    StopTheClock()
    StartTheTimer()
}

function StopTheClock(){
    if(timerRunning)
        clearTimeout(timerID)
    timerRunning = false
}

function StartTheTimer(){
    if (secs==0){
        StopTheClock()
        isAlert();
        InitializeTimer()
    }else{
        self.status = secs
        secs = secs - 1
        timerRunning = true
        timerID = self.setTimeout("StartTheTimer()", delay)
    }
}

function isAlert(){
	var start 	 = new Date();
	var myalerts = new Array();
	
	diff = start.getTime( ) 
	timestamp = Math.floor(diff / 1000 );
		
	{/literal}
		{foreach from=$task_due_array item=task_due name=i}
			{if $task_due->get_company_task_alarm() > 0}
				myalerts[{$smarty.foreach.i.index}]="{$task_due->get_company_task_alarm()}"
			{/if}
		{/foreach}
	{literal}
	
	var timestamp_minus = timestamp - 60;
	
	for(i=0; i < myalerts.length; i++) {
		
	
		if(timestamp_minus >= myalerts[i]){
			alert("You have a Task Due. Click okay to view the Task");
			window.location="{/literal}{$ROOT_URL}{literal}/index.php?page=company_task:view_company_task&task_id={/literal}{$task_id}{literal}";
		} else {
			document.getElementById("alert_box").innerHTML = 'No Alerts';

		}
    	
  	}

	

	
	
}
//-->
InitializeTimer();
	
	
	</script>
	{/literal}
<br>
<span class="small">CRM Version: 2.0</span><br>
<span class="small">Alerts: None</span><br>
<br>
<span class="small">Company: {$SITE_NAME}</span><br>
<span class="small">User: {$SESSION_USER_EMAIL}</span><br><br>

{$translate_text_due_tasks}
<table class="small" width="100%">
{foreach from=$task_due_array item=task_due}
	<tr>
		<td><a href="{$ROOT_URL}/index.php?page=company_task:view_company_task&task_id={$task_due->get_company_task_id()}">{$task_due->get_company_task_name()}</a></td>
		<td width="20">{$translate_field_company_task_due}:</td>
		<td width="75">{$task_due->get_company_task_due()|date_format:$DATE_TIME_FORMAT}</td>
	</tr>
{foreachelse}
	<tr>
		<td>{$translate_text_no_results_found}</td>
	</tr>
	
{/foreach}
</table>
<br>
<div id="alert_box"></div>

{display_box_bottom	}

{/if}


			