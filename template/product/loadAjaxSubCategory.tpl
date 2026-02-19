
<form>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="formArea">
	<tr>
		<td  class="fieldValue">
			<a href="javascript:load_parts('0','product_id','ASC','');">Top</a>  {if $parent_id != 0} -> <a ahref="javascript:load_parts('{$parent_id}','product_id','ASC','');">{$parent_id|category_name}</a>{/if}
		</td>

</table>
</form>


	{foreach from=$categoryArray item=category name=i}
	
	{if $smarty.foreach.i.first}
		<table  cellpadding="5" cellspacing="5" border="0" width="100%">
			<tr>
	{/if}

	{if $smarty.foreach.i.iteration % 4 == 1}
		</tr><tr>
	{/if}
	
		<td align="center">
			<img src="{$category->get_category_image()}" width="35" height="35" align="middle" alt="" onclick="load_parts('{$category->get_category_id()}','product_id','ASC','')" style="cursor:pointer;"><br>
			<a onclick="load_parts('{$category->get_category_id()}','product_id','ASC','');" style="cursor:pointer;">{$category->get_category_name()}</a>
		</td>
		
	{if $smarty.foreach.i.last}	
		</tr>
	</table>
	{/if}
		
	{foreachelse}
	<tr>
		<td colspan="2">{$translate_text_no_results_found}</td>
	</tr>
	</table>
	{/foreach}

