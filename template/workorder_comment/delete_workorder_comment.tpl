<!-- delete_workorder_comment -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Work Comment ID# {$workorder_comment_id} was deleted</span></td>
		<td align="right">
			<a href="{$ROOT_URL/index.php?page=workorder:view_workorder&workorder_id={$workorder_id}"><img src="{$ROOT_URL/images/icons/back_16.gif" alt="back" border="0"></a>
		</td>
	</tr>
</table>
{include file="core/footer.tpl"}
