<!-- ajax_user_edit_contact.tpl -->
<table cellpadding="3" cellspacing="0" border="0">
    <tr>
        <td class="data">Primary Phone</td>
        <td class="data"><input type="text" name="primary_phone" id="primary_phone" value="{$primary_phone}"> <b>Ext</b> <input type="text" id="extension" size="8" value="{$extension}"></td>
    </tr><tr>
        <td class="data">Mobile Phone</td>
        <td class="data"><input type="text" name="mobile_phone" id="mobile_phone" value="{$mobile_phone}"></td>
    </tr><tr>                                
        <td class="data">Other Phone</td>
        <td class="data"><input type="text" name="secondary_phone" id="secondary_phone" value="{$secondary_phone}"></td>
    </tr><tr>
        <td>
            <input type="button" name="save" id="save" value="Save" onclick="save_contact()">
            <input type="button" name="" value="Cancel" onclick="javascript:load_window('Account Address','Service');">
        </td>
    </tr>
</table>
