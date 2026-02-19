<!-- ajax_load_sales.tpl -->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">Invoice ID</td>
        <td class="productListing-heading">Qty</td>
        <td class="productListing-heading">Amount</td>
        <td class="productListing-heading">Sub-Total</td>
        <td class="productListing-heading">Work Order</td>
        <td class="productListing-heading">Date</td>       
    </tr>

    {foreach from=$array item=productObj}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='/index.php?page='">
        <td class="productListing-data"><a href="/index.php?page=invoice:view_invoice&invoice_id={$productObj->fields.invoice_id}">{$productObj->fields.invoice_id}</a></td>
        <td class="productListing-data">{$productObj->fields.invoice_part_qty}</td>
        <td class="productListing-data">${$productObj->fields.invoice_part_amount|string_format:"%.2f"}</td>
        <td class="productListing-data">${$productObj->fields.invoice_part_sub_total|string_format:"%.2f"}</td>     
        <td class="productListing-data"><a hreef="/index.php?page=workorder:view_workorder&workorder_id={$productObj->fields.workorder_id}">{$productObj->fields.workorder_id}</a></td>
        <td class="productListing-data">{$productObj->fields.last_modified|date_format:$DATE_FORMAT}</td>
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="6">No Product Sales</td>
    </tr>
    {/foreach}
</table>
<br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
        <td class="productListing-data">Total Items Sold</td>
        <td class="productListing-data">{$total_product_sold}</td>
    </tr><tr>
        <td class="productListing-data">Total Sales</td>
        <td class="productListing-data">${$total|string_format:"%.2f"}</td>
    </tr>
</table>