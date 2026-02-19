<!-- ajax_add_system_audit.tpl -->
{if $error == 'true'}
    {include file="core/header.tpl"}
    <span class="error">{$errorMsg}</span>
{/if}

<br>
<form method="post" action="index.php?page=system:ajax_add_system_audit" id="add_product_frm" enctype="multipart/form-data" onsubmit="return validate_form(this);">
<input type="hidden" name="MAX_FILE_SIZE" value="300000000"> 
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Upload Audit</a></li>
</ul>

<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td colspan="2"><p class="small">System Audit uses the tool Win Audit from PXServer at <a href="http://www.pxserver.com/WinAudit.htm" target="new">http://www.pxserver.com/WinAudit.htm</a>. You will need to download the program from there and run it on the host PC. Then save the results as a "XML" file. Then upload the XML file only, the style sheet is already included in the CRM.</p>
<br></td>
	</tr><tr></tr>
		<td class="formAreaTitle" nowrap="true">System Audit XML File</td>
		<td class="fieldValue"><input type="file" name="audit_file" id="audit_file"></td>	
	</tr><tr>	 
		<td colspan="2">
		<input type="hidden" name="system_id" value="{$system_id}">	
		<input type="submit" name="submit" value="Upload"></td>
	</tr>
</table>
{if $error}
    {include file="core/footer.tpl"}
{/if}