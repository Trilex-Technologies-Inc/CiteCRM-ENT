
<table  cellpadding="3" cellspacing="0" border="0">
	{foreach from=$categoryArray item=category}	
	<tr>
		<td align="center"><img src="{$category->get_category_image()}" width="25" height="25" align="middle" alt=""></td>
		<td><a href="{$ROOT_URL}/index.php?page=category:view_category&category_id={$category->get_category_id()}">{$category->get_category_name()}</a></td>		
	</tr>		
	{foreachelse}
	<tr>
		<td colspan="2">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
