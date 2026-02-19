<!-- view_bill -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View bill ID# {$bill->get_bill_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=bill:update_bill&bill_id={$bill->get_bill_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=bill:delete_bill&bill_id={$bill->get_bill_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Vendor</td>
		<td class="fieldValue">{$bill->get_vendor_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{$bill->get_bill_date_create()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Due</td>
		<td class="fieldValue">{$bill->get_bill_due_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Amount Due</td>
		<td class="fieldValue">{$bill->get_bill_amount_due()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Amount Paid</td>
		<td class="fieldValue">{$bill->get_bill_amount_paid()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Ref. No</td>
		<td class="fieldValue">{$bill->get_bill_ref_num()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Memo</td>
		<td class="fieldValue">{$bill->get_bill_memo()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Paid</td>
		<td class="fieldValue">{$bill->get_bill_paid()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
