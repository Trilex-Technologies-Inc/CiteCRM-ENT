<!-- ajax_load_employee_support.tpl -->
<table width="100%">
    <tr>
        <td><span class="greetUser">{$user_id|display_names}'s Support Calls</span></td>
           
    </tr>
</table>

    <table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
        <tr>
            <td class="productListing-heading">
                {if $sort == 'DESC' && $field == 'support_calls.support_call_id'}
                    <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Support','support_calls.support_call_id','ASC','{$next}')" style="cursor:pointer">ID</span>
                {else}
                    <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Support','support_calls.support_call_id','DESC','{$next}')" style="cursor:pointer">ID</span>
                {/if}           
            </td>
            <td class="productListing-heading">
                {if $sort == 'DESC' && $field == 'company.company_id'}
                    <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('Support','company.company_id','ASC','{$next}')" style="cursor:pointer">Company</span>
                {else}
                    <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('Support','company.company_id','DESC','{$next}')" style="cursor:pointer">Company</span>
                {/if}   
            </td>
            <td class="productListing-heading">Start</td>
            <td class="productListing-heading">End</td>
            <td class="productListing-heading">Duration</td>
            
        </tr>
        {foreach from=$support_call_array item=call}
        <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=}';">
            <td class="productListing-data" {if $field == 'support_calls.support_call_id'} style="background-color: #ECECEC;"{/if}>{$call->get_support_call_id()}</td>
            <td class="productListing-data" {if $field == 'company.company_id'} style="background-color: #ECECEC;"{/if}><A href="{$ROOT_URL}/index.php?page=company:view_company&company_id={$call->fields.company_id}">{$call->fields.company_name}</A></td>
            <td class="productListing-data">{$call->get_support_call_start()|date_format:$DATE_TIME_FORMAT}</td>
            <td class="productListing-data">{$call->get_support_call_stop()|date_format:$DATE_TIME_FORMAT}</td>
            <td class="productListing-data"></td>
        </tr>
        {foreachelse}
        <tr>
            <td class="productListing-data" colspan="9">No Calls</td>
        </tr>
        {/foreach}
        <tr>
            <td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
                <table width="100%">
                    <tr>
                        <td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
                        <td class="data" width="75%"></td>
                        <td class="data" nowrap>
                            <a href="javascript:load_window('Support','{$field}','{$sort}','1');">First</a> |
                            <a href="javascript:load_window('Support','{$field}','{$sort}','{paginate_prev id="support_calls"}');">Prev</a> |

                            <a href="javascript:load_window('Support','{$field}','{$sort}','{paginate_next id="support_calls"}');" >Next</a> |
                            <a href="javascript:load_window('Support','{$field}','{$sort}','{paginate_last id="support_calls}');">Last</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
