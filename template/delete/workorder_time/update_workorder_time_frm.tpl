<!-- update_workorder_time_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Workorder Time ID# {$workorder_time->get_workorder_time_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="index.php?page=workorder_time:update_workorder_time" id="add_workorder_time_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_id}</td>
		<td class="fieldValue"><input type="text" name="workorder_id" value="{$workorder_time->get_workorder_id()}" id="workorder_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_user_id}</td>
		<td class="fieldValue"><input type="text" name="user_id" value="{$workorder_time->get_user_id()}" id="user_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_time_start}</td>
		<td class="fieldValue"><input type="text" name="workorder_time_start" value="{$workorder_time->get_workorder_time_start()}" id="workorder_time_start">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_workorder_time_end}</td>
		<td class="fieldValue"><input type="text" name="workorder_time_end" value="{$workorder_time->get_workorder_time_end()}" id="workorder_time_end">
</td>
	</tr>
	<tr>
		<td colspan="5">
		<input type="hidden" name="workorder_time_id" value="{$workorder_time_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
