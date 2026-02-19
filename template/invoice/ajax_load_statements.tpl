<!-- ajax_load_statements.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Statements</span></td>
		<td align="right" class="small"><a href="{$ROOT_URL}/index.php?page=invoice:print_statement&company_id={$company_id}">Print</a> |
            <a href="{$ROOT_URL}/index.php?page=invoice:new_invoice&company_id={$company_id}">New Invoice</a></td>
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
            <td class="productListing-heading">Invoice</td>
			<td class="productListing-heading">Date</td>
            <td class="productListing-heading">Description</td>
            <td class="productListing-heading">Qty</td>
            <td class="productListing-heading">Amount</td>
            <td class="productListing-heading">Charge</td>
            <td class="productListing-heading">Payment</td>
            <td class="productListing-heading">Credit</td>
            <td class="productListing-heading">Balance</td>
        </tr>
        {foreach from=$invoiceArray item=invoice name=i}



        <tr>
            <td class="productListing-data">
                {if $invoice->fields.invoice_id > 0 }
                    <a href="{$ROOT_URL}/index.php?page=invoice:view_invoice&invoice_id={$invoice->fields.invoice_id}">{$invoice->fields.invoice_id}</a>
                {else}
                     {if $invoice->fields.invoice_item_type == 'Contract Labor' || $invoice->fields.invoice_item_type == 'Contract Support Call'}
                     {else}
                        N/A
                     {/if}
                {/if}
            </td>
            <td class="productListing-data">{$invoice->fields.invoice_item_date|date_format:$DATE_FORMAT}</td>
            <td class="productListing-data">{$invoice->fields.invoice_item_description}</td>
            <td class="productListing-data">{$invoice->fields.invoice_item_qty}</td>
            <td class="productListing-data" align="right">{$invoice->fields.invoice_item_amount|string_format:"%.2f"}</td>
            <td class="productListing-data" align="right">{if $invoice->fields.invoice_item_line_type == 'Debit'}{$invoice->fields.invoice_item_subtotal|string_format:"%.2f"}{/if}</td>
            <td class="productListing-data" align="right">{if $invoice->fields.invoice_item_line_type == 'Payment'}{$invoice->fields.invoice_item_subtotal|string_format:"%.2f"}{/if} </td>
            <td class="productListing-data" align="right">{if $invoice->fields.invoice_item_line_type == 'Credit'}{$invoice->fields.invoice_item_subtotal|string_format:"%.2f"}{/if}</td>
            <td class="productListing-data" align="right">
            {if $smarty.foreach.i.iteration == 1}

                {if $invoice->fields.invoice_item_line_type == 'Debit'}
                    {assign var="balance" value=$invoice->fields.invoice_item_subtotal }                  
                {/if}

            {else}

                {if $invoice->fields.invoice_item_line_type == 'Debit'}
                    {math equation="x + y" x=$balance y=$invoice->fields.invoice_item_subtotal format="%.2f" assign="balance"}
                {/if}

                {if $invoice->fields.invoice_item_line_type == 'Payment'}
                    {math equation="x - y" x=$balance y=$invoice->fields.invoice_item_subtotal format="%.2f" assign="balance"}
                {/if}

                {if $invoice->fields.invoice_item_line_type == 'Credit'}
                     {math equation="x - y" x=$balance y=$invoice->fields.invoice_item_subtotal format="%.2f" assign="balance"}
                {/if}


            {/if}

            {$balance|string_format:"%.2f"}
            </td>
        </tr>
        {/foreach}

</table>