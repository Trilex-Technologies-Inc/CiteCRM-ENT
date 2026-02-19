<!-- update_manufacture_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Manufacture ID# {$manufacture->get_manufacture_id()}</span></td>
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

<form method="post" action="{$ROOT_URL}/index.php?page=manufacture:update_manufacture" id="add_manufacture_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacture_name}</td>
		<td class="fieldValue"><input type="text" name="manufacture_name" value="{$manufacture->get_manufacture_name()}" id="manufacture_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacture_image}</td>
		<td class="fieldValue"><input type="text" name="manufacture_image" value="{$manufacture->get_manufacture_image()}" id="manufacture_image">
</td>
	</tr>
	<tr>
		<td colspan="3">
		<input type="hidden" name="manufacture_id" value="{$manufacture_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
