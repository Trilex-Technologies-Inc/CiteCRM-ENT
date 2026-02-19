<!-- update_system_model_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update System Module ID# {$system_model->get_system_model_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="index.php?page=system_model:update_system_model" id="add_system_model_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Manufacture</td>
		<td class="fieldValue"><input type="text" name="system_manufacture_id" value="{$system_model->get_system_manufacture_id()}" id="system_manufacture_id">
			{validate id="system_manufacture_id" message="<br><span class='error'>Form Error: The field system_manufacture_id Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Model</td>
		<td class="fieldValue"><input type="text" name="system_model_name" value="{$system_model->get_system_model_name()}" id="system_model_name">
			{validate id="system_model_name" message="<br><span class='error'>Form Error: The field system_model_name Must not be empty</span>"}
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="system_model_id" value="{$system_model_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
