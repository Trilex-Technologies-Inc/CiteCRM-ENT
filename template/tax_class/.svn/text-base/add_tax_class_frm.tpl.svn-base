<!-- add_tax_class_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Tax Class</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="tax_class_title" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_class_title</span><br>"}
{validate field="tax_class_description" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_class_description</span><br>"}
{validate field="tax_type" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_type</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=tax_class:add_tax_class" id="add_tax_class_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_title}</td>
		<td class="fieldValue"><input type="text" name="tax_class_title" value="{$tax_class_title}" size="" id="tax_class_title">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_description}</td>
		<td class="fieldValue"><input type="text" name="tax_class_description" value="{$tax_class_description}" size="" id="tax_class_description">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_type}</td>
		<td class="fieldValue"><input type="text" name="tax_type" value="{$tax_type}" size="" id="tax_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_active}</td>
		<td class="fieldValue"><input type="text" name="tax_class_active" value="{$tax_class_active}" size="" id="tax_class_active">
</td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
