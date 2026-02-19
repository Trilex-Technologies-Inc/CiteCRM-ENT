<!-- update_campaign_type_frm -->

<br>
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_type_text}</td>
		<td class="fieldValue"><input type="text" name="campaign_type_text" value="{$campaign_type->get_campaign_type_text()}" id="campaign_type_text"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_campaign_type_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName="campaign_type_active" value="$campaign_type->get_campaign_type_active()}</td>
	</tr><tr>
		<td colspan="3">
		    <input type="hidden" name="campaign_type_id" value="{$campaign_type->get_campaign_type_id()}">
		    
		    <input type="button" name="submit" value="Save" onclick="update_campaign_type()"> 
		    <input type="button" name="delete" id="delete" value="Delete" onclick="delete_campaign_type('{$campaign_type->get_campaign_type_id()}')">
			<input type="button" name="cancel" onclick="cancel_add_campaign_type()" value="Cancel">
        </td>
	</tr>
</table>

