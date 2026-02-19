<!-- view_system_manufacture -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View system_manufacture ID# {$system_manufacture->get_system_manufacture_id()}</span></td>
		<td align="right">
				<a href="{$from}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}index.php?page=system_manufacture:update_system_manufacture&system_manufacture_id={$system_manufacture->get_system_manufacture_id()}"><img src="{$ROOT_URL}images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}index.php?page=system_manufacture:delete_system_manufacture&system_manufacture_id={$system_manufacture->get_system_manufacture_id()}"><img src="{$ROOT_URL}images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Manufacture ABRV</td>
		<td class="fieldValue">{$system_manufacture->get_manufacture_abrv()}</td>
	</tr>
	<tr>
		<td class="formAreaTitle">Manufacture Name</td>
		<td class="fieldValue">{$system_manufacture->get_manufacture_name()}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
