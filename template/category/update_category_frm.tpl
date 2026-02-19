<!-- update_category_frm -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Category ID# {$category->get_category_id()}</span></td>
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

<form method="post" action="{$ROOT_URL}/index.php?page=category:update_category" id="add_category_frm">
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_category_image}</td>
		<td class="fieldValue"><input type="text" name="category_image" value="{$category->get_category_image()}" id="category_image"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_parent_id}</td>
		<td class="fieldValue"><input type="text" name="category_parent_id" value="{$category->get_category_parent_id()}" id="category_parent_id"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_sort_order}</td>
		<td class="fieldValue"><input type="text" name="category_sort_order" value="{$category->get_category_sort_order()}" id="category_sort_order"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_category_status}</td>
		<td class="fieldValue"><input type="text" name="category_status" value="{$category->get_category_status()}" id="category_status"></td>
	</tr><tr>
		<td colspan="5">
		    <input type="hidden" name="category_id" value="{$category_id}">
		    <input type="submit" name="submit" value="{$translate_button_submit}">
        </td>
	</tr>
</table>
</form>
{include file="core/footer.tpl"}
