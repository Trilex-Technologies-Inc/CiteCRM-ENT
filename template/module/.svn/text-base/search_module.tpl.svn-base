<!-- search_module -->
{include file="core/header.tpl"}

<span class="greetUser">{$translate_text_records_found} {$paginate.total}</span><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">{$translate_text_displaying_page} {$paginate.page_current} {$translate_text_of} {$paginate.page_total}</td>
		<td class="productListing-heading" width="75%" align="right" valign="middle">
			{paginate_first text="<img src='images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>" id="module"}
			{paginate_prev text="<img src='images/icons/back_24.gif' alt='Previous' border='0' align='middle'>" id="module"}
			{paginate_middle format=select id="module"}
			{paginate_next text="<img src='images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>" id="module"}
			{paginate_last text="<img src='images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>" id="module"}
		</td>
	</tr>
</table>
<br><br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_module_id}</td>
		<td class="productListing-heading">{$translate_field_module_translate_name}</td>
		<td class="productListing-heading">{$translate_field_module_name}</td>
		<td class="productListing-heading">{$translate_field_module_admin_menu}</td>
		<td class="productListing-heading">{$translate_field_module_user_menu}</td>
		<td class="productListing-heading">{$translate_field_module_public_menu}</td>
		<td class="productListing-heading">{$translate_field_last_modified}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
{foreach from=$moduleArray item=module}
	<tr>
		<td class="productListing-data">{$module->get_module_id()}</td>
		<td class="productListing-data">{$module->get_module_translate_name()}</td>
		<td class="productListing-data">{$module->get_module_name()}</td>
		<td class="productListing-data">{$module->get_module_admin_menu()|yesno}</td>
		<td class="productListing-data">{$module->get_module_user_menu()|yesno}</td>
		<td class="productListing-data">{$module->get_module_public_menu()|yesno}</td>
		<td class="productListing-data">{$module->get_last_modified()}</td>
		<td class="productListing-data"><a href="index.php?page=module:view_module&module_id={$module->get_module_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="8">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>


{include file="core/footer.tpl"}
