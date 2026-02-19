<!-- cc_payment.tpl -->
<table cellpadding="3" cellspacing="0" class="productListing" width="600">
	<tr>
		<td class="productListing-heading">{$translate_field_payment_payment_id}</td>
        <td class="productListing-heading">{$translate_field_invoice_payment_type}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_status}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_number}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_expirdate}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_billing_attempt}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_date_proc}</td>
        <td class="productListing-heading">{$translate_field_payment_cc_payment_amount}</td>
        
    </tr><tr>
        <td class="productListing-data">{$paymentObj->get_cc_payment_id()}</td>
        <td class="productListing-data">{$translate_text_credit_card}</td>
        <td class="productListing-data">           
            {if $paymentObj->get_cc_payment_status() == "Pending"}
                <img src="images/icons/apps_16.gif" border="0" alt="Process CC Card" align="middle" onclick="proc_cc()">
            {/if}

            {if $paymentObj->get_cc_payment_status() == "Declined"}
                <img src="images/icons/apps_16.gif" border="0" alt="Process CC Card" align="middle" onclick="proc_cc()">
                <img src="images/icons/move_16.gif" border="0" alt="New CC Card" align="middle" onclick="load_payment_options()">
            {/if}

            {$paymentObj->get_cc_payment_status()}
        </td>
        <td class="productListing-data">{$paymentObj->get_cc_payment_number()|display_cc_number}</td>
        <td class="productListing-data" nowrap>{$paymentObj->get_cc_payment_expirdate()|display_cc_expr}</td>
        <td class="productListing-data"><img src="images/icons/copy_16.gif" align="middle"> {$paymentObj->get_cc_payment_billing_attempt()}</td>
        <td class="productListing-data">
            {if $paymentObj->get_cc_payment_date_proc() == 0}
                {$translate_text_no_proc_date}
            {else}
                {$paymentObj->get_cc_payment_date_proc()|date_format:"%Y-%m-%d"}
            {/if}            
        </td>
        <td class="productListing-data">${$paymentObj->get_cc_payment_amount()|string_format:"%.2f"}</td>
    </tr>
</table>