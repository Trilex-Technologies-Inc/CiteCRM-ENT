<!-- ajax_add_system_manufacture.tpl -->
<br>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add Manufacture</span></td>
	</tr>
</table>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="manufacture_name" id="manufacture_name" ></td>
		<td class="formAreaTitle">Abrv</td>
		<td class="fieldValue"><input type="text" name="manufacture_abrv" id="manufacture_abrv" ></td>
	</tr><tr>
		<td colspan="2">
			
			<input type="button" name="save" id="save" value="Save" onclick="save_new_manufacture()">
			<input type="button" name="cancel" id="cancel" value="Cancel" onclick="cancel()">
		</td>
	</tr>
</table>