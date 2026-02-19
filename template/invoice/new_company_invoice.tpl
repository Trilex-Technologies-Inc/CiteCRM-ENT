<!-- new_company_invoice.tpl -->
{include file="core/header.tpl"}


{literal}


{/literal}

<form method="POST" action="index.php?page=invoice:new_invoice">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Invoice Details</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >

			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td valign="top" class="data" width="250">
                        Company Info
                        <table>
                            <tr>
                                <td>Invoice Date</td>
                                <td>{html_select_date prefix=invoice_create_date}</td>
                                <td>Due Date</td>
                                <td>{html_select_date prefix=invoice_due_date}</td>
                            </tr><tr>
                                <td>Discount</td>
                                <td colspan="2"><input type="text" name="invoice_discount_amount" id="invoice_discount_amount" size="8">%</td>
                            </tr><tr>
                                <td colspan="4">Memo</td>
                            </tr><tr>
                                <td colspan="4"><textarea name="invoice_memo"></textarea></td>
                            </tr>
                        </table>

                        
                       
                        
                        

                    </td>
				</tr>
			</table>

		</td>
	</tr>
</table>

<br/>


<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Non Invoiced Items</a></li>
</ul>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
            <td class="productListing-heading">Invoice</td>
			<td class="productListing-heading">Date</td>
            <td class="productListing-heading">Description</td>
            <td class="productListing-heading">Qty</td>
            <td class="productListing-heading">Amount</td>
            <td class="productListing-heading">Charge</td>
        </tr>
        {foreach from=$invoiceArray item=invoice name=i}

        {if $invoice->fields.invoice_id < 1}

        <tr>
            <td class="productListing-data">
             {if $invoice->fields.invoice_item_type == "Contract Labor" || $invoice->fields.invoice_item_type == 'Contract Support Call'}
                N/A
             {else}
                <input type="checkbox" name="item[{$smarty.foreach.i.iteration}]" value="{$invoice->fields.invoice_item_id}">
             {/if}
            </td>
            <td class="productListing-data">{$invoice->fields.last_modifed|date_format:$DATE_FORMAT}</td>
            <td class="productListing-data">{$invoice->fields.invoice_item_description}</td>
            <td class="productListing-data">{$invoice->fields.invoice_item_qty}</td>
            <td class="productListing-data" align="right">{$invoice->fields.invoice_item_amount|string_format:"%.2f"}</td>
            <td class="productListing-data" align="right">{if $invoice->fields.invoice_item_line_type == 'Debit'}{$invoice->fields.invoice_item_subtotal|string_format:"%.2f"}{/if}</td>

        </tr>
        {/if}
        {/foreach}

</table>
<br>
<input type="hidden" name="company_id" value="{$companyObj->get_company_id()}">
<input type="submit" name="submit" value="Create Invoice">
</form> 

{include file="core/footer.tpl"}