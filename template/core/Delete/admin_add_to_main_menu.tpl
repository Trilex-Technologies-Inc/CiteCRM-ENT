<!-- admin_add_to_main_menu.tpl -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td></td>
		<td align="right"><a href="index.php?page=core:admin_main_menu">Back</a></td>
    </tr>
</table>


<form action="index.php?page=core:admin_add_to_main_menu" method="post">
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
    <tr>
        <td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_page_setup_name}</td>
		<td class="fieldValue">{html_select_page fieldName='page_setup_id' value=$page_setup_id}</td>
	</tr><tr>
        <td class="fieldValue" colspan="2">
            <input type="submit" name="submit" value="{$translate_button_submit}">
        </td>
    </tr>
</table>
</form>



{include file="core/footer.tpl"}