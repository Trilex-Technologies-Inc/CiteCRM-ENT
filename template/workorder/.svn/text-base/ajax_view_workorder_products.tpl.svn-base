<!-- ajax_view_workorder_products.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser"><span class="greetUser">Work Order Parts</span></td>
		<td align="right">
            {if $is_active}
                <a href="javascript:add_parts('0','product_id','ASC','0');">Add Parts</a>
            {/if}
        </td>	
	</tr>
</table>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product.product_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Parts','product.product_id','ASC','{$next}')" style="cursor:pointer">Image</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Parts','product.product_id','DESC','{$next}')" style="cursor:pointer">Image</span>
			{/if}		
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_sku'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Parts','product_sku','ASC','{$next}')" style="cursor:pointer">Product</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Parts','product_sku','DESC','{$next}')" style="cursor:pointer">Product</span>
			{/if}	
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_model'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Parts','product_model','ASC','{$next}')" style="cursor:pointer">Model</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Parts','product_model','DESC','{$next}')" style="cursor:pointer">Model</span>
			{/if}
		
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'manufacturer_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Parts','manufacturer_id','ASC','{$next}')" style="cursor:pointer">Manufacture</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Parts','manufacturer_id','DESC','{$next}')" style="cursor:pointer">Manufacture</span>
			{/if}
		
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'product_price'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Parts','product_price','ASC','{$next}')" style="cursor:pointer">Price</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Parts','product_price','DESC','{$next}')" style="cursor:pointer">Price</span>
			{/if}
		
		</td>
		<td class="productListing-heading">Qty</td>
		{if $edit}
		<td class="productListing-heading">Action</td>
		{/if}
	</tr>
{foreach from=$product_array item=product}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'">
		<td class="productListing-data" {if $field == 'product.product_id'} style="background-color: #ECECEC;"{/if}><img src="{$ROOT_URL}{$product->get_product_image()}" width="25" height="25" align="middle" border="0"></td>
		<td class="productListing-data" {if $field == 'product_sku'} style="background-color: #ECECEC;"{/if}>{$product->get_product_name()}</td>
		<td class="productListing-data" {if $field == 'product_model'} style="background-color: #ECECEC;"{/if}>{$product->get_product_model()}</td>
		<td class="productListing-data" {if $field == 'manufacturer_id'} style="background-color: #ECECEC;"{/if}>{$product->get_manufacturer_id()|product_manufacture_name}</td>
		<td class="productListing-data" {if $field == 'product_price'} style="background-color: #ECECEC;"{/if}>${$product->get_product_sell_price()|string_format:"%.2f"}</td>
		<td class="productListing-data" >{$product->fields.product_to_workorder_qty}</td>
		{if $edit}
		<td class="productListing-data">        
        	<img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete" onclick="delete_product_from_workorder({$product->get_product_id()})" style="cursor:pointer">
		</td>
		{/if}
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Products Orderd</td>
	</tr>
{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="9"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_window('Parts','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_window('Parts','{$field}','{$sort}','{paginate_prev id="notes"}');">Prev</a> |

							<a href="javascript:load_window('Parts','{$field}','{$sort}','{paginate_next id="notes"}');">Next</a> |
							<a href="javascript:load_window('Parts','{$field}','{$sort}','{paginate_last id="notes"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
<br>