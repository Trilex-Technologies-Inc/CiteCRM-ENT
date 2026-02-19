<!-- add_tax_rate_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Tax Rates</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="tax_rate_zone_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_rate_zone_id</span><br>"}
{validate field="tax_class_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_tax_class_id</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=tax_rate:add_tax_rate" id="add_tax_rate_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_zone_id}</td>
		<td class="fieldValue"><input type="text" name="tax_rate_zone_id" value="{$tax_rate_zone_id}" size="" id="tax_rate_zone_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_class_id}</td>
		<td class="fieldValue"><input type="text" name="tax_class_id" value="{$tax_class_id}" size="" id="tax_class_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_priority}</td>
		<td class="fieldValue"><input type="text" name="tax_rate_priority" value="{$tax_rate_priority}" size="" id="tax_rate_priority">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_value}</td>
		<td class="fieldValue"><input type="text" name="tax_rate_value" value="{$tax_rate_value}" size="" id="tax_rate_value">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_tax_rate_description}</td>
		<td class="fieldValue"><input type="text" name="tax_rate_description" value="{$tax_rate_description}" size="" id="tax_rate_description">
</td>
	</tr>
	<tr>
		<td colspan="6">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
