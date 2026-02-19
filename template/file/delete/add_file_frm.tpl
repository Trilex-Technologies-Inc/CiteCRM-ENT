<!-- add_file_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Files</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="file_type" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_file_type</span><br>"}
{validate field="file_type_id" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_file_type_id</span><br>"}
{validate field="file_name" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_file_name</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=file:add_file" id="add_file_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_file_type}</td>
		<td class="fieldValue"><input type="text" name="file_type" value="{$file_type}" size="" id="file_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_type_id}</td>
		<td class="fieldValue"><input type="text" name="file_type_id" value="{$file_type_id}" size="" id="file_type_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_size}</td>
		<td class="fieldValue"><input type="text" name="file_size" value="{$file_size}" size="" id="file_size">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_name}</td>
		<td class="fieldValue"><input type="text" name="file_name" value="{$file_name}" size="" id="file_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_ext}</td>
		<td class="fieldValue"><input type="text" name="file_ext" value="{$file_ext}" size="" id="file_ext">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_create_date}</td>
		<td class="fieldValue"><input type="text" name="file_create_date" value="{$file_create_date}" size="" id="file_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_upload_by}</td>
		<td class="fieldValue"><input type="text" name="file_upload_by" value="{$file_upload_by}" size="" id="file_upload_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_active}</td>
		<td class="fieldValue"><input type="text" name="file_active" value="{$file_active}" size="" id="file_active">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_mime_type}</td>
		<td class="fieldValue"><input type="text" name="file_mime_type" value="{$file_mime_type}" size="" id="file_mime_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_path}</td>
		<td class="fieldValue"><input type="text" name="file_path" value="{$file_path}" size="" id="file_path">
</td>
	</tr>
	<tr>
		<td colspan="11">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
