<!-- update_invoice_part_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Invoice Part ID# {$invoice_part->get_invoice_part_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=invoice_part:update_invoice_part" id="add_invoice_part_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_id}</td>
		<td class="fieldValue"><input type="text" name="invoice_id" value="{$invoice_part->get_invoice_id()}" id="invoice_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue"><input type="text" name="product_id" value="{$invoice_part->get_product_id()}" id="product_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_qty}</td>
		<td class="fieldValue"><input type="text" name="invoice_part_qty" value="{$invoice_part->get_invoice_part_qty()}" id="invoice_part_qty">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_amount}</td>
		<td class="fieldValue"><input type="text" name="invoice_part_amount" value="{$invoice_part->get_invoice_part_amount()}" id="invoice_part_amount">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_invoice_part_sub_total}</td>
		<td class="fieldValue"><input type="text" name="invoice_part_sub_total" value="{$invoice_part->get_invoice_part_sub_total()}" id="invoice_part_sub_total">
</td>
	</tr>
	<tr>
		<td colspan="6">
		<input type="hidden" name="invoice_part_id" value="{$invoice_part_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
