<!-- ajax_load_payment_options.tpl -->

<br>

<span class="greetUser">Recieve Payment</span>

<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{html_select_date prefix="invoice_paid_date"}</td>
		<td class="formAreaTitle">Recieved By</td>
		<td class="fieldValue">{$SESSION_USER_ID|display_names}</td>
		<td class="formAreaTitle">Payment Type</td>
		<td class="fieldValue">{html_select_payment_options fieldName="invoice_payment_type" value=$invoice_payment_type}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="4"><div id="option_box"></div></td>		
		<td class="formAreaTitle">Payment Amount</td>
		<td class="fieldValue">$<input type="text" name="invoice_paid_amount" value="{$invoice_total_amount|string_format:"%.2f"}" size="10" id="invoice_paid_amount"></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="6" align="right">
            <input type="button" value="Submit Payment" name="submit" onclick="post_payment()">
        </td>
	</tr>
</table>



