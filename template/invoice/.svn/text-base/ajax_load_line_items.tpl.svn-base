<!-- ajax_load_line_items.tpl -->
<table cellpadding="3" cellspacing="0" class="productListing" width="600">
    <tr>
		<td class="productListing-heading">Date</td>
        <td class="productListing-heading">Type</td>
        <td class="productListing-heading">Qty</td>
        <td class="productListing-heading">Description</td>
        <td class="productListing-heading">Amount</td>
        <td class="productListing-heading">Total</td>
    </tr>
    {foreach from=$invoice_item_array item=line_item}
    <tr>
        <td class="productListing-data">{$line_item->get_invoice_item_date()|date_format:$DATE_FORMAT}</td>
        <td class="productListing-data">{$line_item->get_invoice_item_type()}</td>
        <td class="productListing-data">{$line_item->get_invoice_item_qty()}</td>
        <td class="productListing-data">{$line_item->get_invoice_item_description()}</td>
        <td class="productListing-data" align="right">{$line_item->get_invoice_item_amount()|string_format:"%.2f"}</td>
        <td class="productListing-data" align="right">{$line_item->get_invoice_item_subtotal()|string_format:"%.2f"}</td>
    </tr>
    {foreachelse}
    <tr>
         <td class="productListing-data" colspan="6">No Invoice Items</td>
    </tr>
    {/foreach}

    {* credits *}
    {foreach from=$invoice_credits_array item=invoice_credits}
        <tr>
            <td class="productListing-data">{$invoice_credits->get_invoice_item_date()|date_format:$DATE_FORMAT}</td>
            <td class="productListing-data">{$invoice_credits->get_invoice_item_type()}</td>
            <td class="productListing-data">{$invoice_credits->get_invoice_item_qty()}</td>
            <td class="productListing-data">{$invoice_credits->get_invoice_item_description()}</td>
            <td class="productListing-data" align="right">{$invoice_credits->get_invoice_item_amount()|string_format:"%.2f"}</td>
            <td class="productListing-data" align="right"> - {$invoice_credits->get_invoice_item_subtotal()|string_format:"%.2f"}</td>
        </tr>
    {/foreach}

    {* balance *}
    <tr>
        <td class="productListing-data" colspan="5" align="right">Discount</td>
        <td class="productListing-data" align="right">{$invoiceObj->get_invoice_discount_amount()|string_format:"%.2f"}</td>
    </tr><tr>
        <td class="productListing-data" colspan="5" align="right">Tax</td>
        <td class="productListing-data" align="right">{$invoiceObj->get_invoice_tax_amount()|string_format:"%.2f"}</td>
    </tr><tr>
         <td class="productListing-data" colspan="5" align="right"><b>Total</b></td>
        <td class="productListing-data" align="right">{$invoiceObj->get_invoice_total_amount()|string_format:"%.2f"}</td>
    </tr><tr>
        <td class="productListing-data" colspan="5" align="right">Payment</td>
        <td class="productListing-data" align="right">{$invoiceObj->get_invoice_paid_amount()|string_format:"%.2f"}</td>
    </tr><tr>
        <td class="productListing-data" colspan="5" align="right"><b>Balance</b></td>
        <td class="productListing-data" align="right">{$balance|string_format:"%.2f"}</td>
    </tr>
</table>

