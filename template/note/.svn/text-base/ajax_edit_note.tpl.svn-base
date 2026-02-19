<!-- ajax_edit_note.tpl -->
<table>
	<tr>
		<td><span class="greetUser">Edit Note</span></td>
	</tr>
</table>
<table cellpadding="1" cellspacing="3" class="formArea" width="400" height="100%">
	<tr>
		<td class="formAreaTitle">{$translate_field_note_text}</td>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{$noteObj->get_note_create_date()|date_format:$DATE_TIME_FORMAT}</td>
	</tr><tr>
        <td class="formAreaTitle">Subject</td>
        <td class="fieldValue" colspan="2"><input type="text" size="60" id="note_subject" value="{$noteObj->get_note_subject()}"></td>
    </tr><tr>
		<td class="fieldValue" colspan="3"><textarea name="note_text" id="note_text" cols="35" rows="10">{$noteObj->get_note_text()}</textarea></td>
	</tr><tr>
        <td class="formAreaTitle"><b>Delete</b></td>
        <td class="fieldValue" colspan="2"><input type="checkbox" id="delete" value="1" ></td>
    </tr><tr>
		<td class="fieldValue" colspan="3">
            <input type="hidden" name="note_id" id="note_id" value="{$noteObj->get_note_id()}">
            <input type="button" name="submit" id="submit" value="Save" onclick="update_note()">
        </td>
	</tr><tr>
		<td><br></td>
	</tr>
</table>
