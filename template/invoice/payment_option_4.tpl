<!-- payment_option_4.tpl -->
<table cellspacing="3" cellpadding="0" cellspacing="0">
    <tr>    
        <td class="formAreaTitle">Gift Certificate #</td>    
        <td class="fieldValue"><input type="text" name="gift_certificate_id" id="gift_certificate_id" size="30"></td>
    </tr>
</table>
<input type="hidden" name="invoice_payment_type" id="invoice_payment_type" value="4">
<input type="button" id="submit" value="Save" onclick="save_payment()"> 
<input type="button" id="cancel" value="Cancel" onclick="cancel_new_item()">