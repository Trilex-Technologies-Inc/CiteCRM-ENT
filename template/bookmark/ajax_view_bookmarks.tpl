<!-- ajax_view_bookmarks.tpl -->

<table>
{foreach from=$bookmark_array item=bookmarkObj}
    <tr>
        <td width="8"><br></td>
        <td>
            {if $bookmarkObj->get_bookmark_type() == "Web"}
                <a href="{$bookmarkObj->get_bookmark_description()}" target="new">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}

            {if $bookmarkObj->get_bookmark_type() == "Work Order"}
                <a href="{$ROOT_URL}/index.php?page=workorder:view_workorder&workorder_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}

             {if $bookmarkObj->get_bookmark_type() == "Lead"}
                <a href="/index.php?page=leads:view_lead&lead_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}
        
            {if $bookmarkObj->get_bookmark_type() == "Account"}
                <a href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}
            
            {if $bookmarkObj->get_bookmark_type() == "Contact"}
                <a href="{$ROOT_URL}/index.php?page=user:admin_view_user_detail&userID={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}

            {if $bookmarkObj->get_bookmark_type() == "Invoice"}
                <a href="{$ROOT_URL}/index.php?page=invoice:view_invoice&invoice_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}

             {if $bookmarkObj->get_bookmark_type() == "System"}
                <a href="{$ROOT_URL}/index.php?page=system:view_system&system_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}
    
            {if $bookmarkObj->get_bookmark_type() == "Product"}
                <a href="{$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}
    
            {if $bookmarkObj->get_bookmark_type() == "Employee"}
                <a href="{$ROOT_URL}/index.php?page=user:view_employee&user_id={$bookmarkObj->get_bookmark_type_id()}">{$bookmarkObj->get_bookmark_description()}</a></td>
            {/if}
            <td width="8"><br></td>
            <td><a href="javascript:delete_bookmark('{$bookmarkObj->get_bookmark_id()}')">Delete</a></td>
    </tr>
{/foreach}
</table>