<!-- update_tax_type_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Tax Type ID# {$tax_type->get_tax_type_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="tax_type_text" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_type_text</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=tax_type:update_tax_type" id="add_tax_type_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type_text}</td>
		<td class="fieldValue"><input type="text" name="tax_type_text" value="{$tax_type->get_tax_type_text()}" id="tax_type_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type_active}</td>
		<td class="fieldValue"><input type="text" name="tax_type_active" value="{$tax_type->get_tax_type_active()}" id="tax_type_active">
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="tax_type_id" value="{$tax_type_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
