<!-- view_invoice_part -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View invoice_part ID# {$invoice_part->get_invoice_part_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=invoice_part:update_invoice_part&invoice_part_id={$invoice_part->get_invoice_part_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=invoice_part:delete_invoice_part&invoice_part_id={$invoice_part->get_invoice_part_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue">{$invoice_part->get_invoice_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue">{$invoice_part->get_product_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_qty}</td>
		<td class="fieldValue">{$invoice_part->get_invoice_part_qty()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_amount}</td>
		<td class="fieldValue">{$invoice_part->get_invoice_part_amount()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_sub_total}</td>
		<td class="fieldValue">{$invoice_part->get_invoice_part_sub_total()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
