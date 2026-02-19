<!-- add_lead_status_frm -->
<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add Lead Status</td>
		<td align="right"></td>
    </tr>
</table>

<form>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_status_text}</td>
		<td class="fieldValue"><input type="text" name="lead_status_text" id="lead_status_text" value="" size="" id="lead_status_text"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_lead_status_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName=lead_status_active value=1}</td>
	</tr><tr>
		<td colspan="3">
		    <input type="button" name="submit" value="Save" onclick="save_lead_status()">
            <input type="button" name="cancel" value="Cancel" onclick="cancel_edit()">
        </td>
	</tr>
</table>

</form>

