<!-- ajax_record_payment.tpl -->
<table cellpadding="0" cellspacing="0" align="left" width="100%">
    <tr>
        <td>

            <table cellpadding="3" cellspacing="0"  width="100%">
                <tr>
                   <td class="fieldValue"><b>Select Payment Type</b></td> 
                   <td class="fieldValue">{html_select_payment_options fieldName=invoice_payment_type}</td>                   
                   <td class="fieldValue"><b>Amount</b></td>
                   <td class="fieldValue"><input type="text" id="invoice_paid_amount" value="{$balance|string_format:"%.2f"}" size="10"></td>
                </tr>
            </table> 
			<input type="hidden" id="balance" value="{$balance|string_format:"%.2f"}">
            <input type="hidden" id="invoice_item_line_type" value="Payment">           
            <div id="payment_type_box"><br></div>
            <br>
			
            

        </td>
    </tr>
</table>   
<br><br>
