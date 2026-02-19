<!-- payment_option_1.tpl -->
{if $error}
	{$errorMsg}
{/if}
<table cellspacing="3" cellpadding="0" cellspacing="0">
    <tr>    
        <td class="formAreaTitle">Card Type</td>
        <td class="fieldValue">{html_select_accepted_credit_cards}</td>
        <td class="formAreaTitle">Card Number</td>    
        <td class="fieldValue"><input type="text" id="cc_num" size="18"></td>
        <td class="formAreaTitle">Expire</td>       
        <td class="fieldValue">{html_select_date display_days=false end_year=2030 prefix="cc"}</td>
    </tr>
</table>
<input type="hidden" name="invoice_payment_type" id="invoice_payment_type" value="1">
<input type="button" id="submit" value="Save" onclick="save_payment()"> 
<input type="button" id="cancel" value="Cancel" onclick="cancel_new_item()">