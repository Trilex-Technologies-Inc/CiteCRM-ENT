<!-- ajax_edit_company.tpl -->
<table>
    <tr>
        <td>
            <table cellpadding="3" cellspacing="0">
                <tr>
                    <td class="formAreaTitle">Name</td>
                    <td class="fieldValue"><input type="text" id="company_name" value="{$companyObj->get_company_name()}"></td>
                </tr><tr>
                    <td class="formAreaTitle">Website</td>
                    <td class="fieldValue"><input type="text" id="company_website" value="{$companyObj->get_company_website()}"></td>
                </tr><tr>
                    <td class="formAreaTitle">Active</td>
                    <td class="fieldValue">{html_select_yesno fieldName="company_active" value=$companyObj->get_company_active()}</td>
                </tr><tr>
                    <td class="formAreaTitle">Assgned To</td>
                    <td class="fieldValue">{html_select_employee fieldName="company_assgned_to" value=$companyObj->get_company_assgned_to()}</td>
                </tr><tr>
                    <td class="fieldValue" colspan="2">
                        <input type="button" id="save" value="save" onclick="save_company_details()">
                        <input type="button" name="cancel" value="Cancel" onclick="load_company_details();">
                    </td>
                </tr>
            </table>
        </td>
        <td><br></td>
    </tr>
</table>