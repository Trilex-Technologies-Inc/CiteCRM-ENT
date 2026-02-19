<table cellpadding="5" cellspacing="5" class="formArea" width="600">
    <tr>
        <td class="formAreaTitle" nowrap="true">Service Name</td>
        <td class="fieldValue"><input type="text" name="service_name" id="service_name" size="60" value="{$serviceObj->get_service_name()}"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Amount</td>
        <td class="fieldValue"><input type="text" name="service_amount" id="service_amount" size="16" value="{$serviceObj->get_service_amount()}"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Active</td>
        <td class="fieldValue">{html_select_yesno fieldName="service_active" value=$serviceObj->get_service_active()}</td>
    </tr>
</table>
<br>
<input type="hidden" name="service_id" id="service_id" value="{$serviceObj->get_service_id()}">
<input type="submit" value="Save" onclick="update_service()">
<input type="button" value="Delete" onclick="delete_service()">
<input type="button" value="Cancel" onclick="cancel()">