<!-- add_workorder_time_frm -->
{include file="core/header.tpl"}
<link rel="stylesheet" type="text/css" media="all" href="include/jscalendar/calendar-blue.css" title="win2k-1" />
<script type="text/javascript" src="include/jscalendar/calendar_stripped.js"></script>
<script type="text/javascript" src="include/jscalendar/lang/calendar-english.js"></script>
<script type="text/javascript" src="include/jscalendar/calendar-setup_stripped.js"></script>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Enter Your Work Time for Workorder {$workorder_id} </td>
		<td align="right"></td>
	</tr>
</table>

<br>
{validate field="workorder_time_start" 	criteria="isDate" 	message="<span class='errorText'><img src=\"images/icons/flag_16.gif\" alt=\"Error\">Error: You must provide a </span><b>Start Date</b><br>"}

<br>

<form method="post" action="index.php?page=workorder_time:add_workorder_time" id="add_workorder_time_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_user_id}</td>
		<td class="fieldValue">{$user_id|display_names}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_workorder_time_start}</td>
		<td class="fieldValue">
			<input type="text" name="workorder_time_start" value="{$workorder_time_start}"  id="workorder_time_start" size="10">
			<input type="button" id="trigger_date_1" value="+">
			{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "workorder_time_start",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date_1"
						}
				 	);
				</script>
			{/literal}
			{html_select_time use_24_hours=true minute_interval=$billingMinIncrement display_seconds=false prefix=start}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Hours Worked</td>
		<td class="fieldValue">
			
			{html_select_time use_24_hours=true minute_interval=$billingMinIncrement time="false" display_seconds=false prefix=end}
		</td>
	</tr><tr>
		<td colspan="5">
		<input type="hidden" name="workorder_id" value="{$workorder_id}">
		<input type="hidden" name="user_id" value="{$user_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
