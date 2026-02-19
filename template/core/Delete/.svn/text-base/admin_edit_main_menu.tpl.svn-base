<!-- admin_edit_main_menu.tpl -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">{$translate_text_edit} {$menuNavObj->getPageSetupName()}</span></td>
		<td align="right"><a href="index.php?page=core:admin_main_menu">Back</a></td>
    </tr>
</table>
<form action="index.php?page=core:admin_edit_main_menu" method="post">
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
    <tr>
        <td class="productListing-data">

            <table>
                <tr>
                    <td>{$translate_field_page_setup_display_name}</td>
                    <td><input type="text" name="page_setup_display_name" value="{$menuNavObj->getPageSetupDisplayName()}"></td>
                </tr><tr>
                    <td>{$translate_field_page_setup_page_title}</td>
                    <td><input type="text" name="page_setup_page_title" value="{$menuNavObj->getPageSetupPageTitle()}"></td>
                </tr><tr>
                    <td>{$translate_field_page_setup_order}</td>
                    <td><input type="text" name="page_setup_order" value="{$menuNavObj->getPageSetupOrder()}"></td>
                </tr><tr>
                    <td>{$translate_field_page_setup_active}</td>
                    <td>{html_select_yesno fieldName='page_setup_active' value=$menuNavObj->get_page_setup_active()}</td>
                </tr><tr>
                    <td>{$translate_field_page_setup_menu}</td>
                    <td>{html_select_yesno fieldName='page_setup_menu' value=$menuNavObj->getPageSetupMenu()}</td>
                </tr><tr>
                    <td colspan="2">{$translate_field_page_setup_description}</td>
                </tr><tr>
                    <td colspan="2"><textarea name="page_setup_description">{$menuNavObj->getPageSetupDescription()}</textarea></td>
                </tr><tr>
                    <td colspan="2">{$translate_field_page_setup_keywords}</td>
                </tr><tr>
                    <td colspan="2"><textarea name="page_setup_keywords">{$menuNavObj->getPageSetupKeywords()}</textarea></td>
                </tr><tr>
                    <td colspan="2">
                        <input type="hidden" name="page_setup_id" value="{$menuNavObj->getPageSetupID()}">
                        <input type="submit" name="submit" value="Submit"></td>
                </tr>   
            </table>
        </td>
    </tr>
</table>
</form>

{include file="core/footer.tpl"}