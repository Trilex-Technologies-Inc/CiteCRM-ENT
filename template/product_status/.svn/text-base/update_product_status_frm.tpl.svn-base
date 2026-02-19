<!-- update_product_status_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Product Status ID# {$product_status->get_product_status_id()}</span></td>
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

<form method="post" action="index.php?page=product_status:update_product_status" id="add_product_status_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_status_text}</td>
		<td class="fieldValue"><input type="text" name="product_status_text" value="{$product_status->get_product_status_text()}" id="product_status_text">
</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="hidden" name="product_status_id" value="{$product_status_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
