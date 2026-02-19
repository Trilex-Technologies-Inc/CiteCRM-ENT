<!-- search_product -->


<form>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="formArea">
	<tr>
		<td width="33%" class="fieldValue">
			<a href="javascript:load_parts(0)">Top</a> ->  <a href="javascript:load_parts({$parent_id})">{$parent_id|category_name}</a> -> <a>{$category_id|category_name}</a>
		</td>
		<td width="33%" align="center" class="fieldValue"></td>
		<td width="33%" align="right" class="fieldValue" nowrap>
			Viewing {$startItem} - {$endItem} of {$total} Records
			<a href="javascript:load_parts('{$category_id}','{$field}','{$sort}','1');">First</a> |
			<a href="javascript:load_parts('{$category_id}','{$field}','{$sort}','{paginate_prev id="parts"}');">Prev</a> |
			<a href="javascript:load_parts('{$category_id}','{$field}','{$sort}','{paginate_next id="parts"}');">Next</a> |
			<a href="javascript:load_parts('{$category_id}','{$field}','{$sort}','{paginate_last id="parts"}');">Last</a>&nbsp;
		</td>
	</tr>
</table>
<table>
	<tr>
		<td height="2px"></td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>

		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_id'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_parts('{$category_id}','product_id','ASC','{$next}')" style="cursor:pointer">{$translate_field_product_image}</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_parts('{$category_id}','product_id','DESC','{$next}')" style="cursor:pointer">{$translate_field_product_image}</span>
			{/if}			
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_model'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_parts('{$category_id}','product_model','ASC','{$next}')" style="cursor:pointer">{$translate_field_product_model}</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_parts('{$category_id}','product_model','DESC','{$next}')" style="cursor:pointer">{$translate_field_product_model}</span>
			{/if}
		</td>		
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_price'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_parts('{$category_id}','product_price','ASC','{$next}')" style="cursor:pointer">{$translate_field_product_price}</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_parts('{$category_id}','product_price','DESC','{$next}')" style="cursor:pointer">{$translate_field_product_price}</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_status'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_parts('{$category_id}','product_status','ASC','{$next}')" style="cursor:pointer">{$translate_field_product_status}</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_parts('{$category_id}','product_status','DESC','{$next}')" style="cursor:pointer">{$translate_field_product_status}</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'manufacturer_id'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_parts('{$category_id}','manufacturer_id','ASC','{$next}')" style="cursor:pointer">{$translate_field_manufacturer_id}</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_parts('{$category_id}','manufacturer_id','DESC','{$next}')" style="cursor:pointer">{$translate_field_manufacturer_id}</span>
			{/if}
		</td>
		<td class="productListing-heading">{$translate_field_product_quantity}</td>
		<td class="productListing-heading"></td>
	</tr>
	{foreach from=$productArray item=product}

	{if $product->get_product_quantity() > 0}
	<tr  onmouseover="this.className='row2'" onmouseout="this.className='row1'" ondblclick="load_part_details('{$product->get_product_id()}','{$parent_id}','{$category_id}')">
		<td class="productListing-data" {if $field == 'product_id'} style="background-color: #ECECEC;"{/if} align="center">
			<img src="{$product->get_product_image()}" width="25" height="25" onMouseOver="ddrivetip('<center><b>{$product->fields.product_name|escape:'javascript'}</b><br><img src={$product->get_product_image()}></center>');" onMouseOut="hideddrivetip()" style="cursor:pointer;"></td>
		<td class="productListing-data" {if $field == 'product_model'} style="background-color: #ECECEC;"{/if}>{$product->get_product_model()}</td>		
		<td class="productListing-data" {if $field == 'product_price'} style="background-color: #ECECEC;"{/if}>${$product->get_product_price()|string_format:"%.2f"}</td>
		<td class="productListing-data" {if $field == 'product_status'} style="background-color: #ECECEC;"{/if}>{$product->get_product_status()}</td>
		<td class="productListing-data" {if $field == 'manufacturer_id'} style="background-color: #ECECEC;"{/if} >{$product->get_manufacturer_id()|product_manufacture_name}</td>
		<td class="productListing-data">{$product->get_product_quantity()}</td>
		<td class="productListing-data"></td>
	</tr>
	{/if}
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="22">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>
</form>

