<body onLoad="document.forms[0].product_upc.focus();">
<table width="100%">
    <tr>
        <td><span class="greetUser">Add Parts to Workorder</span></td>
        <td align="right"><a href="javascript:add_new_product();">Add New Product To Catalog</a></td>   
    </tr>
</table>

<form>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="formArea">
	<tr>
		<td  class="fieldValue">
			<a href="javascript:add_parts('0','product_id','ASC','');">Top</a>  {if $parent_id != 0} -> <a ahref="javascript:add_parts('{$parent_id}','product_id','ASC','');">{$parent_id|category_name}</a>{/if}
		</td>
		<td class="fieldValue" align="right">
			<form method="POST" action="index.php?page=workorder:add_part_by_upc">
			<input type="hidden" name="workorder_id" value="{$workorder_id}">
			System: 
			<select name="system_id" id="system_id" >
				<option value="0">No System</option>
			{foreach from=$system_array item=system}
				<option value="{$system->get_system_id()}">{$system->get_system_name()}</option>
			{/foreach}
			</select>
			<input type="text" name="qty" value="1" size="4">
			
			UPC <input type="text" name="product_upc"> <input type="submit" value="submit">
			</form>
		</td>
	</tr>
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
			<img src="{$category->get_category_image()}" width="35" height="35" align="middle" alt="" onclick="add_parts('{$category->get_category_id()}','product_id','ASC','')" style="cursor:pointer;"><br>
			<a onclick="add_parts('{$category->get_category_id()}','product_id','ASC','');" style="cursor:pointer;">{$category->get_category_name()}</a>
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

