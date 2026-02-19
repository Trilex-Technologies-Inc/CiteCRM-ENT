<!-- create_new.tpl -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">
function validate_form(thisform) {

    var error = false;
	var errorMsg = 'There where errors saving your Alert\n';	

    with (thisform){


    }


    // If we have an error stop and show 
    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Alert!';
		alert(errorMsg);
        return false;       
    }
}
</script>
{/literal}

<form method="post" action="{$ROOT_URL}/index.php?page=alert:create_new" id="new_alert" onsubmit="return validate_form(this);">
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a  href="" class="current">Alert Information</a></li>	
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
	<tr>
		<td class="productListing-data" style="background-color: #F0F8FF" >
			<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
				<tr>
					<td class="formAreaTitle">Start Date</td>
					<td class="fieldValue">{html_select_date prefix="start_date" end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}</td>
                    <td class="formAreaTitle">End Date</td>
                    <td class="fieldValue">{html_select_date prefix="end_date" end_year=+$SELECT_YEAR_INCREMENT start_year=$CURRENT_YEAR}</td>
				</tr><tr>
                    <td class="formAreaTitle">Subject</td>
                    <td class="fieldValue" colspan="3"><input type="text" name="alert_subject" id="alert_subject" size="60"></td>
                </tr><tr>
                    <td class="formAreaTitle" colspan="4">Details</td>
                </tr><tr>
                    <td class="fieldValue" colspan="4"><textarea cols="25" rows="10" id="alert_text" name="alert_text"></textarea></td>
                </tr><tr>
                    <td class="formAreaTitle">All Employees</td>
                    <td class="fieldValue"><input type="checkbox" name="all_employees" id="all_employees" value="1"></td>
                    <td></td>
                    <td></td>
                </tr><tr>
                    <td class="formAreaTitle" valign="top">Select Employees</td>
                    <td class="fieldValue" colspan="3">
                        <select multiple id="employees" name="employees[]">
                        {foreach from=$employee_array item="employee"}
                            <option value="{$employee->getUserID()}">{$employee->getUserFirstName()} {$employee->getUserLastName()}</option>

                        {/foreach}
                        </select>

                    </td>
                </tr><tr>
                    <td class="fieldValue" colspan="4"><input type="submit" name="submit" value="Save"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br>



</form>

{include file="core/footer.tpl"}