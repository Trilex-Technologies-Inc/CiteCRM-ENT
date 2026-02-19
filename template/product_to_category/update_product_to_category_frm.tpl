<!-- update_product_to_category_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Product To Category ID# {$product_to_category->get_product_to_category_id()}</span></td>
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

<form method="post" action="index.php?page=product_to_category:update_product_to_category" id="add_product_to_category_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue"><input type="text" name="product_id" value="{$product_to_category->get_product_id()}" id="product_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_category_id}</td>
		<td class="fieldValue"><input type="text" name="category_id" value="{$product_to_category->get_category_id()}" id="category_id">
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="product_to_category_id" value="{$product_to_category_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
