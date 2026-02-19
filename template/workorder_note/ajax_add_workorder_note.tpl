<!-- add_workorder_note_frm -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Add New Work Order Note</span></td>	
	</tr>
</table>
<table cellpadding="5" cellspacing="0" class="formArea" width="400">
	<tr>
        <td class="formAreaTitle">Subject</td>
    </tr><tr>
        <td class="fieldValue"><input type="text" name="workorder_subject" id="workorder_subject" size="60"></td>
    </tr><tr>
		<td class="formAreaTitle">Note</td>
	</tr><tr>
		<td class="fieldValue">
			<textarea name="workorder_note_text" id="workorder_note_text" rows="15" cols="70">{$workorder_note_text}</textarea>
		</td>
	</tr><tr>
		<td class="fieldValue"><input type="button" name="submit" id="submit" value="Save" onclick="submit_note()">
            <input type="button" name="cancel" value="Cancel" onclick="load_window('Notes','last_modified','DESC','1');">
        </td>
	</tr>
</table>

 


