<!-- payment_option_2.tpl -->
<table cellspacing="3" cellpadding="0" cellspacing="0">
    <tr>    
        <td class="formAreaTitle">Check Number</td>    
        <td class="fieldValue"><input type="text" id="check_number" size="15"></td>
    </tr>
</table>
<input type="hidden" name="invoice_payment_type" id="invoice_payment_type" value="2">
<input type="button" id="submit" value="Save" onclick="save_payment()"> 
<input type="button" id="cancel" value="Cancel" onclick="cancel_new_item()">
