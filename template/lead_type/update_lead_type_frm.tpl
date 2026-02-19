<!-- update_lead_type_frm -->


<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Edit Lead Type {$lead_type->get_lead_type_text()}</span></td>
		<td align="right"></td>
</tr>
</table>

<form >

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_type_text}</td>
		<td class="fieldValue">
            <input type="text" name="lead_type_text_1" id ="lead_type_text_1" value="{$lead_type->get_lead_type_text()}">
        </td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_lead_type_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName=lead_type_active value=$lead_type->get_lead_type_active()}</td>
	</tr><tr>
		<td colspan="3">
		    <input type="hidden" name="lead_type_id" id="lead_type_id" value="{$lead_type->get_lead_type_id()}">
		    <input type="button" name="submit" id="submit" value="Save" onclick ="update_lead_type();">
		    <input type="button" name="submit" id="submit" value="Delete" onclick="delete_lead_type('{$lead_type->get_lead_type_id()}')">
		    <input type="button" name="cancel" id="cancel" value="Cancel" onclick="cancel_add_lead()">		
		</td>
	</tr>
</table>

</form>

