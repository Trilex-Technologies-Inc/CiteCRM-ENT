<!-- search_category -->
<script language="javascript" src="{$ROOT_URL}/java/ajaxCaller.js" type="text/javascript"></script>
<script language="javascript" src="{$ROOT_URL}/java/util.js" type="text/javascript"></script>

{include file="core/header.tpl"}

<span class="greetUser">{$translate_text_records_found} {$paginate.total}</span>

<br>

<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="25%">{$translate_text_displaying_page} {$paginate.page_current} {$translate_text_of} {$paginate.page_total}</td>
		<td class="productListing-heading" width="75%" align="right" valign="middle">
			{paginate_first text="<img src='images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>"}
			{paginate_prev text="<img src='images/icons/back_24.gif' alt='Previous' border='0' align='middle'>"}
			{paginate_middle format=select}
			{paginate_next text="<img src='images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>"}
			{paginate_last text="<img src='images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>"}
		</td>
	</tr>
</table>

<br><br>

<table cellpadding="3" cellspacing="0" border="0">

	{foreach from=$categoryArray item=category}
	
	{literal}
	<script language="javascript" type="text/javascript">
	
		function load_{/literal}{$category->get_category_id()}{literal}() {
			urlVars = {}
			bodyVars = {
			parent_id: document.getElementById("module_{/literal}{$category->get_category_id()}{literal}_id").value
		}
										
		ajaxCaller.postVars("index.php?page=category:loadAjaxSubCategory&escape=1", bodyVars, urlVars, on_response_{/literal}{$category->get_category_id()}{literal},false, "a postVars request");
											
		// Unhide Hide button
		var hide = document.getElementById("hide_{/literal}{$category->get_category_id()}{literal}");
		hide.style.display="inline";
											
		// Hide the show button
		var show = document.getElementById("show_{/literal}{$category->get_category_id()}{literal}");
		show.style.display="none";
											
		}
										
		function on_response_{/literal}{$category->get_category_id()}{literal}(text, headers, callingContext) {
			document.getElementById("{/literal}{$category->get_category_id()}{literal}").innerHTML = text;
		}
										
		function hide_{/literal}{$category->get_category_id()}{literal}() {
			urlVars = {}
			bodyVars = {
			parent_id: document.getElementById("module_{/literal}{$category->get_category_id()}{literal}_id").value
											}
										
			ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=core:blank&escape=1", bodyVars, urlVars, on_response_{/literal}{$category->get_category_id()}{literal},false, "a postVars request");
											
			// Unhide Hide button
			var hide = document.getElementById("hide_{/literal}{$category->get_category_id()}{literal}");
			hide.style.display="none";
											
			// Hide the show button
			var show = document.getElementById("show_{/literal}{$category->get_category_id()}{literal}");
			show.style.display="inline";
										
		}
	</script>
	{/literal}	
	
	
	
	<tr>
		<td><img src="{$category->get_category_image()}" width="25" height="25" align="middle" alt=""></td>
		<td width="5"></td>
		<td>		
			<a onclick="load_{$category->get_category_id()}()" style="" id="show_{$category->get_category_id()}">{$category->get_category_name()}</a>			
			<a onclick="hide_{$category->get_category_id()}()" style="display:none" id="hide_{$category->get_category_id()}"><b>{$category->get_category_name()}</b></a>			
			<input type="hidden" name="module_{$category->get_category_id()}_id" id="module_{$category->get_category_id()}_id" value="{$category->get_category_id()}">
		</td>
    </tr><tr>
		<td></td>
		<td width="5"></td>
		<td><div id="{$category->get_category_id()}"></div></td>
	</tr>
		
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="3">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
</table>

{include file="core/footer.tpl"}
