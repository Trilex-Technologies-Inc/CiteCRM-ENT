<table>
    <tr>
        <td>
            <table cellpadding="3" cellspacing="0">
                <tr>
                    <td class="formAreaTitle">Name</td>
                    <td class="fieldValue">{$companyObj->get_company_name()}</td>
                </tr><tr>
                    <td class="formAreaTitle">Website</td>
                    <td class="fieldValue"><a href="{$companyObj->get_company_website()}" target="_blank">{$companyObj->get_company_website()}</a></td>
                </tr><tr>
                    <td class="formAreaTitle">Created</td>
                    <td class="fieldValue">{$companyObj->get_company_create_date()|date_format:$DATE_FORMAT}</td>
                </tr><tr>
                    <td class="formAreaTitle">Active</td>
                    <td class="fieldValue">{$companyObj->get_company_active()|yesno}</td>
                </tr><tr>
                    <td class="formAreaTitle">Assigned To</td>
                    <td class="fieldValue"><a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$companyObj->get_company_assgned_to()}">{$companyObj->get_company_assgned_to()|display_names}</a></td>
                </tr>
            </table>
        </td>
        <td valign="top"><a href="javascript:edit_company_details()">Edit</a></td>
    </tr>
</table>	