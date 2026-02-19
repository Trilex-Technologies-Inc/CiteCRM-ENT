<!-- add_note_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Notes</td>
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

<form method="post" action="{$ROOT_URL}/index.php?page=note:add_note" id="add_note_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_note_text}</td>
		<td class="fieldValue"><input type="text" name="note_text" value="{$note_text}" size="" id="note_text">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type}</td>
		<td class="fieldValue"><input type="text" name="note_type" value="{$note_type}" size="" id="note_type">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_type_id}</td>
		<td class="fieldValue"><input type="text" name="note_type_id" value="{$note_type_id}" size="" id="note_type_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_enter_by}</td>
		<td class="fieldValue"><input type="text" name="note_enter_by" value="{$note_enter_by}" size="" id="note_enter_by">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_create_date}</td>
		<td class="fieldValue"><input type="text" name="note_create_date" value="{$note_create_date}" size="" id="note_create_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_note_active}</td>
		<td class="fieldValue"><input type="text" name="note_active" value="{$note_active}" size="" id="note_active">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
