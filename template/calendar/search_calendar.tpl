<!-- search_calendar -->
{include file="core/header.tpl"}
<span class="greetUser">{$translate_text_records_found} {$paginate.total}</span><br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">{$translate_text_displaying_page} {$paginate.page_current} {$translate_text_of} {$paginate.page_total}</td>
		<td class="productListing-heading" width="75%" align="right" valign="middle">
			{paginate_first text="<img src='{$ROOT_URL}/images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>"}
			{paginate_prev text="<img src='{$ROOT_URL}/images/icons/back_24.gif' alt='Previous' border='0' align='middle'>"}
			{paginate_middle format=select}
			{paginate_next text="<img src='{$ROOT_URL}/images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>"}
			{paginate_last text="<img src='{$ROOT_URL}/images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>"}
		</td>
	</tr>
</table>
<br><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_calendar}</td>
		<td class="productListing-heading">{$translate_field_calendar_year}</td>
		<td class="productListing-heading">{$translate_field_calendar_month}</td>
		<td class="productListing-heading">{$translate_field_calendar_day}</td>
		<td class="productListing-heading">{$translate_field_calendar_hour}</td>
		<td class="productListing-heading">{$translate_field_calendar_min}</td>
		<td class="productListing-heading">{$translate_field_calendar_type}</td>
		<td class="productListing-heading">{$translate_field_user_id}</td>
		<td class="productListing-heading">{$translate_field_calendar_title}</td>
		<td class="productListing-heading">{$translate_field_calendar_text}</td>
		<td class="productListing-heading">{$translate_field_calendar_avtive}</td>
		<td class="productListing-heading">{$translate_field_calendar_private}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$calendarArray item=calendar}
	<tr>
		<td class="productListing-data">{$calendar->get_calendar_id()}</td>
		<td class="productListing-data">{$calendar->get_calendar_year()}</td>
		<td class="productListing-data">{$calendar->get_calendar_month()}</td>
		<td class="productListing-data">{$calendar->get_calendar_day()}</td>
		<td class="productListing-data">{$calendar->get_calendar_hour()}</td>
		<td class="productListing-data">{$calendar->get_calendar_min()}</td>
		<td class="productListing-data">{$calendar->get_calendar_type()}</td>
		<td class="productListing-data">{$calendar->get_user_id()}</td>
		<td class="productListing-data">{$calendar->get_calendar_title()}</td>
		<td class="productListing-data">{$calendar->get_calendar_text()}</td>
		<td class="productListing-data">{$calendar->get_calendar_avtive()}</td>
		<td class="productListing-data">{$calendar->get_calendar_private()}</td>
		<td class="productListing-data"><a href="index.php?page=calendar:view_calendar&calendar_id={$calendar->get_calendar_id()}"><img src="{$ROOT_URL}/images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="13">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
