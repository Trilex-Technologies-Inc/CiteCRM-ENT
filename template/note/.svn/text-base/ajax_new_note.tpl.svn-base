<!-- ajax_new_note.tpl -->
<br>

<input type="hidden" name="note_type" id="note_type" value="{$note_type}">
<input type="hidden" name="note_type_id" id="note_type_id" value="{$note_type_id}">

<table cellpadding="1" cellspacing="3" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_note_text}</td>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{$smarty.now|date_format:$DATE_TIME_FORMAT}</td>
	</tr><tr>
        <td class="formAreaTitle">Subject</td>
        <td class="fieldValue" colspan="2"><input type="text" size="60" id="note_subject"></td>
    </tr><tr>
		<td class="fieldValue" colspan="3"><textarea name="note_text" id="note_text" cols="35" rows="10"></textarea></td>
	</tr><tr>
		<td class="fieldValue" colspan="3"><input type="button" name="submit" id="submit" value="Save" onclick="save_note()"></td>
	</tr><tr>
		<td><br></td>
	</tr>
</table>

