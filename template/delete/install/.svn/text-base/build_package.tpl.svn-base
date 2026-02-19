<!-- build_package -->

{include file="core/header.tpl"}

<form method="POST" action="index.php?page=install:build_package">

<table cellpadding="3" cellspacing="0" class="formArea" >
	</tr>
		<td class="formAreaTitle" colspan="4">Package Name</td>
		<td class="fieldValue"><input type="text" name="package_name" value="{$package_name}"></td>
	</tr><tr>
		<td class="formAreaTitle" colspan="4" valign="top">Modules</td>
		<td class="fieldValue">{html_select_modules value=$modules name="modules"}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="4" valign="top">Required Modules</td>
		<td class="fieldValue">{html_select_modules value=$modules name="require_modules"}</td>
	</tr><tr>	
		<td class="formAreaTitle" colspan="4" valign="top">Smarty Plugins</td>
		<td class="fieldValue">{html_select_plugins}</td>
	</tr><tr>		
		<td class="fieldValue" colspan="2"><input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>
{include file="core/footer.tpl"}