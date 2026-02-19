<!-- add_calendar_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Calendar</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="calendar_year" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_year</span><br>"}
{validate field="calendar_month" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_month</span><br>"}
{validate field="calendar_day" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_day</span><br>"}
{validate field="calendar_hour" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_hour</span><br>"}
{validate field="calendar_min" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_min</span><br>"}
{validate field="calendar_type" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_type</span><br>"}
{validate field="user_id" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_user_id</span><br>"}
{validate field="calendar_title" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_title</span><br>"}
{validate field="calendar_text" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_calendar_text</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=calendar:add_calendar" id="add_calendar_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_year}</td>
		<td class="fieldValue"><input type="text" name="calendar_year" value="{$calendar_year}" size="" id="calendar_year">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_month}</td>
		<td class="fieldValue"><input type="text" name="calendar_month" value="{$calendar_month}" size="" id="calendar_month">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_day}</td>
		<td class="fieldValue"><input type="text" name="calendar_day" value="{$calendar_day}" size="" id="calendar_day">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_hour}</td>
		<td class="fieldValue"><input type="text" name="calendar_hour" value="{$calendar_hour}" size="" id="calendar_hour">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_min}</td>
		<td class="fieldValue"><input type="text" name="calendar_min" value="{$calendar_min}" size="" id="calendar_min">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_type}</td>
		<td class="fieldValue"><input type="text" name="calendar_type" value="{$calendar_type}" size="" id="calendar_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_user_id}</td>
		<td class="fieldValue"><input type="text" name="user_id" value="{$user_id}" size="" id="user_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_title}</td>
		<td class="fieldValue"><input type="text" name="calendar_title" value="{$calendar_title}" size="" id="calendar_title">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_text}</td>
		<td class="fieldValue"><input type="text" name="calendar_text" value="{$calendar_text}" size="" id="calendar_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_avtive}</td>
		<td class="fieldValue"><input type="text" name="calendar_avtive" value="{$calendar_avtive}" size="" id="calendar_avtive">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_calendar_private}</td>
		<td class="fieldValue"><input type="text" name="calendar_private" value="{$calendar_private}" size="" id="calendar_private">
</td>
	</tr>
	<tr>
		<td colspan="12">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
