<!DOCTYPE html PUBLIC "-//w3c//dtd html 4.0 transitional//en">
<html dir="LTR" lang="en">
<head>
	
	<title>{$core->getPageTitle()}</title>
    
    
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<meta name="keywords" content="{$core->getKeywords()}">
	<meta name="description" content="{$core->getDescription()}">
	
	<link rel="stylesheet" type="text/css" href="{$ROOT_URL}/css/default.css">
	<link rel="stylesheet" href="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.css" type="text/css" />
	<link rel="stylesheet" href="{$ROOT_URL}/java/dhtmlwindow/modalfiles/modal.css" type="text/css" />
	
    <script type="text/javascript" src="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.js"></script>
	<script type="text/javascript" src="{$ROOT_URL}/java/dhtmlwindow/modalfiles/modal.js"></script>

	<script language="javascript" src="{$ROOT_URL}/java/ajaxCaller1.js" type="text/javascript"></script>
	<script language="javascript" src="{$ROOT_URL}/java/util.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="{$ROOT_URL}/css/chrome.css" />
	<script type="text/javascript" src="{$ROOT_URL}/java/chrome.js"></script>



</head>


<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">


{literal}
	<script language="JavaScript">

		var countDownInterval={/literal}{$currentTimeoutInSecs}{literal} - 120;
		var countDownTime=countDownInterval+1;
		
		var sessionCountDownInterval = {/literal}{$currentTimeoutInSecs}{literal}
		var sessionCountDownTime = sessionCountDownInterval+1;

		function stopCount(){
			clearTimeout(sessCounter);
			sessCounter = 0; 
			sessionCountDownTime = {/literal}{$currentTimeoutInSecs}{literal}
			sessionCountDown();
		}



		function countDown(){
			countDownTime--;
			if (countDownTime <=0){
				countDownTime=countDownInterval;
				clearTimeout(counter)
				sessWindow=dhtmlmodal.open('Warn', 'div', 'session_warn', 'Are You Still Here?', 'width=250px,height=175px,center=1,resize=0,scrolling=0');
				return
			}
			document.getElementById("countDownText").innerHTML=countDownTime+" "
			counter=setTimeout("countDown()", 1000);
		}

		function sessionCountDown(){			

			sessionCountDownTime--;
			if(sessionCountDownTime <=0) {				
				sessionCountDownTime =sessionCountDownInterval;
				clearTimeout(sessCounter)
				window.location="{/literal}{$ROOT_URL}{literal}/index.php?action=logout";
			}

			document.getElementById("sessDownText").innerHTML=sessionCountDownTime+" "
			sessCounter=setTimeout("sessionCountDown()", 1000);

		}
		
		function stop_call_timer(support_call_id) {
		
			callWindow=dhtmlmodal.open('convertBox', 'ajax', '{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_end_support_call&support_call_id='+support_call_id, 'End Call', 'width=400px,height=320px,center=1,resize=0,scrolling=0');
		}

		function save_support_call() {
			parent.callWindow.hide();
			document.getElementById("callTimer").innerHTML = '';
			var support_call_id = document.getElementById("support_call_id").value;
			var support_call_notes = document.getElementById("support_call_notes").value;
			var submit = 'Save';
			urlVars = {}	
			bodyVars = {support_call_id:support_call_id,support_call_notes:support_call_notes,submit:submit}		
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=support_call:ajax_end_support_call", bodyVars, urlVars, call_stop,false, "a postVars request");
		}
		
		function call_stop(text, headers, callingContext) {
			document.getElementById("callTimer").innerHTML = text;
		}

	</script>
{/literal}
<div id="session_warn" style="display:none"> 
	<center><b>Your Session is about to timeout!</b></center><br>
		<script language="JavaScript">
			document.write('Session Ends in <b id="sessDownText">'+sessionCountDownTime+' </b> seconds');
		</script>
	<br>
	<input type="button" name="continue" id="continue" value="Continue" onclick="reset_session()">
</div>



<a name="top"></a>
<div id="dhtmltooltip"></div>
<SCRIPT SRC="{$ROOT_URL}/java/dhtml.js"></SCRIPT>	

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td style="border-top: 1px solid #5CA0C7; border-bottom: 1px solid #5CA0C7;">
            {if $SESSION_ADMIN ==1}
                {include file="core/tool_bar.tpl"}
            {/if}
        </td>
    </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
	<tr>
        <td width="2" bgcolor="#ededed"><br></td>
		<td valign="top" bgcolor="#ededed"  width="220" nowrap style="padding-top:5px;padding-left:2px;padding-bottom:5px;height:600px"> {include file="core/left.tpl"}</td>
		<td width="2" bgcolor="#ededed" width="5">&nbsp;</td>		
    	<td width="100%" valign="top" bgcolor="#ededed" style="padding-top:5px">


				

		{display_main_box_top title=$core->getPageTitle()}

		{if $supportObj->get_support_call_id() > 0 }
			<div id="callTimer">You Have A Running Call Timer. <a href="javascript:stop_call_timer('{$supportObj->get_support_call_id()}')">Stop Time</a><br><br></div>	
		{else}
			<div id="noCallRunning"></div>
		{/if}
    							
						