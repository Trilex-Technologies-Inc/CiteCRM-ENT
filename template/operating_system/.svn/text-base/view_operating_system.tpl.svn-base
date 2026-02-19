<!-- view_operating_system -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View operating system Version {$operating_system->get_operating_system_id()}</span></td>
		<td align="right">
				<a href="{$ROOT_URL}/?page=operating_system_manufacture:view_operating_system_manufacture&operating_system_manufacture_id={$operating_system->get_operating_system_manufacture_id()}"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}/index.php?page=operating_system:update_operating_system&operating_system_id={$operating_system->get_operating_system_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}/index.php?page=operating_system:delete_operating_system&operating_system_id={$operating_system->get_operating_system_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
		</td>
	</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Operating System</td>
		<td class="fieldValue">{$operating_system->get_operating_system_manufacture_id()|operating_system_manufacture_name}</td>
	</tr><tr>
		<td class="formAreaTitle">Operating System Version</td>
		<td class="fieldValue">{$operating_system->get_operating_system_name()}</td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{$operating_system->get_operating_system_active()|yesno}</td>
	</tr>
</table>

<br><br>

{include file="core/footer.tpl"}
