<!-- update_workorder_note_frm -->
<table width="100%">
	<tr>
		<td><span class="greetUser"><span class="greetUser">Edit Work Order Note</span></td></td>	
	</tr>
</table>

<form method="post" action="" id="add_workorder_note_frm">
<table cellpadding="5" cellspacing="0" class="formArea">
	<tr>
		<td class="formAreaTitle">Work Order ID</td>
		<td class="fieldValue">{$workorder_note->get_workorder_id()}</td>
	</tr><tr>
		<td class="formAreaTitle">Created By</td>
		<td class="fieldValue">{$workorder_note->get_workorder_note_create_by()|display_names}</td>
	</tr><tr>
        <td class="formAreaTitle" colspan="2">Subject</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><input type="text" id="workorder_note_subject" value="{$workorder_note->get_workorder_subject()}" size="60"></td>
    </tr><tr>
		<td class="formAreaTitle" colspan="2">Note</td>
	</tr><tr>
		<td class="fieldValue" colspan="2">
			<textarea name="workorder_note_text" id="workorder_note_text" rows="15" cols="70" id="workorder_note_text">{$workorder_note->get_workorder_note_text()}</textarea>
		</td>
	</tr><tr>
        <td class="fieldValue" colspan="2">Delete <input type="checkbox" id="delete" value="1"></td>
    </tr><tr>
        <td class="fieldValue" colspan="2">
            <input type="hidden" name="workorder_note_id" value="{$workorder_note_id}" id="workorder_note_id">
            <input type="hidden" name="workorder_id" value="{$workorder_note->get_workorder_id()}">
            <input type="button" name="submit" value="Submit" id="submit" onclick="edit_workorder_note()">
            <input type="button" name="cancel" value="Cancel" onclick="load_window('Notes','last_modified','DESC','1');">
        </td>
    </tr> 
</table>
<br>





</form>


