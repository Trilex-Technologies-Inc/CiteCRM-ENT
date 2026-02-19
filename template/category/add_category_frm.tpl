<!-- add_category_frm -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Category</td>
		<td align="right"></td>
    </tr>
</table>
<br>
{if $errorOccurred}
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
    <tr>
        <td class="infoBoxNoticeContents">
{/if}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>
<form method="post" action="{$ROOT_URL}/index.php?page=category:add_category" id="add_category_frm">
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_category_image}</td>
		<td class="fieldValue"><input type="text" name="category_image" value="{$category_image}" size="" id="category_image"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_parent_id}</td>
		<td class="fieldValue"><input type="text" name="category_parent_id" value="{$category_parent_id}" size="" id="category_parent_id"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_sort_order}</td>
		<td class="fieldValue"><input type="text" name="category_sort_order" value="{$category_sort_order}" size="" id="category_sort_order"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_status}</td>
		<td class="fieldValue"><input type="text" name="category_status" value="{$category_status}" size="" id="category_status"></td>
	</tr><tr>
		<td colspan="5">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>
</form>
{include file="core/footer.tpl"}
