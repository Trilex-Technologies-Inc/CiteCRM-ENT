<!-- update_translate -->
{include file="core/header.tpl"}
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Translation</span></td>
		<td align="right"></td>
	</tr>
</table>

<form method="POST" action="index.php?page=translate:update_translate" id="update_translate">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Translator</td>
		<td class="formAreaTitle">Translation</td>
	</tr>
{foreach from=$translate_array item="translate"}
	
	<tr>
		<td class="formAreaTitle">{$translate.name|lower}</td>
		<td class="fieldValue"><input type="text" name="translate[{$translate.name|lower}]" value="{$translate.content}" size="100">
	
		</td>
	</tr>


{/foreach}
	
	<tr>
		<td class="formAreaTitle" colspan="2">
			<input type="hidden" name="module_id" value="{$module_id}">
			<input type="submit" name="submit" value="{$translate_button_submit}">
		</td>
	</tr>

</table>

</form>

{include file="core/footer.tpl"}