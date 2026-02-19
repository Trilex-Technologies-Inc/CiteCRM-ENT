<!-- update_file_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Files ID# {$file->get_file_id()}</span></td>
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

<form method="post" action="index.php?page=file:update_file" id="add_file_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_file_type}</td>
		<td class="fieldValue"><input type="text" name="file_type" value="{$file->get_file_type()}" id="file_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_type_id}</td>
		<td class="fieldValue"><input type="text" name="file_type_id" value="{$file->get_file_type_id()}" id="file_type_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_size}</td>
		<td class="fieldValue"><input type="text" name="file_size" value="{$file->get_file_size()}" id="file_size">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_name}</td>
		<td class="fieldValue"><input type="text" name="file_name" value="{$file->get_file_name()}" id="file_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_ext}</td>
		<td class="fieldValue"><input type="text" name="file_ext" value="{$file->get_file_ext()}" id="file_ext">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_create_date}</td>
		<td class="fieldValue"><input type="text" name="file_create_date" value="{$file->get_file_create_date()}" id="file_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_upload_by}</td>
		<td class="fieldValue"><input type="text" name="file_upload_by" value="{$file->get_file_upload_by()}" id="file_upload_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_active}</td>
		<td class="fieldValue"><input type="text" name="file_active" value="{$file->get_file_active()}" id="file_active">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_mime_type}</td>
		<td class="fieldValue"><input type="text" name="file_mime_type" value="{$file->get_file_mime_type()}" id="file_mime_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_file_path}</td>
		<td class="fieldValue"><input type="text" name="file_path" value="{$file->get_file_path()}" id="file_path">
</td>
	</tr>
	<tr>
		<td colspan="11">
		<input type="hidden" name="file_id" value="{$file_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
