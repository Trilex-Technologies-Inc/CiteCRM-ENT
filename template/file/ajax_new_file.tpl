<!-- ajax_new_file.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Add File</span></td>
	</tr>
</table>
<form method="POST" action="{$ROOT_URL}/index.php?page=file:ajax_new_file" enctype="multipart/form-data" >
<input type="hidden" name="file_type" id="file_type" value="{$file_type}">
<input type="hidden" name="file_type_id" id="file_type_id" value="{$file_type_id}">
{if $employee == '1'} 
<input type="hidden" name="employee" id="employee" value="1">
{/if}
<!-- MAX_FILE_SIZE must precede the file input field -->
<input type="hidden" name="MAX_FILE_SIZE" value="{$MAX_FILE_SIZE}" />
<table cellpadding="5" cellspacing="0" class="formArea" width="395">
	<tr>
		<td class="formAreaTitle">File Name</td>
		<td class="fieldValue"><input type="text" name="file_name" value=""></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="3">File Description</td>
	</tr><tr>
		<td class="fieldValue " colspan="3"><textarea name="file_description"></textarea></td>
	</tr><tr>
		<td class="fieldValue" colspan="3">
			<input type="file" name="file" id="file"><br>
			Max Upload size: {$upload_max_filesize}
		</td>
	</tr><tr>
		<td class="fieldValue" colspan="3">
        <input type="submit" name="submit" id="submit" value="Save" onclick="upload_file()">
        </td>
	</tr>
</table>

</form>

