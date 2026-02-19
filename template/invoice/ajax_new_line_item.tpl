<!-- ajax_new_line_item.tpl -->
<table cellpadding="0" cellspacing="0" align="left" width="100%">
    <tr>
        <td>

			<table cellpadding="3" cellspacing="0" class="productListing" width="100%">
				<tr>
					<td class="productListing-heading">Type</td>
                    <td class="productListing-heading">Qty</td>
                    <td class="productListing-heading">Description</td>
                    <td class="productListing-heading" >Amount</td>
                </tr><tr>
                    <td class="productListing-data" ><select id="invoice_item_type">
                        <option value="Labor">Labor</option>
                        <option value="Product">Product</option>
                        <option value="Contract">Contract</option>
                        <option value="Support Call">Support Call</option>
                        <option value="Misc">Misc</option>
                        <option value="Tax">Tax</option>
                        </select>
                    </td>
                    <td class="productListing-data" ><input type="text" id="invoice_item_qty" size="8"></td>
                    <td class="productListing-data" ><input type="text" id="invoice_item_description" size="50"></td>
                    <td class="productListing-data" ><input type="text" id="invoice_item_amount" size="10"></td>
            </table>
            <input type="hidden" id="invoice_item_line_type" value="Debit">
            <input type="button" id="submit" value="Save" onclick="save_new_item()"> <input type="button" id="cancel" value="Cancel" onclick="cancel_new_item()">
        </td>
    </tr>
</table>       