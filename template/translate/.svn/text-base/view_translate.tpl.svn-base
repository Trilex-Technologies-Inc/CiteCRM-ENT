{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Translation</span></td>
		<td align="right"><a href="index.php?page=translate:update_translate&module_id={$module_id}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a></td>
	</tr>
</table>

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Translator</td>
		<td class="formAreaTitle">Translation</td>
	</tr>
{foreach from=$translate_array item="translate"}
	
	<tr>
		<td class="formAreaTitle">{$translate.name|lower}</td>
		<td class="fieldValue">{$translate.content}</td>
	</tr>


{/foreach}
</table>

{include file="core/footer.tpl"}