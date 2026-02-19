<!-- add Sysytem to work order -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Add System to Workorder</td>
    </tr>
</table>
<table cellpadding="5" cellspacing="0" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">System</td>
		<td class="fieldValue">
			{if $company_id != ""}
				{html_select_company_system fieldName=new_system company_id=$company_id value=$system_id}</td>
			{else}
				{html_select_user_system fieldName=new_system user_id=$user_id value=$system_id}
			{/if}
        </td>
    </tr><tr>
		<td class="fieldValue" colspan="2">
			<input type="button" name="submit" value="Save" id="submit" onclick="submit_system()">
            <input type="button" name="cancel" value="Cancel" onclick="javascript:load_window('Systems','system.system_id','ASC','1');">
		</td>
	</tr>
</table>	
