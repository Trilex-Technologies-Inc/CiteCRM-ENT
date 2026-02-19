<!-- update_lead_status_frm -->


<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Lead Status {$lead_status->get_lead_status_text()}</span></td>
    </tr>
</table>


<br>

<form>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_status_text}</td>
		<td class="fieldValue"><input type="text" name="lead_status_text" id="lead_status_text" value="{$lead_status->get_lead_status_text()}" id="lead_status_text"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_lead_status_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName=lead_status_active value=$lead_status->get_lead_status_active()}</td>
	</tr><tr>
		<td colspan="3">
		    <input type="hidden" name="lead_status_id" id="lead_status_id" value="{$lead_status_id}">
		    <input type="button" name="submit" value="Save" onclick ="update_lead_status();">
            <input type="button" name="submit" id="submit" value="Delete" onclick="delete_lead_status('{$lead_status->get_lead_status_id()}')">
            
            <input type="button" name="cancel" id="cancel" value="Cancel" onclick="cancel_edit()">
        </td>
	</tr>
</table>

</form>

