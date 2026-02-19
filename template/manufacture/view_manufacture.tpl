<!-- view_manufacture -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View manufacture ID# {$manufacture->get_manufacture_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=manufacture:update_manufacture&manufacture_id={$manufacture->get_manufacture_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=manufacture:delete_manufacture&manufacture_id={$manufacture->get_manufacture_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacture_name}</td>
		<td class="fieldValue">{$manufacture->get_manufacture_name()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_manufacture_image}</td>
		<td class="fieldValue">{$manufacture->get_manufacture_image()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
