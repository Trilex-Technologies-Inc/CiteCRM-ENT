<!-- view_lead_status -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View lead_status ID# {$lead_status->get_lead_status_id()}</span></td>
		<td align="right">
				<a href="/index.php?page=lead_status:search_lead_status"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="index.php?page=lead_status:update_lead_status&lead_status_id={$lead_status->get_lead_status_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="index.php?page=lead_status:delete_lead_status&lead_status_id={$lead_status->get_lead_status_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_status_text}</td>
		<td class="fieldValue">{$lead_status->get_lead_status_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_lead_status_active}</td>
		<td class="fieldValue">{$lead_status->get_lead_status_active()|yesno}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
