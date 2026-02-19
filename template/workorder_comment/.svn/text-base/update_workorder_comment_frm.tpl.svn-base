<!-- update_workorder_comment_frm -->

{literal}
<script language="javascript" type="text/javascript" src="/include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "specific_textareas",
		theme : "{/literal}{$TINY_MCE_THEME}{literal}",
		width : "100%"
	}); 

</script>
{/literal}

<br>

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Update Workorder Comment</span></td>
		<td align="right"></td>
	</tr>
</table>

<br><br>

<form method="post" action="index.php?page=workorder_comment:update_workorder_comment" id="add_workorder_comment_frm">

	<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
		<tr>
			<td class="formAreaTitle">Comment</td>
		</tr><tr>
			<td class="fieldValue"><textarea name="workorder_comment_text" rows="15" cols="70" {if $TINY_MCE_EDIT == true} mce_editable="true"{/if} id="workorder_comment_text">{$workorder_comment->get_workorder_comment_text()}</textarea>
				
			</td>
		</tr>
	</table>
	
	<br>
	
	<input type="hidden" name="workorder_comment_id" id="workorder_comment_id" value="{$workorder_comment_id}">
	<input type="hidden" name="workorder_id" id="workorder_id" value="{$workorder_comment->get_workorder_id()}">
	<input type="hidden" name="workorder_comment_create_by" id="workorder_comment_create_by" value="{$workorder_comment->get_workorder_comment_create_by()}">
	
	<input type="button" name="submit" value="Submit" onclick="update_comment()" id="submit">
	
	<input type="button" name="cancel" value="Cancel" onclick="cancel_workorder_comment()">
	
</form>


