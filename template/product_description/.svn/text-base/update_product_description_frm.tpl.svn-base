<!-- update_product_description_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Product Description ID# {$product_description->get_product_description_id()}</span></td>
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

<form method="post" action="index.php?page=product_description:update_product_description" id="add_product_description_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue"><input type="text" name="product_id" value="{$product_description->get_product_id()}" id="product_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_name}</td>
		<td class="fieldValue"><input type="text" name="product_name" value="{$product_description->get_product_name()}" id="product_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_description}</td>
		<td class="fieldValue"><input type="text" name="product_description" value="{$product_description->get_product_description()}" id="product_description">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_product_url}</td>
		<td class="fieldValue"><input type="text" name="product_url" value="{$product_description->get_product_url()}" id="product_url">
</td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="hidden" name="product_description_id" value="{$product_description_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
