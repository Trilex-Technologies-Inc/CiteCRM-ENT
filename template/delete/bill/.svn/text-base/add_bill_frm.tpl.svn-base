<!-- add_bill_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Record to bill</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=bill:add_bill" id="add_bill_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Vendor</td>
		<td class="fieldValue"><input type="text" name="vendor_id" value="{$vendor_id}" size="" id="vendor_id">
			{validate id="vendor_id" message="<br><span class='error'>Form Error: The field vendor_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue"><input type="text" name="bill_date_create" value="{$bill_date_create}" size="" id="bill_date_create">
			{validate id="bill_date_create" message="<br><span class='error'>Form Error: The field bill_date_create Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Due</td>
		<td class="fieldValue"><input type="text" name="bill_due_date" value="{$bill_due_date}" size="" id="bill_due_date">
			{validate id="bill_due_date" message="<br><span class='error'>Form Error: The field bill_due_date Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Amount Due</td>
		<td class="fieldValue"><input type="text" name="bill_amount_due" value="{$bill_amount_due}" size="" id="bill_amount_due">
			{validate id="bill_amount_due" message="<br><span class='error'>Form Error: The field bill_amount_due Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Amount Paid</td>
		<td class="fieldValue"><input type="text" name="bill_amount_paid" value="{$bill_amount_paid}" size="" id="bill_amount_paid">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Ref. No</td>
		<td class="fieldValue"><input type="text" name="bill_ref_num" value="{$bill_ref_num}" size="" id="bill_ref_num">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Memo</td>
		<td class="fieldValue"><input type="text" name="bill_memo" value="{$bill_memo}" size="" id="bill_memo">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Paid</td>
		<td class="fieldValue"><input type="text" name="bill_paid" value="{$bill_paid}" size="" id="bill_paid">
</td>
	</tr>
	<tr>
		<td colspan="9">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
