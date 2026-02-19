<!-- update_workorder_frm -->
{include file="core/header.tpl"}

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

<link rel="stylesheet" type="text/css" media="all" href="include/jscalendar/calendar-blue.css" title="win2k-1" />
<script type="text/javascript" src="include/jscalendar/calendar_stripped.js"></script>
<script type="text/javascript" src="include/jscalendar/lang/calendar-english.js"></script>
<script type="text/javascript" src="include/jscalendar/calendar-setup_stripped.js"></script>


<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Update Work Order ID# {$workorder->get_workorder_id()}</span></td>
		<td align="right"></td>
</tr>
</table>


<br>
{validate field="workorder_status" 		criteria="notEmpty" message="<span class='errorText'><img src=\"images/icons/flag_16.gif\" alt=\"Error\">Error: You must select a</span> <b>Work Order Status</b><br>"}
{validate field="workorder_scope" 			criteria="notEmpty"	message="<span class='errorText'><img src=\"images/icons/flag_16.gif\" alt=\"Error\">Error: You must provide the</span> <b>Work Order Scope</b><br>"}
{validate field="workorder_desription"	criteria="notEmpty"	message="<span class='errorText'><img src=\"images/icons/flag_16.gif\" alt=\"Error\">Error: You must provide the</span> <b>Work Order Description</b><br>"}
<br>

<form method="post" action="index.php?page=workorder:update_workorder" id="add_workorder_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Date Opened</td>
		<td class="formAreaTitle">Status</td>
		<td class="formAreaTitle">Active</td>
		<td class="formAreaTitle">Created By</td>
		<td class="formAreaTitle">Assigned To</td>
	</tr><tr>
		<td class="fieldValue">{$workorder->get_workorder_open_date()|date_format:$DATE_FORMAT}</td>
		<td class="fieldValue">{html_select_workorder_status fieldName="workorder_status"	value=$workorder->get_workorder_status()}</td>
		<td class="fieldValue">{html_select_yesno fieldName="workorder_active" value=$workorder->get_workorder_active()}</td>
		<td class="fieldValue">{$workorder->get_workorder_create_by()|display_names}</td>
		<td class="fieldValue">{html_select_employee fieldName="workorder_assigned_to" value=$workorder->get_workorder_assigned_to()}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="5">Scope</td>
	</tr><tr>
		<td class="fieldValue" colspan="5"><input type="text" name="workorder_scope" value="{$workorder->get_workorder_scope()}" id="workorder_scope" size="100">
	</tr><tr>
		<td class="formAreaTitle" colspan="5">Desription</td>
	</tr><tr>
		<td class="fieldValue" colspan="5"><textarea name="workorder_desription" rows="15" cols="70" {if $TINY_MCE_EDIT == true} mce_editable="true"{/if}>{$workorder->get_workorder_desription()}</textarea></td>
</tr><tr>
		<td colspan="5">
		<input type="hidden" name="workorder_id" value="{$workorder_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
