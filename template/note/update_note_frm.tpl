<!-- update_note_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Notes ID# {$note->get_note_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="note_text" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_note_text</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=note:update_note" id="add_note_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_note_text}</td>
		<td class="fieldValue"><input type="text" name="note_text" value="{$note->get_note_text()}" id="note_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type}</td>
		<td class="fieldValue"><input type="text" name="note_type" value="{$note->get_note_type()}" id="note_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type_id}</td>
		<td class="fieldValue"><input type="text" name="note_type_id" value="{$note->get_note_type_id()}" id="note_type_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_enter_by}</td>
		<td class="fieldValue"><input type="text" name="note_enter_by" value="{$note->get_note_enter_by()}" id="note_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_create_date}</td>
		<td class="fieldValue"><input type="text" name="note_create_date" value="{$note->get_note_create_date()}" id="note_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_active}</td>
		<td class="fieldValue"><input type="text" name="note_active" value="{$note->get_note_active()}" id="note_active">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="hidden" name="note_id" value="{$note_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
