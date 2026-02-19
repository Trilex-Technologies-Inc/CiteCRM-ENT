
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">

{foreach from=$workorder_comment_array item=workorder_comment}
	<div id="workorder_comment_{$workorder_comment->get_workorder_comment_id()}">
	<tr>
		<td class="fieldValue">
			<b>Enterd By:</b> {$workorder_comment->get_workorder_comment_create_by()|display_names} {$workorder_comment->get_last_modified()}<br>
			{$workorder_comment->get_workorder_comment_text()}
		</td> 
		<td align="right" valign="top">
			<input type="hidden" name="workorder_comment_id" value="{$workorder_comment->get_workorder_comment_id()}" id="workorder_comment_id">
        {if $edit ==true}
			<img src="images/icons/edit_16.gif" alt="Edit Workorder comment" border="0" onclick="edit_workorder_comment()">
			<img src="images/icons/del_16.gif" alt="Delete Workorder Comment" border="0" onclick="delete_comment('{$workorder_comment->get_workorder_comment_text()}', {$workorder_comment->get_workorder_comment_id()})">
        {/if}
		</td>
	</tr>
	</div>
{/foreach}
</table>