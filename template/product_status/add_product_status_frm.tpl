<!-- add_product_status_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Product Status</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}

{validate field="product_status_text"	 criteria="notEmpty"  message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">Product Status must not be empty!</span>"}

{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=product_status:add_product_status" id="add_product_status_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_product_status_text}</td>
		<td class="fieldValue"><input type="text" name="product_status_text" value="{$product_status_text}" size="" id="product_status_text">
</td>
	</tr>
	<tr>
		<td colspan="2">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
