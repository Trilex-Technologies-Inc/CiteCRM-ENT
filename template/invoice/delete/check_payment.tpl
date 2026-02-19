<!-- check_payment.tpl -->
<table cellpadding="3" cellspacing="0" class="productListing" width="600">
	<tr>
		<td class="productListing-heading">{$translate_field_payment_check_payment_id}</td>
        <td class="productListing-heading">{$translate_field_payment_check_payment_number}</td>
        <td class="productListing-heading">{$translate_field_payment_check_payment_amount}</td>
        <td class="productListing-heading">{$translate_field_payment_check_payment_date}</td>
        <td class="productListing-heading">{$translate_field_payment_check_payment_enter_by}</td>
        <td class="productListing-heading">{$translate_field_payment_check_payment_status}</td>
    </tr><tr>
        <td class="productListing-data">{$paymentObj->get_check_payment_id()}</td>
        <td class="productListing-data">{$paymentObj->get_check_payment_number()}</td>
        <td class="productListing-data">${$paymentObj->get_check_payment_amount()|string_format:"%.2f"}</td>
        <td class="productListing-data">{$paymentObj->get_check_payment_date()|date_format:"%Y-%m-%d"}</td>
        <td class="productListing-data">{$paymentObj->get_check_payment_enter_by()|display_names}</td>
        <td class="productListing-data"><a href=""><img src="images/icons/apps_16.gif" border="0" alt="Check Bounce" align="middle"></a> {$paymentObj->get_check_payment_status()}</td>
    </tr>
</table>