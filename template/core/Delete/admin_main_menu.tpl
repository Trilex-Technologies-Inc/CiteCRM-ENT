<!-- admin_main_menu.tpl -->
{include file="core/header.tpl"}

<table width="100%" cellpadding="3" cellspacing="0" border="0">
	<tr>
		<td>
			<a href="index.php?page=core:admin_add_to_main_menu">Add Page To Menu</a>
		</td>
	</tr>
</table>
<br><br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_page_setup_name}</td>
        <td class="productListing-heading">{$translate_field_page_setup_display_name}</td>
        <td class="productListing-heading">{$translate_field_page_setup_page_title}</td>
        <td class="productListing-heading">{$translate_field_page_setup_order}</td>
        <td class="productListing-heading">{$translate_field_page_setup_active}</td>
        <td class="productListing-heading">{$translate_field_page_setup_static_page}</td>
        <td class="productListing-heading">{$translate_field_page_views}</td>
        <td class="productListing-heading">{$translate_field_last_modified}</td>
        <td class="productListing-heading"></td>
    </tr>
	{foreach from=$menu_nav_array item=result}
    <tr>
        <td class="productListing-data">{$result->getPageSetupName()}</td>
        <td class="productListing-data">{$result->getPageSetupDisplayName()}</td>
        <td class="productListing-data">{$result->getPageSetupPageTitle()}</td>
        <td class="productListing-data">{$result->getPageSetupOrder()}</td>
        <td class="productListing-data">{$result->get_page_setup_active()|yesno}</td>
        <td class="productListing-data">{$result->get_page_setup_static_page()|yesno}</td>
        <td class="productListing-data">{$result->get_page_views()}</td>
        <td class="productListing-data">{$result->get_last_modified()}</td>
        <td class="productListing-data"><a href="index.php?page=core:admin_edit_main_menu&page_id={$result->getPageSetupID()}"><img src="images/icons/edit_16.gif" border="0"></a></td>
    </tr>
    {/foreach}
</table>
						

{include file="core/footer.tpl"}