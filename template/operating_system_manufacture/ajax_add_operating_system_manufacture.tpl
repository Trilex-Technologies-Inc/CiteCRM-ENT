<!-- ajax_add_operating_system_manufacture.tpl-->
<br>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add Operating System Manufacture</span></td>
	</tr>
</table>

<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_name" id="operating_system_manufacture_name" ></td>
		<td class="formAreaTitle">Web Site</td>
		<td class="fieldValue"><input type="text" name="operating_system_manufacture_website" id="operating_system_manufacture_website"><br>
		( include http:// )
			
		</td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue" colspan="3">{html_select_yesno fieldName="operating_system_manufacture_active" value=1}</td>
	</tr><tr>
	
		<td colspan="4">			
			<input type="button" name="save" id="save" value="Save" onclick="save_new_manufacture()">
			<input type="button" name="cancel" id="cancel" value="Cancel" onclick="cancel()">
		</td>
	</tr>
</table>