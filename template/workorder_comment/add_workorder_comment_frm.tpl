<!-- add_workorder_comment_frm -->
{literal}
<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="/include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "spellchecker,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,filemanager,imagemanager",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,spellchecker,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,|,insertfile,insertimage",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		content_css : "/example_data/example_full.css",
	    plugin_insertdate_dateFormat : "%Y-%m-%d",
	    plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style],p[lang]",
		external_link_list_url : "example_data/example_link_list.js",
		external_image_list_url : "example_data/example_image_list.js",
		flash_external_list_url : "example_data/example_flash_list.js",
		template_external_list_url : "example_data/example_template_list.js",
		file_browser_callback : "mcFileManager.filebrowserCallBack",
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : true,
		apply_source_formatting : true,
		spellchecker_languages : "+English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr,German=de,Italian=it,Polish=pl,Portuguese=pt,Spanish=es,Swedish=sv"
	});
</script>
<!-- /tinyMCE -->
{/literal}
<br>
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Add New Workorder Comment</td>
		<td align="right"></td>
	</tr>
</table>

<br><br>

<form method="post" action="{$ROOT_URL}/index.php?page=workorder_comment:add_workorder_comment" id="add_workorder_comment_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Comment</td>
	</tr><tr>
		<td class="fieldValue"><textarea name="workorder_comment_text" rows="15" cols="70" {if $TINY_MCE_EDIT == true} mce_editable="true"{/if} id="workorder_comment_text">{$workorder_comment_text}</textarea>
		</td>
	</tr>
</table>

<br>

<input type="hidden" name="workorder_id" value="{$workorder_id}">
<input type="button" name="submit" value="Submit" onclick="add_new_comment()" id="submit">
<input type="button" name="cancel" value="Cancel" onclick="cancel_workorder_comment()">
		



</form>

