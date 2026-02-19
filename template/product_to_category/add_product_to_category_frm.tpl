<!-- add_product_to_category_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Product To Category</td>
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

<form method="post" action="index.php?page=product_to_category:add_product_to_category" id="add_product_to_category_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_id}</td>
		<td class="fieldValue"><input type="text" name="product_id" value="{$product_id}" size="" id="product_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_category_id}</td>
		<td class="fieldValue"><input type="text" name="category_id" value="{$category_id}" size="" id="category_id">
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
