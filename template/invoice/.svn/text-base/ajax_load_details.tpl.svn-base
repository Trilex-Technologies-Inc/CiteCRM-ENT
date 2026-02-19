<!-- ajax_load_details.tpl -->
<table cellpadding="3" cellspacing="0" class="productListing" width="600">
	<tr>
		<td class="productListing-heading">Invoice ID</td>
        <td class="productListing-heading">Created</td>
        <td class="productListing-heading">Due</td>
        <td class="productListing-heading">Amount</td>
        <td class="productListing-heading">Created By</td>
        <td class="productListing-heading">Status</td>
     </tr><tr>
        <td class="productListing-data">{$invoiceObj->get_invoice_id()}</td>
        <td class="productListing-data">{$invoiceObj->get_invoice_create_date()|date_format:$DATE_FORMAT}</td>
        <td class="productListing-data">{$invoiceObj->get_invoice_due_date()|date_format:$DATE_FORMAT}</td>
        <td class="productListing-data">${$invoiceObj->get_invoice_amount()|string_format:"%.2f"}</td>
        <td class="productListing-data">{$invoiceObj->get_invoice_create_by()|display_names}</td>
        <td class="productListing-data">{$invoiceObj->get_invoice_status()}</td>
    </tr>
</table>