<!-- view_category -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View category ID# {$category_id}</span></td>
		<td align="right">
		    <a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
			<a href="{$ROOT_URL}/index.php?page=category:update_category&category_id={$category_id}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
			<a href="{$ROOT_URL}/index.php?page=category:delete_category&category_id={$category_id}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
        </td>
    </tr>
</table>
<br><br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">{$translate_field_category_id}</td>
		<td class="productListing-heading">{$translate_field_category_image}</td>
		<td class="productListing-heading">{$translate_field_category_name}</td>		
		<td class="productListing-heading">{$translate_field_category_sort_order}</td>
		<td class="productListing-heading">{$translate_field_category_status}</td>
		<td class="productListing-heading">{$translate_text_view}</td>
	</tr>
	{foreach from=$categoryArray item=category}
	<tr>
		<td class="productListing-data">{$category->get_category_id()}</td>
		<td class="productListing-data" align="center"><img src="{$category->get_category_image()}" width="25" height="25" align="middle" alt=""></td>
		<td class="productListing-data">{$category->get_category_name()}</td>		
		<td class="productListing-data">{$category->get_category_sort_order()}</td>
		<td class="productListing-data">{$category->get_category_status()|yesno}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=category:view_category&category_id={$category->get_category_id()}"><img src="{$ROOT_URL}/images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="6">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
{include file="core/footer.tpl"}