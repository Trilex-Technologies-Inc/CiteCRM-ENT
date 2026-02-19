<!-- view_note -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View note ID# {$note->get_note_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=note:update_note&note_id={$note->get_note_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=note:delete_note&note_id={$note->get_note_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_note_text}</td>
		<td class="fieldValue">{$note->get_note_text()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type}</td>
		<td class="fieldValue">{$note->get_note_type()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type_id}</td>
		<td class="fieldValue">{$note->get_note_type_id()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_enter_by}</td>
		<td class="fieldValue">{$note->get_note_enter_by()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_create_date}</td>
		<td class="fieldValue">{$note->get_note_create_date()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_active}</td>
		<td class="fieldValue">{$note->get_note_active()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
