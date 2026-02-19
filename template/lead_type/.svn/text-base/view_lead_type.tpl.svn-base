<!-- view_lead_type -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View lead_type ID# {$lead_type->get_lead_type_id()}</span></td>
		<td align="right">
				<a href="{$ROOT_URL}/index.php?page=lead_type:search_lead_type"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_type:update_lead_type&lead_type_id={$lead_type->get_lead_type_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=lead_type:delete_lead_type&lead_type_id={$lead_type->get_lead_type_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_type_text}</td>
		<td class="fieldValue">{$lead_type->get_lead_type_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_type_active}</td>
		<td class="fieldValue">{$lead_type->get_lead_type_active()|yesno}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
